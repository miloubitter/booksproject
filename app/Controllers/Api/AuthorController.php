<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;
use App\Models\Author;

class AuthorController extends BaseController
{
    public function getAuthors() {
        $authorModel = new Author();
        $authors = $authorModel->authors();
        $this->renderJson(200, $authors);
    }
}