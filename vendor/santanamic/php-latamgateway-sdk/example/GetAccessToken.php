<?php

namespace LatamGateway;

use LatamGateway\SDK\Model\AccessToken;
use LatamGateway\SDK\Requests\Auth\OAuth2Request;

require_once('../vendor/autoload.php');

$accountKey = 'lagw_2349ed9793f199a912d980be35cbfde368bdc2c71d1da6f45c2eb77d196ba34c';

$acessToken = new AccessToken();
$acessToken->setAccountKey($accountKey);
$acessToken->setEmail('latamemail@mail.pt');
$acessToken->setPassword('latampassword');

$requestAcessToken = new OAuth2Request($acessToken->container, null, false);

try {
    $auth = $requestAcessToken->run();
    var_dump($auth);
} catch (Exception $e) {
    var_dump($e);
    echo 'Exception when calling Acess Token->run: ', $e->getMessage(), PHP_EOL;
}
