<?php
namespace Integracao\ControlPay;

use GuzzleHttp;
use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;

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
     * @var GuzzleHttp\Query
     */
    protected $query;

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
            $this->_client = new Client();

        $this->query = new GuzzleHttp\Query();
        $this->query->setEncodingType(false);


        switch ($this->_client->getParameter(ControlPayParameter::CONTROLPAY_OAUTH_TYPE))
        {
            case KeyQueryStringAuthentication::class:
                $this->query->set('key', $this->_client->getAuthentication());
                break;
            default:
                $this->headers['Authorization'] = $this->_client->getAuthentication();
                break;
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
                'query' => $this->query
            ]
        ]);
    }

    /**
     * Monta parâmetros para serem passados por querystring
     *
     * @param array $param
     * @return string
     */
    protected function getQueryString(array $param, $urlEncode = false)
    {
        if(is_null($param))
            return null;

        $queryString = implode(array_map(function($v, $k) use ($urlEncode){
            if(is_bool($v))
                $v = ($v ? 'true' : 'false');
            return sprintf("%s=%s&",$k, $urlEncode ? urlencode($v) : $v);
        },$param,array_keys($param)));

        return $queryString;
    }

}