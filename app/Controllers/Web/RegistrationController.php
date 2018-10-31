<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
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
        $email = 'email@adres.nl';
        $hash = password_hash('secret', PASSWORD_DEFAULT);
        $firstName = 'Voornaam';
        $lastName ='Achternaam';

        $user = new User();
        $user->setEmail($email)
            ->setHash($hash)
            ->setFirstName($firstName)
            ->setLastName($lastName);

        $this->userRepository->save($user);
    }

}