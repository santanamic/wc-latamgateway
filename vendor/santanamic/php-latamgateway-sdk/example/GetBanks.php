<?php

namespace LatamGateway;

use LatamGateway\SDK\Requests\Bank\BankRequest;

require_once('../vendor/autoload.php');

$accountKey = 'lagw_2349ed9793f199a912d980be35cbfde368bdc2c71d1da6f45c2eb77d196ba34c';
$accountToken = 'v2.public.eyJrZXkiOiJsYWd3XzIzNDllZDk3OTNmMTk5YTkxMmQ5ODBiZTM1Y2JmZGUzNjhiZGMyYzcxZDFkYTZmNDVjMmViNzdkMTk2YmEzNGMiLCJleHBpcmVzX2F0IjoiMjAxOS0xMC0yM1QxNzozNzowNS4wMjAtMDM6MDAifWgloCNw3WGxIdv7KQjCNsIE_EaSrdzHBewHte_GdPLa0M6AHNsCtuV8PaDbfPX_nVJLgKEuiquGigy1x7eJZgo';

$config = new Configuration();
$config->setAuthentication('ACCOUNT_KEY', $accountKey);
$config->setAuthentication('ACCOUNT_TOKEN', $accountToken);

$requestBanck = new BankRequest(false, $config, false);

try {
    $request = $requestBanck->run();
    var_dump($request->getAvailableBanks());
} catch (Exception $e) {
    var_dump($e);
    echo 'Exception when calling Bank request->run: ', $e->getMessage(), PHP_EOL;
}
