<?php

use App\Controllers\Web\BookController;
use App\Controllers\Web\LoginController;
use Dotenv\Dotenv;
use Infrastructure\LogManager;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$dotenv = new DotEnv(__DIR__ . '/../');
$dotenv->load();

function handleExceptions(Throwable $oException)
{
    LogManager::log('alert','Unhandled exception: ' . $oException->getMessage() . ' - ' . $oException->getTraceAsString());
}
set_exception_handler('handleExceptions');

function handleErrors($iErrorNumber, $sError, $sErrorFile, $iErrorLine)
{
    throw new ErrorException($sError, $iErrorNumber, 0, $sErrorFile, $iErrorLine);
}
set_error_handler('handleErrors');

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

if($route == 'index') {
    $bookController = new BookController();
    $bookController->index();
   
} else if($route == 'allbooks') {
    $bookController = new BookController();
    $bookController->allBooks();

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

}else if( $route == 'upload-image' &&  $method == 'POST') {
    $bookController = new BookController();
    $bookController->uploadImage($id);


}else if($route == 'login' && $method=='GET'){
    $loginController = new LoginController();
    $loginController->show();
    
}else if($route == 'login' && $method=='POST') {
    $loginController = new LoginController();
    $loginController->login($_POST);
    
}else if($route == 'logout') {
    $loginController = new LoginController();
    $loginController->logout();
}

