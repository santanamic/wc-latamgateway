<?php

namespace LatamGateway\SDK\Requests\Auth;

use LatamGateway\SDK\Requests\AbstractRequest;

class OAuth2Request extends AbstractRequest
{
    public function run()
    {
        $url = parent::getEnvironment()->getApiURL();
        $data = parent::getData();
        $accountKey = $data['AccountKey'];
        $bodyParams = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
        parent::setResourcePath('auth');
        parent::setHttpBody($bodyParams);
        parent::setTypeResponse('LatamGateway\SDK\Model\AccessToken');
        parent::getClient()->getConfig()->setAuthentication('ACCOUNT_KEY', $accountKey);
        parent::getClient()->getConfig()->setHost($url);

        return parent::sendRequest();
    }
}
