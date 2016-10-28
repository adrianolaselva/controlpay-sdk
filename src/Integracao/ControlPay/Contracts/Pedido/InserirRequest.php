<?php

namespace Integracao\ControlPay\Contracts\Pedido;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Produto;

/**
 * Class InserirRequest
 * @package Integracao\ControlPay\Contracts\IntencaoVenda
 */
class InserirRequest implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $pedidoId;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var double
     */
    private $valorTotalPedido;

    /**
     * @var string
     */
    private $urlRetorno;

    /**
     * @var Produto
     */
    private $produtosPedido;

    /**
     * @return int
     */
    public function getPedidoId()
    {
        return $this->pedidoId;
    }

    /**
     * @param int $pedidoId
     * @return InserirRequest
     */
    public function setPedidoId($pedidoId)
    {
        $this->pedidoId = $pedidoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param string $referencia
     * @return InserirRequest
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTotalPedido()
    {
        return $this->valorTotalPedido;
    }

    /**
     * @param float $valorTotalPedido
     * @return InserirRequest
     */
    public function setValorTotalPedido($valorTotalPedido)
    {
        $this->valorTotalPedido = $valorTotalPedido;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlRetorno()
    {
        return $this->urlRetorno;
    }

    /**
     * @param string $urlRetorno
     * @return InserirRequest
     */
    public function setUrlRetorno($urlRetorno)
    {
        $this->urlRetorno = $urlRetorno;
        return $this;
    }

    /**
     * @return Produto
     */
    public function getProdutosPedido()
    {
        return $this->produtosPedido;
    }

    /**
     * @param Produto $produtosPedido
     * @return InserirRequest
     */
    public function setProdutosPedido($produtosPedido)
    {
        $this->produtosPedido = $produtosPedido;
        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'pedidoId' => $this->pedidoId,
            'referencia' => $this->referencia,
            'ValorTotalPedido' => $this->valorTotalPedido,
            'urlRetorno' => $this->urlRetorno,
            'produtosPedido' => $this->produtosPedido,
        ];
    }

}