<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 19/10/2016
 * Time: 15:34
 */

namespace Integracao\ControlPay\Model;

/**
 * Class ProdutoStatus
 * @package Integracao\ControlPay\Model
 */
class ProdutoStatus
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
     * ProdutoStatus constructor.
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
     * @return ProdutoStatus
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
     * @return ProdutoStatus
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

}