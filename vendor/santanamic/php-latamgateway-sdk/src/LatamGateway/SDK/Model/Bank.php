<?php

namespace LatamGateway\SDK\Model;

class Bank
{
    const ITAU = 'itau';
    const SANTANDER = 'santander';
    const BRADESCO = 'bradesco';
    const BANCO_DO_BRASIL = 'banco-do-brasil';
    const CAIXA = 'caixa';

    public $container = [];

    public function __construct(array $data = null)
    {
        $this->container['banks'] = $data['banks'] ?? null;
    }

    public function getAvailableBanks()
    {
        return $this->container['banks'];
    }
}
