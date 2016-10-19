<?php

namespace Integracao\ControlPay\Contracts\Login;
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Device;
use Integracao\ControlPay\Model\Operador;
use Integracao\ControlPay\Model\Pessoa;

/**
 * Class ConsultaLoginResponse
 * @package Integracao\ControlPay\Contracts\Login
 */
class ConsultaLoginResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var Pessoa
     */
    private $pessoa;

    /**
     * @var Operador
     */
    private $operador;

    /**
     * LoginResponse constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     * @return LoginResponse
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);
        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param Pessoa $pessoa
     * @return LoginResponse
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

        if(is_array($pessoa))
            $this->pessoa = SerializerHelper::denormalize($this->pessoa, Pessoa::class);

        return $this;
    }

    /**
     * @return Operador
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param Operador $operador
     * @return LoginResponse
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;

        if(is_array($this->operador))
            $this->operador = SerializerHelper::denormalize($this->operador, Operador::class);

        return $this;
    }

}