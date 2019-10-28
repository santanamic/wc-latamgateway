<?php

namespace LatamGateway\SDK\Model;

class AccessToken
{
    public $container = [];

    public function __construct(array $data = null)
    {
        $this->container['token'] = $data['token'] ?? null;
        $this->container['AccountKey'] = $data['AccountKey'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['password'] = $data['password'] ?? null;
    }

    public function setToken($token)
    {
        $this->container['token'] = $token;

        return $this;
    }

    public function getToken()
    {
        return $this->container['token'];
    }

    public function setAccountKey($accountKey)
    {
        $this->container['AccountKey'] = $accountKey;

        return $this;
    }

    public function getAccountKey()
    {
        return $this->container['AccountKey'];
    }

    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->container['email'];
    }

    public function setPassword($password)
    {
        $this->container['password'] = $password;

        return $this;
    }

    public function getPassword()
    {
        return $this->container['password'];
    }
}
