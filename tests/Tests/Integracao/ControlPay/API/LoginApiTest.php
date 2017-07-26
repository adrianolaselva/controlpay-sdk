<?php

namespace Tests\Integracao\ControlPay\API;

use Integracao\ControlPay\API\LoginApi;
use Integracao\ControlPay\Contracts\Login\ConsultaLoginRequest;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\PessoaStatus;
use Tests\Integracao\ControlPay\PHPUnit;

/**
 * Class LoginApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class LoginApiTest extends PHPUnit
{

    /**
     * @var LoginApi
     */
    private $_loginApi;

    /**
     * UsuarioApi constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_loginApi = new LoginApi($this->client);
    }

    public function test_consultaLogin()
    {
        $response = $this->_loginApi->consultaLogin(
            (new ConsultaLoginRequest())
                ->setCpfCnpj($this->user)
                ->setSenha($this->pwd)
        );

        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_loginApi->getResponse());
        $this->assertNotEmpty($response->getPessoa());
        $this->assertInstanceOf(Pessoa::class, $response->getPessoa());
        $this->assertNotEmpty($response->getPessoa()->getPessoaStatus());
        $this->assertInstanceOf(PessoaStatus::class, $response->getPessoa()->getPessoaStatus());
        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
    }

//    public function test_logOut()
//    {
//        $response = $this->_loginApi->logOut();
//
//        $this->assertTrue($response);
//    }


}