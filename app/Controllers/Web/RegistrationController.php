<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\Author;
use App\Models\Category;
use App\Models\Entities\User;
use App\Models\Interfaces\UserRepositoryInterface;

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
        $email = $_POST['username'];
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];

        $user = new User();
        $user->setEmail($email)
            ->setHash($hash)
            ->setFirstName($firstName)
            ->setLastName($lastName);

        $this->userRepository->save($user);

        $this->addMessage('User succesfully created! Try to login.');
        header("Location: ?route=login");
        exit;
    }

    public function newUser()
    {
        $author = new Author();
        $category = new Category();

        $viewModel = [
            'pageTitle' => 'Create a New User',
            'authors' => $author->authors(),
            'categories'=> $category->categories()
        ];

        unset($_SESSION['error']);

        $this->renderWebView('/Login/new-user', $viewModel);
    }

}