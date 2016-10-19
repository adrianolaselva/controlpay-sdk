<?php

namespace Integracao\ControlPay\API;

use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Contracts;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class LoginApi
 * @package Integracao\ControlPay\API
 */
class LoginApi extends AbstractAPI
{

    /**
     * Login constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('login', $client);
    }

    /**
     * @param Contracts\Login\LoginRequest $loginRequest
     * @return Contracts\Login\LoginResponse
     * @throws \Exception
     */
    public function login(Contracts\Login\LoginRequest $loginRequest)
    {
        try{
            $response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($loginRequest)
            ]);

            return SerializerHelper::denormalize(
                $response->json(),
                Contracts\Login\LoginResponse::class
            );
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param Contracts\Login\ConsultaLoginRequest $consultaLoginRequest
     * @return Contracts\Login\ConsultaLoginResponse
     * @throws \Exception
     */
    public function consultaLogin(Contracts\Login\ConsultaLoginRequest $consultaLoginRequest)
    {
        try{
            $response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($consultaLoginRequest)
            ]);

            return SerializerHelper::denormalize(
                $response->json(),
                Contracts\Login\ConsultaLoginResponse::class
            );
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }
}