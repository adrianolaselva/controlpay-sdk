<?php

namespace Integracao\ControlPay\Model;

/**
 * Class ItemProduto
 * @package Integracao\ControlPay\Model
 */
class ItemProduto implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $itemProdutoId;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var integer
     */
    private $quantidade;

    /**
     * @var double
     */
    private $valor;

    /**
     * ItemProduto constructor.
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
     * @return ItemProduto
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemProdutoId()
    {
        return $this->itemProdutoId;
    }

    /**
     * @param int $itemProdutoId
     * @return ItemProduto
     */
    public function setItemProdutoId($itemProdutoId)
    {
        $this->itemProdutoId = $itemProdutoId;
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
     * @return ItemProduto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param int $quantidade
     * @return ItemProduto
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return ItemProduto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'itemProdutoId' => $this->itemProdutoId,
            'nome' => $this->nome,
            'quantidade' => $this->quantidade,
            'valor' => $this->valor,
        ];
    }

}