<?php
/**
 * Created by PhpStorm.
 * User: miloubitter
 * Date: 02-09-18
 * Time: 13:34
 */

namespace App\Models;


class Author extends Database
{
    private $table_name = "books";
    private $author_table = "authors";
    private $primary_key = "id";

    public function getAuthors()
    {
        $query = "SELECT
                    authors.*,
                    count(books.id) as book_count
                  FROM
                  authors
                  left join books on (authors.id = books.author_id)
                  group BY
                  authors.id
                  order by 
                  name";

        return $this->getAll($query);
    }

    public function one($id = 0)
    {
        return $this->getOne("SELECT 
                                        * 
                                    FROM {$this->author_table}
                                    WHERE {$this->primary_key} = :id;", ['id' => $id]);
    }
}