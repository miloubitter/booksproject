<?php

namespace App\Controllers\Web;


use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Infrastructure\Authentication;

class AuthorController extends BaseController
{
    public function oneAuthor($id=0)

    {
        $book = new Book();
        $author = new Author();
        $category = new Category();

        $viewModel = [
            'pageTitle' => "Biography",
            'author' => $author->oneAuthor($id),
            'books' => $book->getAllBooksByAuthor($id),
            'authors' => $author->authors(),
            'categories'=> $category->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        $this->renderWebView('/Books/author', $viewModel);
    }

}