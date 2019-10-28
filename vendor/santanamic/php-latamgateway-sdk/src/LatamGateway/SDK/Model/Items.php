<?php

namespace LatamGateway\SDK\Model;

class Items
{
    public $container = [];

    public function __construct(array $data = null)
    {
        $this->container['id'] = $data['id'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['value'] = $data['value'] ?? null;
        $this->container['quantity'] = $data['quantity'] ?? null;
    }

    public function getId()
    {
        return $this->container['id'];
    }

    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    public function getDescription()
    {
        return $this->container['description'];
    }

    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    public function getValue()
    {
        return $this->container['value'];
    }

    public function setValue($value)
    {
        $this->container['value'] = $value;

        return $this;
    }

    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->container['quantity'] = $quantity;

        return $this;
    }
}
