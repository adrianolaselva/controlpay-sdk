<?php
namespace Integracao\ControlPay;

use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Factory\AuthenticationFactory;
use Integracao\ControlPay\Impl\BasicAuthentication;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;
use Integracao\ControlPay\Interfaces\IAuthentication;

/**
 * Class Client
 * @package Sdk\Integracao\NTKPedido
 */
class Client
{

    /**
     * @var string
     */
    const CONTROLPAY_HOST_DEFAULT_URL = "";

    /**
     * Timeout padrão
     *
     * @var integer
     */
    const CONTROLPAY_HOST_DEFAULT_TIMEOUT = 10;

    /**
     * Parâmetros, pré inicializado com valores padrão
     *
     * @var array
     */
    private $_params = [
        ControlPayParameter::CONTROLPAY_HOST => self::CONTROLPAY_HOST_DEFAULT_URL,
        ControlPayParameter::CONTROLPAY_TIMEOUT => self::CONTROLPAY_HOST_DEFAULT_TIMEOUT
    ];

    /**
     * @var IAuthentication
     */
    private $authentication;

    /**
     * Client constructor
     *
     * $params Configurações opcionais, caso não seja passado os parâmetros será
     * acatado as presentes na raiz "/controlpay-sdk/config.ini"
     *
     * @param array[ControlPayParameter::{PARAM} => '', ...] $params
     * @throws \Exception
     */
    public function __construct(array $params = null, IAuthentication $authentication = null)
    {
        $this->loadParameters($params, $authentication);
    }

    /**
     * Obter parâmetro
     *
     * @param $key
     * @return mixed
     */
    public function getParameter($key)
    {
        return $this->_params[$key];
    }

    /**
     * Adicionar Parâmetro
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function setParameter($key, $value)
    {
        $this->_params[$key] = $value;
        $this->loadParameters($this->_params, $this->authentication);
        return $this;
    }

    /**
     * Carrega parâmetros
     *
     * @param $params
     * @param IAuthentication $authentication
     * @throws \Exception
     */
    private function loadParameters($params, IAuthentication $authentication = null)
    {
        $this->_params[ControlPayParameter::CONTROLPAY_HOST] = getenv('CONTROLPAY_HOST');
        $this->_params[ControlPayParameter::CONTROLPAY_TIMEOUT] = getenv('CONTROLPAY_TIMEOUT');
        $this->_params[ControlPayParameter::CONTROLPAY_USER] = getenv('CONTROLPAY_USER');
        $this->_params[ControlPayParameter::CONTROLPAY_PWD] = getenv('CONTROLPAY_PWD');
        $this->_params[ControlPayParameter::CONTROLPAY_KEY] = getenv('CONTROLPAY_KEY');
        $this->_params[ControlPayParameter::CONTROLPAY_OAUTH_TYPE] = KeyQueryStringAuthentication::class;

        if(!is_null($params))
            foreach ($params as $key => $param)
            {
                if(!in_array($key, [
                    ControlPayParameter::CONTROLPAY_HOST,
                    ControlPayParameter::CONTROLPAY_TIMEOUT,
                    ControlPayParameter::CONTROLPAY_USER,
                    ControlPayParameter::CONTROLPAY_PWD,
                    ControlPayParameter::CONTROLPAY_KEY,
                    ControlPayParameter::CONTROLPAY_OAUTH_TYPE
                ]))
                    throw new \Exception(sprintf("Parâmetro %s inválido", $key));
            }

        if(!is_null($params) && is_array($params))
            foreach ($params as $key => $value)
                $this->_params[$key] = $value;

        if(is_null($authentication))
        {
            $this->authentication = AuthenticationFactory::getInstance($this->_params, $this);
            return;
        }

        $this->authentication = $authentication;
    }

    /**
     * @return IAuthentication
     */
    public function getAuthentication()
    {
        return !empty($this->authentication) ? $this->authentication->getAuthorization() : null;
    }


}







