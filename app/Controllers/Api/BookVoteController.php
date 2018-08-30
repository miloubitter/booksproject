<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;
use App\Models\Book;

class BookVoteController extends BaseController
{

    public function show($id = 0)
    {
        $book = new Book();
        $book = $book->one($id);

        if ($book) {
            $response = [
                'status_code' => 200,
                'status_message' => '',
                'total' => 1,
                'votes' => $book['votes'],
        ];
        } else {
            $response= [
                'status_code' => 404,
                'status_message' => 'Book ' . $id . ' not found',
                'total' => 0,
                'votes' => null,
            ];

        }

        json($response);
    }

    public function store($id = 0)
    {
        $book = new Book();
        $foundBook = $book->one($id);

        if ($foundBook) {
            $book->upVote($id);
            $foundBook = $book->one($id);
            $response = [
                'status_code' => 200,
                'status_message' => '',
                'total' => 1,
                'votes' => $foundBook['votes'],
            ];
        } else {
            $response= [
                'status_code' => 404,
                'status_message' => 'Book ' . $id . ' not found',
                'total' => 0,
                'votes' => null,
            ];

        }

        json($response);
    }

    public function destroy($id =0)
    {
        $book = new Book();
        $foundBook = $book->one($id);

        if ($foundBook) {
            $book->downVote($id);
            $foundBook = $book->one($id);
            $response = [
                'status_code' => 200,
                'status_message' => '',
                'total' => 1,
                'votes' => $foundBook['votes'],
            ];
        } else {
            $response= [
                'status_code' => 404,
                'status_message' => 'Book ' . $id . ' not found',
                'total' => 0,
                'votes' => null,
            ];

        }

        json($response);
    }
}