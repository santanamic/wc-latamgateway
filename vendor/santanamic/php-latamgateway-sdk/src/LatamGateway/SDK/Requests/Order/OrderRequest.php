<?php

namespace LatamGateway\SDK\Requests\Order;

use LatamGateway\SDK\Requests\AbstractRequest;

class OrderRequest extends AbstractRequest
{
    public function run()
    {
        $url = parent::getEnvironment()->getApiURL();
        $data = parent::getData();
        $paymentMethod = $data['order']['payment_method'];

        switch ($paymentMethod) {
            case $paymentMethod === 'credit_card':
                parent::setResourcePath('checkout/form');

            break;

            default:
                parent::setResourcePath('order');

            break;
        }

        parent::setHttpBody($data);
        parent::getClient()->getConfig()->setHost($url);
        parent::setTypeResponse('LatamGateway\SDK\Model\Transaction');

        return parent::sendRequest();
    }
}
