<?php

use App\Controllers\Web\AuthorController;
use App\Controllers\Web\BookController;
use App\Controllers\Web\CategoryController;
use App\Controllers\Web\ContactController;
use App\Controllers\Web\LoginController;
use App\Controllers\Web\RegistrationController;
use Dotenv\Dotenv;
use Repositories\UserRepository;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$dotenv = new DotEnv(__DIR__ . '/../');
$dotenv->load();

set_exception_handler('Infrastructure\ErrorHandler::handleExceptions');
set_error_handler('Infrastructure\ErrorHandler::handleErrors');

$route = $_GET['route']??'index';
$id =$_GET['id']??null;
$method = $_SERVER['REQUEST_METHOD'];
//$route = 'register-user';
//$method = 'POST';

// ****** Main routes ******
if($route == 'index') {
    $bookController = new BookController();
    $bookController->index();
} else if($route == 'allbooks') {
    $bookController = new BookController();
    $bookController->allBooks();

//    ******  Contact ******
} else if($route == 'contact') {
    $contactController = new ContactController();
    $contactController->showContact();

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
} else if ($route == "authorDetailsShow" && $method == "GET") {
    $authorController = new AuthorController();
    $authorController->oneAuthor($id);

//    ****** Categories ******
}else if ($route == "categoryDetailsShow" && $method == "GET") {
    $categoryController = new CategoryController();
    $categoryController->oneCategory($id);

//    ****** Login ******
} else if ($route == "login" && $method == "GET") {
    $userRepository = new UserRepository();
    $loginController = new Logincontroller($userRepository);
    $loginController->show();

} else if ($route == "login" && $method == "POST") {
    $userRepository = new UserRepository();
    $loginController = new Logincontroller($userRepository);
    $loginController->login();

} else if ($route == "logout") {
    $userRepository = new UserRepository();
    $loginController = new Logincontroller($userRepository);
    $loginController->logout();

} else if ($route == 'register-user' && $method == "POST") {
    $userRepository = new UserRepository();
    $registrationController = new RegistrationController($userRepository);
    $registrationController->registerUser();
}

