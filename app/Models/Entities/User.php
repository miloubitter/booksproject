<?php
namespace App\Models\Entities;

use DateTime;

class User
{
    private $id;
    private $email;
    private $hash;
    private $firstName;
    private $lastName;
    private $created;
    private $lastLogin;


    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getHash() : string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;
        return $this;
    }

    public function getFirstName() : string
    {
        return ucfirst($this->firstName);
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName() : string
    {
        return ucfirst($this->lastName);
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getCreated() : DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): self
    {
        $this->created = $created;
        return $this;
    }

    public function getLastLogin() : ?DateTime
    {
        return $this->lastLogin;
    }

    public function setLastLogin(DateTime $lastLogin): self
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    public function getFullName() : string
    {
        return $this->getFirstName() . ' ' .  $this->getLastName();
    }
}