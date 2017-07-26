<?php

namespace Integracao\ControlPay\Model;

/**
 * Class PedidoStatus
 * @package Integracao\ControlPay\Model
 */
class PedidoStatus implements \JsonSerializable
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PedidoStatus
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
     * @return PedidoStatus
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
        ];
    }

}