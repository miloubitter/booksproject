<?php

namespace App\Controllers\Web;


use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Gumlet\ImageResize;
use Infrastructure\Authentication;

class ContactController extends BaseController
{

    public function showContact()
    {
        $author = new Author();
        $category = new Category();

        $viewModel = [
            'pageTitle' => "Contact",
            'authors' => $author->authors(),
            'categories'=> $category->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        $this->renderWebView('/Books/contact', $viewModel);
    }
}