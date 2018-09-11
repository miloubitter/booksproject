<?php

namespace App\Models;


class Book extends Database
{
    private $table_name = "books";
    private $author_table = "authors";
    private $category_table = "categories";
    private $primary_key = "id";
    public $sort_column = [];
    public $sort_direction = [];

    public function all($where = [], $group_by = [], $order_by = [], $start_row = [], $limit = 1)
    {
            $sql = "SELECT
                    books.id as id,
                    books.category_id as category_id,
                    books.author_id as author_id,
                    books.title as title,
                    substr(books.description,1,400) as intro,
                    books.description as description,
                    books.price as price,
                    books.isbn as isbn,
                    books.created_at as created_at,
                    books.updated_at as updated_at,
                    books.image_filename as image_filename,
                    books.votes as votes,
                    authors.name as author_name,
                    categories.name as category_name
                FROM
                    books
                left join authors on (authors.id = books.author_id)
                left join categories on (categories.id = books.category_id)";

           return $this->getAll($sql);
    }

    public function one($id = 0)
    {
        return $this->getOne("  SELECT 
                                        books.*, 
                                        authors.name AS author_name,
                                        categories.name AS category_name 
                                      FROM 
                                        books
                                      left join authors on (authors.id = books.author_id)
                                      left join categories on (categories.id = books.category_id)
                                      WHERE books.id = :id;", ['id' => $id]);
    }

    public function save($columns = [], $id = null)
    {
        if (!empty($id))
        {
            //update
            $columns['id'] = $id;
            $columns['updated_at'] = date("Y-m-d H:i:s");
            $this->execute("
          UPDATE books SET 
            category_id = :category_id,
            author_id = :author_id,
            title = :title,
            isbn = :isbn,
            description = :description,
            price = :price,
            updated_at = :updated_at
           WHERE books.id = :id
         ", $columns);
        }
        else
            {
            //insert
                $columns['created_at'] = date("Y-m-d H:i:s");
                $return = $this->execute(" 
          INSERT INTO books (category_id,author_id,title,isbn,description,price,created_at)
          VALUES(
            :category_id, 
            :author_id,
            :title,
            :isbn,
            :description,
            :price,
            :created_at
            )
         ", $columns);
         $id = $return->lastInsertId();

        }
        return $id;
    }

    public function delete($id = null)
    {
        if (!empty($id)){
            $return =$this->execute("DELETE FROM books WHERE books.id= :id", ['id' => $id]);
        }

            return true;
    }

    public function downVote($id = null)
    {
        if (!empty($id)){
            $return =$this->execute("
              UPDATE {$this->table_name} SET `votes`=`votes`-1 
              WHERE {$this->primary_key}= :id
              ", ['id' => $id]);
        }

            return true;
    }

    public function upVote($id = null)
    {
        if (!empty($id)){
            $return =$this->execute("
              UPDATE {$this->table_name} SET `votes`=`votes`+1 
              WHERE {$this->primary_key}= :id
              ", ['id' => $id]);
        }

            return true;
    }
    public function changeImageFileName($id, $fileName)
    {
        {
            //update
            $columns['id'] = $id;
            $columns['filename'] = $fileName;
            $this->execute("  UPDATE
                                books
                              SET
                                image_filename = :filename
                              WHERE books.id = :id", $columns);
        }
        return $id;
    }

    public function getTopFiveBooks()
    {   $sql = "SELECT
                books.id as id,
                    books.category_id as category_id,
                    books.author_id as author_id,
                    books.title as title,
                    substr(books.description,1,400) as intro,
                    books.description as description,
                    books.price as price,
                    books.isbn as isbn,
                    books.created_at as created_at,
                    books.updated_at as updated_at,
                    books.image_filename as image_filename,
                    books.votes as votes
              FROM
              books
              ORDER BY
              votes DESC
              LIMIT
              5";
        return $this->getAll($sql);
    }

    public function categories()
    {
        return $this->getAll("SELECT * FROM {$this->category_table}");
    }

    public function authors()
    {
        return $this->getAll("SELECT * FROM {$this->author_table}");
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

//    public function oneAuthor($id = 0)
//    {
//        return $this->getOne("SELECT {$this->author_table}.*,
//                                    {$this->table_name}.title,
//                                    {$this->table_name}description,
//                                     {$this->category_table}.name
//                                    AS category,
//                                    {$this->table_name}.{$this->primary_key}
//                                    AS blog_id
//                                    FROM {$this->author_table}
//                                    JOIN {$this->table_name} ON {$this->table_name}.author_id = {$this->author_table}.id
//                                    JOIN {$this->category_table} ON {$this->table_name}.category_id = {$this->category_table}.id
//                                    WHERE {$this->author_table}.{$this->primary_key} = :id;", ['id' => $id]);
//    }

    public function getCategoryById($id = 0)
    {
        $parameters = array(
            'id' => $id
        );

        return $this->getOne("SELECT * FROM {$this->category_table} WHERE {$this->primary_key} = :id", $parameters);
    }
}
