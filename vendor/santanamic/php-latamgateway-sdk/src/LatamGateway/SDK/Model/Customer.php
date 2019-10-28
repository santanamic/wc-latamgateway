<?php

namespace LatamGateway\SDK\Model;

class Customer
{
    public $container = [];

    public function __construct(array $data = null)
    {
        $this->container['code'] = $data['code'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['document'] = $data['document'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['phone'] = $data['phone'] ?? null;
        $this->container['birth'] = $data['birth'] ?? null;
    }

    public function getCode()
    {
        return $this->container['code'];
    }

    public function setCode($street)
    {
        $this->container['code'] = $street;

        return $this;
    }

    public function getName()
    {
        return $this->container['name'];
    }

    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    public function getDocument()
    {
        return $this->container['document'];
    }

    public function setDocument($document)
    {
        $this->container['document'] = $document;

        return $this;
    }

    public function getEmail()
    {
        return $this->container['email'];
    }

    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    public function getPhone()
    {
        return $this->container['phone'];
    }

    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    public function getBirth()
    {
        return $this->container['birth'];
    }

    public function setBirth($birth)
    {
        $this->container['birth'] = $birth;

        return $this;
    }
}
