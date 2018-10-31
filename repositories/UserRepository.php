<?php

namespace Repositories;


use App\Models\Entities\User;
use App\Models\Interfaces\UserRepositoryInterface;
use DateTime;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getUser(int $id) : ?User
    {
        $query = "SELECT 
                    id,
                    email,
                    firstname,
                    lastname,
                    created,
                    lastlogin
                  FROM 
                  users
                  WHERE 
                  id = :id";

        $parameters = [
            'id' => $id
        ];

        $userData = $this->getOne($query, $parameters);

        if($userData){
            return $this->createUserObject($userData);
        } else {
            return null;
        }
    }

    public function getAllUsers() : array
    {

    }

    public function login(string $email, string $password) : ?User
    {

    }

    public function save(User $user) : void
    {

    }

    private function createUserObject($userData) :User
    {
        $user = new User();

        $user->setId($userData['id'])
            ->setEmail($userData['email'])
            ->setFirstName($userData['firstname'])
            ->setLastName($userData['lastname'])
            ->setCreated(new DateTime($userData['created']));

        if($userData['lastlogin']) {
            $user->setLastLogin(new DateTime($userData['lastlogin']));
        }
        return $user;
    }
}