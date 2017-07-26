<?php

namespace Integracao\ControlPay\Impl;

use Integracao\ControlPay\API\LoginApi;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Contracts\Login\LoginRequest;
use Integracao\ControlPay\Interfaces\IAuthentication;

/**
 * Class KeyQueryStringAuthentication
 * @package Integracao\ControlPay\Impl
 */
class KeyQueryStringAuthentication implements IAuthentication
{
    /**
     * @var
     */
    private $user;
    /**
     * @var
     */
    private $password;
    /**
     * @var null
     */
    private $pessoaId;

    /**
     * @var LoginApi
     */
    private $_loginApi;
    /**
     * @var null
     */
    private $key;

    /**
     * KeyQueryStringAuthentication constructor.
     */
    public function __construct($user, $password, $key = null, $pessoaId = null, Client $client)
    {
        $this->_loginApi = new LoginApi($client);
        $this->user = $user;
        $this->password = $password;
        $this->pessoaId = $pessoaId;
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getAuthorization()
    {
        if(!empty($this->key))
            return $this->key;

        $response = $this->_loginApi->login(
            (new LoginRequest())
                ->setPessoaId($this->pessoaId)
                ->setSenha($this->password)
                ->setCpfCnpj($this->user)
        );
        return $response->getPessoa()->getKey();
    }

}