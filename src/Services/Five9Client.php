<?php


namespace Tuto1902\Five9Client\Services;


use Illuminate\Support\Facades\Config;
use Tuto1902\Five9Client\Contracts\Five9ClientContract;

class Five9Client implements Five9ClientContract
{
    protected $client;

    public function __construct()
    {
        // Attempt a connection to Five9 API

        $options = [
            'login' => Config::get('five9.login'),
            'password' => Config::get('five9.password'),
            'trace' => true
        ];

        $wsdl = Config::get('five9.wsdl') . 'user=' . $options['login'];
        $this->client = new \SoapClient( $wsdl, $options );
    }

    public function __call($method, $arguments)
    {
        return $this->client->$method($arguments[0]);
    }
}