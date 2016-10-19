<?php
namespace Integracao\ControlPay;

use GuzzleHttp;
use Integracao\ControlPay\Constants\ControlPayParameter;

/**
 * Class AbstractAPI
 * @package Integracao\NTKPedido
 */
abstract class AbstractAPI
{
    /**
     * @var Client
     */
    protected $_client;

    /**
     * @var Curl
     */
    protected $_httpClient;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json; charset=utf-8',
        'Cache-Control' => 'no-cache',
    ];

    /**
     * AbstractAPI constructor.
     * @param $endpoint
     * @param Client|null $client
     */
    protected function __construct($endpoint, Client $client = null)
    {
        $this->endpoint = $endpoint;
        $this->_client = $client;

        if(is_null($this->_client))
        {
            $this->_client = new Client();
        }

        $this->_httpClient = new GuzzleHttp\Client([
            'base_url' => sprintf("%s/%s/",
                $client->getParameter(ControlPayParameter::CONTROLPAY_HOST),
                $this->endpoint
            ),
            'timeout' => $client->getParameter(ControlPayParameter::CONTROLPAY_TIMEOUT),
            'verify' => false,
            'defaults' => [
                'headers' => $this->headers,
                'query' => [
                    'Key' => $this->_client->getAuthentication()
                ]
            ]
        ]);
    }

}