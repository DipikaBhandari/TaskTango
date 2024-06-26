<?php

namespace App\models;

class User
{
    public int $id;
    public string $username;
    public string $email;
    public string $password;

    public function getUserId(): int
    {
        return $this->id;
    }

    public function setUserId(int $id): void
    {
        $this->id=$id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username=$username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email=$email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password=$password;
    }

    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    }
}