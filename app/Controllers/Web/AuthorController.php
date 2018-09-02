<?php

namespace App\Controllers;


use App\Models\Author;
use Infrastructure\Authentication;

class AuthorController extends BaseController
{
    public function getAllAuthors()

    {
        $author = new Author();
        $authors = $author->getAuthors();


        $viewModel = [
            'pageTitle' => "All authors",
            'authors' => $authors,
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile(),
        ];

        view('/Books/all-authors', $viewModel);

    }

    public function showAuthor($id = 0)

    {
        $author = new Author();
        $author = $author->one($id);


        $viewModel = [
            'pageTitle' => "Author biography",
            'author' => $author,
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile(),
        ];

        view('/Books/author-details', $viewModel);
    }
}