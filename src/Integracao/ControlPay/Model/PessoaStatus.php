<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 19/10/2016
 * Time: 15:23
 */

namespace Integracao\ControlPay\Model;

/**
 * Class PessoaStatus
 * @package Integracao\ControlPay\Model
 */
class PessoaStatus
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * PessoaStatus constructor.
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
     * @return PessoaStatus
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return PessoaStatus
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

}