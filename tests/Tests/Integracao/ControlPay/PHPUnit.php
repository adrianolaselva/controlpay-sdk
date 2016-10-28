<?php

namespace Tests\Integracao\ControlPay;

use Integracao\ControlPay\Constants\ControlPayParameterConst;
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
        $this->host = getenv(ControlPayParameterConst::CONTROLPAY_HOST);
        $this->user = getenv(ControlPayParameterConst::CONTROLPAY_USER);
        $this->pwd = getenv(ControlPayParameterConst::CONTROLPAY_PWD);
        $this->key = getenv(ControlPayParameterConst::CONTROLPAY_KEY);
        $this->client = new \Integracao\ControlPay\Client([
            ControlPayParameterConst::CONTROLPAY_HOST => $this->host,
            ControlPayParameterConst::CONTROLPAY_TIMEOUT => 10,
            ControlPayParameterConst::CONTROLPAY_OAUTH_TYPE => KeyQueryStringAuthentication::class,
            ControlPayParameterConst::CONTROLPAY_USER => $this->user,
            ControlPayParameterConst::CONTROLPAY_PWD => $this->pwd,
            ControlPayParameterConst::CONTROLPAY_KEY => $this->key
        ]);
    }
}