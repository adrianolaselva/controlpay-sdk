<?php

namespace Integracao\ControlPay\Model;

/**
 * Class PagamentoExternoStatus
 * @package Integracao\ControlPay\Model
 */
class PagamentoExternoStatus implements \JsonSerializable
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
     * PagamentoExternoStatus constructor.
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
     * @return PagamentoExternoStatus
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
     * @return PagamentoExternoStatus
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