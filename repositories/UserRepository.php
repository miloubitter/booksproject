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
        $query = "SELECT 
                    id,
                    email,
                    firstname,
                    lastname,
                    created,
                    lastlogin
                  FROM 
                  users
                  ";

        $userDatas = $this->getAll($query);
        $userArray = [];

        foreach ($userDatas as $data){
           $userArray[] =  $this->createUserObject($data);
        }
        return $userArray;
    }

    public function login(string $email, string $password) : ?User
    {
        $query = "SELECT 
                    *
                  FROM 
                    users
                  WHERE
                    email = :email 
        ";

        $parameters = [
            'email' => $email
        ];

        $userData = $this->getOne($query, $parameters);

        if ($userData){
            if (password_verify($password, $userData['hash']) === true){
                return $this->createUserObject($userData);
            }
        }

        return null;
    }

    public function save(User $user) : void
    {
        // Update
        if ($user->getId()) {

        } // Create
        else {
            $query = " INSERT 
                       INTO 
                            users (
                            email, 
                            `hash`, 
                            firstname, 
                            lastname) 
                       VALUES (
                            :email,
                            :hash,
                            :firstname,
                            :lastname
                            )";
            $parameters = [
                'email' => $user->getEmail(),
                'hash' => $user->getHash(),
                'firstname' => $user->getFirstName(),
                'lastname' => $user->getLastName()
            ];

            $this->execute($query, $parameters);
        }
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