<?php

namespace Integracao\ControlPay\Model;

/**
 * Class FluxoPagamento
 * @package Integracao\ControlPay\Model
 */
class FluxoPagamento implements \JsonSerializable
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
     * FluxoPagamento constructor.
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
     * @return FluxoPagamento
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
     * @return FluxoPagamento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
        ];
    }

}