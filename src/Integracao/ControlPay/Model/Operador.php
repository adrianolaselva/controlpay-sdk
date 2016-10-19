<?php

namespace Integracao\ControlPay\Model;

/**
 * Class Operador
 * @package Integracao\ControlPay\Model
 */
class Operador
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Pessoa
     */
    private $pessoa;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $ativo;

    /**
     * Operador constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Operador
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Operador
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Operador
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return Operador
     */
    public function setLogin($login)
    {
        $this->login = $login;
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
     * @return Operador
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Operador
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param string $ativo
     * @return Operador
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

}