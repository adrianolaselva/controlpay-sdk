<?php

namespace Integracao\NTKOnline\Api;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\API\LoginApi;
use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Contracts\Login\ConsultaLoginRequest;
use Integracao\ControlPay\Contracts\Login\Login;
use Integracao\ControlPay\Contracts\Login\LoginRequest;
use Integracao\ControlPay\Impl\BasicAuthentication;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\PessoaStatus;
use Integracao\NTKOnline\Client;

/**
 * Class LoginApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class LoginApiTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LoginApi
     */
    private $_loginApi;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pwd;

    /**
     * UsuarioApi constructor.
     */
    public function __construct()
    {
        $this->host = getenv(ControlPayParameter::CONTROLPAY_HOST);
        $this->user = getenv(ControlPayParameter::CONTROLPAY_USER);
        $this->pwd = getenv(ControlPayParameter::CONTROLPAY_PWD);
        $client = new \Integracao\ControlPay\Client([
            ControlPayParameter::CONTROLPAY_HOST => $this->host,
            ControlPayParameter::CONTROLPAY_TIMEOUT => 10,
            ControlPayParameter::CONTROLPAY_OAUTH_TYPE => KeyQueryStringAuthentication::class,
            ControlPayParameter::CONTROLPAY_USER => $this->user,
            ControlPayParameter::CONTROLPAY_PWD => $this->pwd,
        ]);

        $this->_loginApi = new LoginApi($client);
    }

    public function test_consultaLogin()
    {
        $response = $this->_loginApi->consultaLogin(
            (new ConsultaLoginRequest())
                ->setCpfCnpj($this->user)
                ->setSenha($this->pwd)
        );

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