<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Category;
use App\Models\Entities\User;
use App\Models\Interfaces\UserRepositoryInterface;
use Repositories\UserRepository;

class RegistrationController extends BaseController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    public function registerUser()
    {
        $email = $_GET['email'];
        $hash = password_hash($_GET['hash'], PASSWORD_DEFAULT);
        $firstName = $_GET['firstname'];
        $lastName = $_GET['lastname'];

        $user = new User();
        $user->setEmail($email)
            ->setHash($hash)
            ->setFirstName($firstName)
            ->setLastName($lastName);

        $this->userRepository->save($user);
    }

    public function newUser()
    {
        $author = new Author();
        $category = new Category();
//        $register = new UserRepository();

        $viewModel = [
            'pageTitle' => 'Create a New User',
            'authors' => $author->authors(),
            'categories'=> $category->categories()
//            'register' => $register->registerUser()
        ];

        unset($_SESSION['error']);

        $this->renderWebView('/Login/new-user', $viewModel);
    }

}