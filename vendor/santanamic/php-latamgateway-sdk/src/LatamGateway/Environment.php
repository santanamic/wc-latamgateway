<?php

namespace LatamGateway;

/**
 * Exceptions class for HTTP conections
 *
 * @category Class
 */
class Environment
{
    private $api;

    /**
     * Constructor
     *
     * @param string  $api       URL requests
     * @param int     $apiQuery  URL inquiries
     */
    private function __construct($api, $form)
    {
        $this->api = $api;
        $this->form = $form;
    }

    public static function sandbox()
    {
        $api = 'https://homolog.latamgateway.com/api/v1/';
        $form = 'https://homolog.latamgateway.com/checkout/payment/';

        return new Environment($api, $form);
    }

    public static function production()
    {
        $api = 'https://latamgateway.com/api/v1/';
        $form = 'https://latamgateway.com/checkout/payment/';

        return new Environment($api, $form);
    }

    public function getApiURL()
    {
        return $this->api;
    }

    public function getFormURL()
    {
        return $this->form;
    }
}
