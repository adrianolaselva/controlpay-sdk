<?php

namespace Integracao\ControlPay\Model;

/**
 * Class IntencaoVendaStatus
 * @package Integracao\ControlPay\Model
 */
class IntencaoVendaStatus implements \JsonSerializable
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
     * IntencaoVendaStatus constructor.
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
     * @return IntencaoVendaStatus
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
     * @return IntencaoVendaStatus
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