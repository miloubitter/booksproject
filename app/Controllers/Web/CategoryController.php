<?php

namespace App\Controllers\Web;


use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Infrastructure\Authentication;

class CategoryController extends BaseController
{
    public function allCategories($id = 0)

    {
        $book = new Book();
        $author = new Author();
        $category = new Category();

        $viewModel = [
            'pageTitle' => "Category",
            'categories'=> $category->categories(),
            'books' => $book->all(),
            'authors' => $author->authors(),
            'category' => $category->getCategoryById($id),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()

        ];

        $this->renderWebView('/Books/categories', $viewModel);
    }

    public function oneCategory($id = 0)

    {
        $book = new Book();
        $author = new Author();
        $category = new Category();

        $viewModel = [
            'pageTitle' => "Category",
            'categories'=> $category->categories(),
            'category' => $category->getCategoryById($id),
            'books' => $book->getAllBooksByCategory($id),
            'authors' => $author->authors(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()

        ];

        $this->renderWebView('/Books/category', $viewModel);
    }

}