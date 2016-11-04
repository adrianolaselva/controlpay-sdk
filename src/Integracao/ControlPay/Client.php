<?php
namespace Integracao\ControlPay;

use Integracao\ControlPay\Constants\ControlPayParameterConst;
use Integracao\ControlPay\Factory\AuthenticationFactory;
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
    const CONTROLPAY_HOST_DEFAULT = "";

    /**
     * Timeout padrão
     *
     * @var integer
     */
    const CONTROLPAY_TIMEOUT_DEFAULT = 25;

    /**
     * Timeout padrão
     *
     * @var IAuthentication
     */
    const CONTROLPAY_OAUTH_TYPE_DEFAULT = KeyQueryStringAuthentication::class;

    /**
     * Parâmetros, pré inicializado com valores padrão
     *
     * @var array
     */
    private $_params = [
        ControlPayParameterConst::CONTROLPAY_HOST => self::CONTROLPAY_HOST_DEFAULT,
        ControlPayParameterConst::CONTROLPAY_TIMEOUT => self::CONTROLPAY_TIMEOUT_DEFAULT,
        ControlPayParameterConst::CONTROLPAY_OAUTH_TYPE => self::CONTROLPAY_OAUTH_TYPE_DEFAULT
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
     * @param array[ControlPayParameterConst::{PARAM} => '', ...] $params
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
        return isset($this->_params[$key]) ? $this->_params[$key] : null;
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
        $this->_params[ControlPayParameterConst::CONTROLPAY_HOST] = getenv('CONTROLPAY_HOST');
        $this->_params[ControlPayParameterConst::CONTROLPAY_TIMEOUT] = getenv('CONTROLPAY_TIMEOUT');
        $this->_params[ControlPayParameterConst::CONTROLPAY_USER] = getenv('CONTROLPAY_USER');
        $this->_params[ControlPayParameterConst::CONTROLPAY_PWD] = getenv('CONTROLPAY_PWD');
        $this->_params[ControlPayParameterConst::CONTROLPAY_KEY] = getenv('CONTROLPAY_KEY');
        $this->_params[ControlPayParameterConst::CONTROLPAY_DEFAULT_PESSOA_ID] = getenv('CONTROLPAY_DEFAULT_PESSOA_ID');
        $this->_params[ControlPayParameterConst::CONTROLPAY_DEFAULT_TERMINAL_ID] = getenv('CONTROLPAY_DEFAULT_TERMINAL_ID');
        $this->_params[ControlPayParameterConst::CONTROLPAY_DEFAULT_PRODUTO_ID] = getenv('CONTROLPAY_DEFAULT_PRODUTO_ID');
        $this->_params[ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_PAGAMENTO_ID] = getenv('CONTROLPAY_DEFAULT_FORMA_PAGAMENTO_ID');
        $this->_params[ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_AGUARDA_TEF] = getenv('CONTROLPAY_DEFAULT_FORMA_AGUARDA_TEF');
        $this->_params[ControlPayParameterConst::CONTROLPAY_DEFAULT_SENHA_TECNICA] = getenv('CONTROLPAY_DEFAULT_SENHA_TECNICA');
        $this->_params[ControlPayParameterConst::CONTROLPAY_OAUTH_TYPE] = KeyQueryStringAuthentication::class;

        if(!is_null($params))
            foreach ($params as $key => $param)
            {
                if(!in_array($key, [
                    ControlPayParameterConst::CONTROLPAY_HOST,
                    ControlPayParameterConst::CONTROLPAY_TIMEOUT,
                    ControlPayParameterConst::CONTROLPAY_USER,
                    ControlPayParameterConst::CONTROLPAY_PWD,
                    ControlPayParameterConst::CONTROLPAY_KEY,
                    ControlPayParameterConst::CONTROLPAY_OAUTH_TYPE,
                    ControlPayParameterConst::CONTROLPAY_DEFAULT_PESSOA_ID,
                    ControlPayParameterConst::CONTROLPAY_DEFAULT_TERMINAL_ID,
                    ControlPayParameterConst::CONTROLPAY_DEFAULT_PRODUTO_ID,
                    ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_PAGAMENTO_ID,
                    ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_AGUARDA_TEF,
                    ControlPayParameterConst::CONTROLPAY_DEFAULT_SENHA_TECNICA
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







