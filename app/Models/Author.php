<?php

namespace App\Models;


class Author extends Database
{
    public function authors()
    {
        return $this->getAll("SELECT * FROM authors");
    }


    public function oneAuthor($id = 0)
    {
        return $this->getOne("SELECT authors.*,
                                    books.id
                                    AS blog_id
                                    FROM authors
                                    JOIN books ON books.author_id = authors.id
                                    WHERE authors.id = :id;", ['id' => $id]);
    }
}