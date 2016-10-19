<?php

namespace Integracao\ControlPay\Contracts\Login;

/**
 * Class LoginRequest
 * @package Integracao\ControlPay\Contracts\Login
 */
class LoginRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $cpfCnpj;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var integer
     */
    private $pessoaId;

    /**
     * Login constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     * @return Login
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Login
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return int
     */
    public function getPessoaId()
    {
        return $this->pessoaId;
    }

    /**
     * @param int $pessoaId
     * @return Login
     */
    public function setPessoaId($pessoaId)
    {
        $this->pessoaId = $pessoaId;
        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            "cpfCnpj" => $this->cpfCnpj,
            "senha" => $this->senha,
            "pessoaId" => $this->pessoaId,
        ];
    }


}