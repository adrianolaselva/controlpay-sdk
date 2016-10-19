<?php

namespace Integracao\ControlPay\Factory;

use Integracao\ControlPay\Client;
use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Impl\BasicAuthentication;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;
use Integracao\ControlPay\Interfaces\IAuthentication;

/**
 * Class AuthenticationFactory
 * @package Integracao\NTKOnline
 */
class AuthenticationFactory
{
    /**
     * @param array $params
     * @return IAuthentication
     * @throws \Exception
     */
    public static function getInstance(array $params, Client $client = null)
    {
        if(!isset($params[ControlPayParameter::CONTROLPAY_OAUTH_TYPE]))
            throw new \Exception("Tipo de autenticação não especificado");

        switch ($params[ControlPayParameter::CONTROLPAY_OAUTH_TYPE])
        {
            case BasicAuthentication::class:
                return new BasicAuthentication(
                    isset($params[ControlPayParameter::CONTROLPAY_USER]) ?$params[ControlPayParameter::CONTROLPAY_USER] : null,
                    isset($params[ControlPayParameter::CONTROLPAY_PWD]) ?$params[ControlPayParameter::CONTROLPAY_PWD] : null
                );
                break;
            case KeyQueryStringAuthentication::class:
                return new KeyQueryStringAuthentication(
                    isset($params[ControlPayParameter::CONTROLPAY_USER]) ?$params[ControlPayParameter::CONTROLPAY_USER] : null,
                    isset($params[ControlPayParameter::CONTROLPAY_PWD]) ?$params[ControlPayParameter::CONTROLPAY_PWD] : null,
                    isset($params[ControlPayParameter::CONTROLPAY_PESSOAID]) ?$params[ControlPayParameter::CONTROLPAY_PESSOAID] : null,
                    $client
                );
                break;
        }

        throw new \Exception("Implementação não tratada no factory");
    }
}