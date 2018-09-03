<?php

use App\Controllers\AuthorController;
use App\Controllers\Web\BookController;
use App\Controllers\Web\LoginController;
use Dotenv\Dotenv;
use Infrastructure\LogManager;

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

//echo '<br /><br />';
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';

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

}else if($route == 'edit' && $method=='POST') {
    $bookController = new BookController();
    $bookController->update($_POST,$id);

}else if($route == 'create' && $method=='GET') {
    $bookController = new BookController();
    $bookController->create();
    
}else if($route == 'create' && $method=='POST') {
    $bookController = new BookController();
    $bookController->store($_POST);
    
}else if($route == 'delete') {
    $bookController = new BookController();
    $bookController->destroy($id);

} else if ($route == "upload-image" && $method == "POST") {
    $bookController = new BookController();
    $bookController->uploadImage($id);


//    ******  Authors ******
} else if ($route == "authors" && $method == "GET") {
    $adminAuthorController = new AuthorController();
    $adminAuthorController->getAllAuthors();

} else if ($route == "show-author" && $method == "GET") {
    $adminAuthorController = new AuthorController();
    $adminAuthorController->showAuthor($id);


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

