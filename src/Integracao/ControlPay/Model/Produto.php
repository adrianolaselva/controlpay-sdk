<?php

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class Produto
 * @package Integracao\ControlPay\Model
 */
class Produto implements \JsonSerializable
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
    private $descricao;

    /**
     * @var integer
     */
    private $quantidade;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var float
     */
    private $preco;

    /**
     * @var string
     */
    private $fotoThumbnail;

    /**
     * @var string
     */
    private $ean;

    /**
     * @var ProdutoStatus
     */
    private $produtoStatus;

    /**
     * Produto constructor.
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
     * @return Produto
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
     * @return Produto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Produto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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
     * @return Produto
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
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
     * @return Produto
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @return float
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     * @return Produto
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }

    /**
     * @return string
     */
    public function getFotoThumbnail()
    {
        return $this->fotoThumbnail;
    }

    /**
     * @param string $fotoThumbnail
     * @return Produto
     */
    public function setFotoThumbnail($fotoThumbnail)
    {
        $this->fotoThumbnail = $fotoThumbnail;
        return $this;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     * @return Produto
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return ProdutoStatus
     */
    public function getProdutoStatus()
    {
        return $this->produtoStatus;
    }

    /**
     * @param ProdutoStatus $produtoStatus
     * @return Produto
     */
    public function setProdutoStatus($produtoStatus)
    {
        $this->produtoStatus = $produtoStatus;

        if(is_array($this->produtoStatus))
            $this->produtoStatus = SerializerHelper::denormalize($this->produtoStatus, ProdutoStatus::class);

        return $this;
    }

    function jsonSerialize()
    {
        return [
            "Id" => $this->id,
            "Nome" => $this->nome,
            "Descricao" => $this->descricao,
            "Valor" => $this->valor,
            "Quantidade" => $this->quantidade,
            "preco" => $this->preco,
            "ean" => $this->ean,
            "produtoStatus" => $this->produtoStatus,
            "fotoThumbnail" => $this->fotoThumbnail,
        ];
    }


}