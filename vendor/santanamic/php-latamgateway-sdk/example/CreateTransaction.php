<?php

namespace LatamGateway;

use LatamGateway\SDK\Model\Transaction;
use LatamGateway\SDK\Model\Order;
use LatamGateway\SDK\Model\Customer;
use LatamGateway\SDK\Model\Items;
use LatamGateway\SDK\Model\Bank;
use LatamGateway\SDK\Requests\Order\OrderRequest;

require_once('../vendor/autoload.php');

$accountKey = 'lagw_2349ed9793f199a912d980be35cbfde368bdc2c71d1da6f45c2eb77d196ba34c';
$accountToken = 'v2.public.eyJrZXkiOiJsYWd3XzIzNDllZDk3OTNmMTk5YTkxMmQ5ODBiZTM1Y2JmZGUzNjhiZGMyYzcxZDFkYTZmNDVjMmViNzdkMTk2YmEzNGMiLCJleHBpcmVzX2F0IjoiMjAxOS0xMC0yM1QxNzozNzowNS4wMjAtMDM6MDAifWgloCNw3WGxIdv7KQjCNsIE_EaSrdzHBewHte_GdPLa0M6AHNsCtuV8PaDbfPX_nVJLgKEuiquGigy1x7eJZgo';

$config = new Configuration();
$config->setAuthentication('ACCOUNT_KEY', $accountKey);
$config->setAuthentication('ACCOUNT_TOKEN', $accountToken);

##### CREATE A PAYMENT BY BOLETO #####

/*

$customer = new Customer();
$order    = new Order();
$items    = new Items();

$customer->setCode('123456');
$customer->setName('Fulano de Tal');
$customer->setDocument('44135836801');
$customer->setEmail('fulano@gmail.com');
$customer->setPhone('11995213200');
$customer->setBirth('1995-08-24');

$order->setCode('4');
$order->setNotificationUrl('https://my-store.com/postback/');
$order->setPurchaseDate('2019-11-22 14:35:10');
$order->setValue('199.00');
$order->setPaymentMethod(Transaction::BOLETO);

for ($i = 1; $i <= 10; $i++) {
    $items->setId('123');
    $items->setDescription('Product number: ' . $i);
    $items->setValue('19.90');
    $items->setQuantity('1');

    $order->setItems($items);
}

$boleto = new Transaction();
$boleto->setCustomer($customer);
$boleto->setOrder($order);

$requestOrder = new OrderRequest($boleto->container, $config, false);

try {
    $request = $requestOrder->run();
    var_dump($request);
} catch (Exception $e) {
    var_dump($e);
    echo 'Exception when calling Order request->run: ', $e->getMessage(), PHP_EOL;
}

*/

##### CREATE A PAYMENT BY DEBIT #####

/*
$customer = new Customer();
$order    = new Order();
$items    = new Items();

$customer->setCode('123456');
$customer->setName('Fulano de Tal');
$customer->setDocument('44135836801');
$customer->setEmail('fulano@gmail.com');
$customer->setPhone('11995213200');
$customer->setBirth('1995-08-24');

$order->setCode('12345678');
$order->setNotificationUrl('https://my-store.com/postback/');
$order->setPurchaseDate('2019-11-22 14:35:10');
$order->setValue('199.00');
$order->setBankSlug(Bank::ITAU);
$order->setPaymentMethod(Transaction::DEPOSIT);

for ($i = 1; $i <= 10; $i++) {
    $items->setId('123');
    $items->setDescription('Product number: ' . $i);
    $items->setValue('19.90');
    $items->setQuantity('1');

    $order->setItems($items);
}

$deposit = new Transaction();
$deposit->setCustomer($customer);
$deposit->setOrder($order);

$requestOrder = new OrderRequest($deposit->container, $config, false);

try {
    $request = $requestOrder->run();
    var_dump($request);
} catch (Exception $e) {
    var_dump($e);
    echo 'Exception when calling Order request->run: ', $e->getMessage(), PHP_EOL;
}

*/

##### CREATE A PAYMENT BY CREDTCARD #####

/*
$customer = new Customer();
$order    = new Order();
$items    = new Items();

$customer->setCode('123456');
$customer->setPhone('11995213200');

$order->setCode('2');
$order->setNotificationUrl('https://my-store.com/postback/');
$order->setRedirectUrl('https://my-store.com/backurl/');
$order->setPurchaseDate('2019-11-22 14:35:10');
$order->setValue('199.00');
$order->setPaymentMethod(Transaction::CREDTCARD);

for ($i = 1; $i <= 10; $i++) {
    $items->setId('123');
    $items->setDescription('Product number: ' . $i);
    $items->setValue('19.90');
    $items->setQuantity('1');

    $order->setItems($items);
}

$credtcard = new Transaction();
$credtcard->setCustomer($customer);
$credtcard->setOrder($order);

$requestOrder = new OrderRequest($credtcard->container, $config, false);

try {
    $request = $requestOrder->run();
    var_dump($request);
} catch (Exception $e) {
    var_dump($e);
    echo 'Exception when calling Order request->run: ', $e->getMessage(), PHP_EOL;
}

*/
