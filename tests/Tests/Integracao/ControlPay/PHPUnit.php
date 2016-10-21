<?php

namespace Tests\Integracao\ControlPay;

use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;

/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 21/10/2016
 * Time: 08:04
 */
class PHPUnit extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Integracao\ControlPay\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $pwd;

    /**
     * @var string
     */
    protected $key;

    /**
     * PHPUnit constructor.
     */
    public function __construct()
    {
        $this->host = getenv(ControlPayParameter::CONTROLPAY_HOST);
        $this->user = getenv(ControlPayParameter::CONTROLPAY_USER);
        $this->pwd = getenv(ControlPayParameter::CONTROLPAY_PWD);
        $this->key = getenv(ControlPayParameter::CONTROLPAY_KEY);
        $this->client = new \Integracao\ControlPay\Client([
            ControlPayParameter::CONTROLPAY_HOST => $this->host,
            ControlPayParameter::CONTROLPAY_TIMEOUT => 10,
            ControlPayParameter::CONTROLPAY_OAUTH_TYPE => KeyQueryStringAuthentication::class,
            ControlPayParameter::CONTROLPAY_USER => $this->user,
            ControlPayParameter::CONTROLPAY_PWD => $this->pwd,
            ControlPayParameter::CONTROLPAY_KEY => $this->key
        ]);
    }
}