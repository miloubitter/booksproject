<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;
use App\Models\Book;

class BookController extends BaseController
{
    public function getBooks() {

        $bookModel = new Book();
        $books = $bookModel->all();

       $this->renderJson(200, $books);
    }

    public function createBook(){
        $bookModel = new Book();

        $book = json_decode(file_get_contents("php://input"));

        $fields =[
            'category_id'=> $book->category_id,
            'author_id' => $book->author_id,
            'title' => $book->title,
            'isbn' => $book->isbn,
            'description' => $book->description,
            'price' => $book->price
        ];

        $bookId = $bookModel->save($fields);

        $this->renderJson(201, $bookId);
    }
}