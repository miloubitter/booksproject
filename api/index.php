<?php

use App\Controllers\Api\BookController;
use App\Controllers\Api\BookVoteController;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

set_exception_handler('Infrastructure\ErrorHandler::handleExceptions');
set_error_handler('Infrastructure\ErrorHandler::handleErrors');

$route = $_GET['route'] ?? 'index';
$id = $_GET['id'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];

    if ($route === 'books' && $method === 'GET') {
        $bookController = new BookController();
        $bookController->getBooks();

    } else if ($route === 'books' && $method === 'POST') {
        $bookController = new BookController();
        $bookController->createBook();
    }

    else if ($route === 'votes')
    {
        $bookVoteController = new BookVoteController();
        if ($method === 'GET')
        {
            $bookVoteController->show($id);
        }
        else if ($method === 'POST')
        {
            $bookVoteController->store($id);
        }
        else if ($method === 'DELETE')
        {
            $bookVoteController->destroy($id);
        }
    }


