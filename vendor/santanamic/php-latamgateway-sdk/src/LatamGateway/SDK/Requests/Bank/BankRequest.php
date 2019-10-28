<?php

namespace LatamGateway\SDK\Requests\Bank;

use LatamGateway\SDK\Requests\AbstractRequest;

class BankRequest extends AbstractRequest
{
    public function run()
    {
        $url = parent::getEnvironment()->getApiURL();

        parent::setMethod('GET');
        parent::setResourcePath('banks');
        parent::getClient()->getConfig()->setHost($url);
        parent::setTypeResponse('LatamGateway\SDK\Model\Bank');

        return parent::sendRequest();
    }
}
