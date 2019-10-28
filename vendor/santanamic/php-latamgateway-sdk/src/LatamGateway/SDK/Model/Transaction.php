<?php

namespace LatamGateway\SDK\Model;

class Transaction
{
    const DEPOSIT = 'deposit';
    const BOLETO = 'boleto_express';
    const CREDTCARD = 'credit_card';

    public $container = [];

    public function __construct(array $data = null)
    {
        $this->container['latam_id'] = $data['latam_id'] ?? null;
        $this->container['form_id'] = $data['form_id'] ?? null;
        $this->container['code'] = $data['code'] ?? null;
        $this->container['confirmation_url'] = $data['confirmation_url'] ?? null;
        $this->container['customer'] = $data['customer'] ?? null;
        $this->container['order'] = $data['order'] ?? null;
    }

    public function getFormId()
    {
        return $this->container['form_id'];
    }

    public function setFormId($formId)
    {
        $this->container['form_id'] = $formId;

        return $this;
    }

    public function getLatamId()
    {
        return $this->container['latam_id'];
    }

    public function setLatamId($latamId)
    {
        $this->container['latam_id'] = $latamId;

        return $this;
    }

    public function getCode()
    {
        return $this->container['code'];
    }

    public function setCode($code)
    {
        $this->container['code'] = $code;

        return $this;
    }

    public function getConfirmationUrl()
    {
        return $this->container['confirmation_url'];
    }

    public function setConfirmationUrl($confirmationUrl)
    {
        $this->container['confirmation_url'] = $confirmationUrl;

        return $this;
    }

    public function getCustomer()
    {
        return $this->container['customer'];
    }

    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer->container;

        return $this;
    }

    public function getOrder()
    {
        return $this->container['order'];
    }

    public function setOrder($order)
    {
        $this->container['order'] = $order->container;

        return $this;
    }
}
