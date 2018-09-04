<?php

use App\Controllers\Web\BookController;
use App\Controllers\Web\LoginController;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$dotenv = new DotEnv(__DIR__ . '/../');
$dotenv->load();

set_exception_handler('Infrastructure\ErrorHandler::handleExceptions');
set_error_handler('Infrastructure\ErrorHandler::handleErrors');

function view($view, $viewModel){
    include __DIR__ . '/../app/Views/layout.php';
}

$route = $_GET['route']??'index';
$id =$_GET['id']??null;
$method = $_SERVER['REQUEST_METHOD'];

// ****** Main routes ******
if($route == 'index') {
    $bookController = new BookController();
    $bookController->index();
   
} else if($route == 'allbooks') {
    $bookController = new BookController();
    $bookController->allBooks();

} else if($route == 'contact') {
    $bookController = new BookController();
    $bookController->showContact();


//    ******  Books ******
} else if($route == 'show' && $method=='GET') {
    $bookController = new BookController();
    $bookController->show($id);
    
} else if($route == 'edit' && $method=='GET') {
    $bookController = new BookController();
    $bookController->edit($id);

}else if($route == 'create' && $method=='GET') {
    $bookController = new BookController();
    $bookController->create();

} else if ($route == "upload-image" && $method == "POST") {
    $bookController = new BookController();
    $bookController->uploadImage($id);

//    ****** Authors ******
} else if ($route == "authorShow" && $method == "GET") {
    $bookController = new BookController();
    $bookController->allAuthors($id);

//    ****** Categories ******
}else if ($route == "categoryShow" && $method == "GET") {
    $bookController = new BookController();
    $bookController->allCategories($id);

//    ****** Login ******
} elseif ($route == "login" && $method == "GET") {
    $loginController = new Logincontroller();
    $loginController->show();

} elseif ($route == "login" && $method == "POST") {
    $loginController = new Logincontroller();
    $loginController->login();

} elseif ($route == "logout") {
    $loginController = new Logincontroller();
    $loginController->logout();
}

