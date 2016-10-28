<?php

namespace Integracao\ControlPay\Factory;

use Integracao\ControlPay\Client;
use Integracao\ControlPay\Constants\ControlPayParameterConst;
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
        if(!isset($params[ControlPayParameterConst::CONTROLPAY_OAUTH_TYPE]))
            throw new \Exception("Tipo de autenticação não especificado");

        switch ($params[ControlPayParameterConst::CONTROLPAY_OAUTH_TYPE])
        {
            case BasicAuthentication::class:
                return new BasicAuthentication(
                    isset($params[ControlPayParameterConst::CONTROLPAY_USER]) ?$params[ControlPayParameterConst::CONTROLPAY_USER] : null,
                    isset($params[ControlPayParameterConst::CONTROLPAY_PWD]) ?$params[ControlPayParameterConst::CONTROLPAY_PWD] : null,
                    isset($params[ControlPayParameterConst::CONTROLPAY_KEY]) ?$params[ControlPayParameterConst::CONTROLPAY_KEY] : null
                );
                break;
            case KeyQueryStringAuthentication::class:
                return new KeyQueryStringAuthentication(
                    isset($params[ControlPayParameterConst::CONTROLPAY_USER]) ?$params[ControlPayParameterConst::CONTROLPAY_USER] : null,
                    isset($params[ControlPayParameterConst::CONTROLPAY_PWD]) ?$params[ControlPayParameterConst::CONTROLPAY_PWD] : null,
                    isset($params[ControlPayParameterConst::CONTROLPAY_KEY]) ?$params[ControlPayParameterConst::CONTROLPAY_KEY] : null,
                    isset($params[ControlPayParameterConst::CONTROLPAY_DEFAULT_PESSOA_ID]) ?$params[ControlPayParameterConst::CONTROLPAY_DEFAULT_PESSOA_ID] : null,
                    $client
                );
                break;
        }

        throw new \Exception("Implementação não tratada no factory");
    }
}