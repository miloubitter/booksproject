<?php

namespace App\Models\Interfaces;

use App\Models\Entities\User;

interface UserRepositoryInterface
{
    public function getUser(int $id) : ?User;

    public function getAllUsers() : array;

    public function login(string $email, string $password) : ?User;

    public function save(User $user) : void;
}