<?php

namespace LatamGateway\SDK\Model;

class Order
{
    public $container = [];

    public function __construct(array $data = null)
    {
        $this->container['code'] = $data['code'] ?? null;
        $this->container['notification_url'] = $data['notification_url'] ?? null;
        $this->container['redirect_url'] = $data['redirect_url'] ?? null;
        $this->container['purchase_date'] = $data['purchase_date'] ?? null;
        $this->container['value'] = $data['value'] ?? null;
        $this->container['items'] = $data['items'] ?? null;
        $this->container['payment_method'] = $data['payment_method'] ?? null;
        $this->container['bank_slug'] = $data['bank_slug'] ?? null;
    }

    public function getCode()
    {
        return $this->container['code'];
    }

    public function setCode($Code)
    {
        $this->container['code'] = $Code;

        return $this;
    }

    public function getNotificationUrl()
    {
        return $this->container['notification_url'];
    }

    public function setNotificationUrl($notificationUrl)
    {
        $this->container['notification_url'] = $notificationUrl;

        return $this;
    }

    public function setRedirectUrl($redirectUrl)
    {
        $this->container['redirect_url'] = $redirectUrl;

        return $this;
    }

    public function getRedirectUrl()
    {
        return $this->container['redirect_url'];
    }

    public function getPurchaseDate()
    {
        return $this->container['purchase_date'];
    }

    public function setPurchaseDate($purchaseDate)
    {
        $this->container['purchase_date'] = $purchaseDate;

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

    public function getItems()
    {
        return $this->container['items'];
    }

    public function setItems($items)
    {
        $this->container['items'][] = $items->container;

        return $this;
    }

    public function getBankSlug()
    {
        return $this->container['bank_slug'];
    }

    public function setBankSlug($bankSlug)
    {
        $this->container['bank_slug'] = $bankSlug;

        return $this;
    }

    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    public function setPaymentMethod($paymentMethod)
    {
        $this->container['payment_method'] = $paymentMethod;

        return $this;
    }
}
