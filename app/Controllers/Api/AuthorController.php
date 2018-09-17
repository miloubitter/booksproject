<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class AuthorController extends BaseController
{
    public function getAuthors() {
        $authorModel = new Author();
        $authors = $authorModel->authors();
        $this->renderJson(200, $authors);
    }
}