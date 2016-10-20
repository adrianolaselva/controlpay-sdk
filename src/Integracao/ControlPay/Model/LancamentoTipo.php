<?php

namespace Integracao\ControlPay\Model;

/**
 * Class LancamentoTipo
 * @package Integracao\ControlPay\Model
 */
class LancamentoTipo implements \JsonSerializable
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
     * LancamentoTipo constructor.
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
     * @return LancamentoTipo
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
     * @return LancamentoTipo
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