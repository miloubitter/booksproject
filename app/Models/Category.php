<?php

namespace App\Models;


class Category extends Database
{
    private $primary_key = "id";

    public function categories()
    {
        return $this->getAll("SELECT * FROM categories");
    }

    public function getCategoryById($id = 0)
    {
        $parameters = array(
            'id' => $id
        );

        return $this->getOne("SELECT * FROM categories WHERE {$this->primary_key} = :id", $parameters);
    }
}