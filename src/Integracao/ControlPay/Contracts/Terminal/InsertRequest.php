<?php

namespace Integracao\ControlPay\Contracts\Terminal;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Impressora;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\Terminal;

/**
 * Class InsertRequest
 * @package Integracao\ControlPay\Contracts\Produto
 */
class InsertRequest implements \JsonSerializable
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
     * @var string
     */
    private $impressora;

    /**
     * @var Pessoa
     */
    private $pessoa;

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

    /**
     * @return string
     */
    public function getImpressora()
    {
        return $this->impressora;
    }

    /**
     * @param string $impressora
     * @return Terminal
     */
    public function setImpressora($impressora)
    {
        $this->impressora = $impressora;

        if(is_array($this->impressora))
            $this->impressora = SerializerHelper::denormalize($this->impressora, Impressora::class);

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
     * @return Terminal
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

        if(is_array($this->pessoa))
            $this->pessoa = SerializerHelper::denormalize($this->pessoa, Pessoa::class);

        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'impressora' => $this->impressora,
            'pessoa' => $this->pessoa,
        ];
    }

}