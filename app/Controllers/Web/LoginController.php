<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Category;
use App\Models\Entities\User;
use Infrastructure\Authentication;

class LoginController extends BaseController
{
    public function show() : void
    {
        $author = new Author();
        $category = new Category();

        $viewModel = [
            'pageTitle' => 'Login',
            'authors' => $author->authors(),
            'categories'=> $category->categories(),
            'errors' => $this->getErrors(),
            'messages' => $this->getMessages(),
            'profile' => Authentication::getProfile()
        ];

        unset($_SESSION['error']);

        $this->renderWebView('/Login/login', $viewModel);
    }

    public function login() : void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        /** @var User $user */
        $user = $userRepository->login()($username, $password);

        if ($user) {
            $_SESSION['profile'] = array(
                'userId' => $user->getId(),
                'userName' => $user->getEmail(),
                'userFullName' => $user->getFullName()
            );

            header('Location: ?route=index');
        }
        else {
           $this->addError('Combination of username and password is not correct');
            header('Location: ?route=login');
        }
    }

    public function logout() : void
    {
        Authentication::logout();
        header('Location: ?route=index');
    }
}