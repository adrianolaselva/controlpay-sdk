<?php

namespace Integracao\ControlPay\Model;

use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class Pedido
 * @package Integracao\ControlPay\Model
 */
class Pedido implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

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
     * @var array
     */
    private $produtos;

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $hora;

    /**
     * @var double
     */
    private $valor;

    /**
     * @var string
     */
    private $valorFormat;

    /**
     * @var double
     */
    private $valorAberto;

    /**
     * @var string
     */
    private $valorAbertoFormat;

    /**
     * @var double
     */
    private $valorOriginalPago;

    /**
     * @var string
     */
    private $valorOriginalPagoFormat;

    /**
     * @var double
     */
    private $valorOriginalEmPagamento;

    /**
     * @var string
     */
    private $valorOriginalEmPagamentoFormat;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var integer
     */
    private $quantidade;

    /**
     * @var integer
     */
    private $quantidadeTransacoes;

    /**
     * @var PedidoStatus
     */
    private $pedidoStatus;

    /**
     * Pedido constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getPedidoId()
    {
        return $this->pedidoId;
    }

    /**
     * @param int $pedidoId
     * @return Pedido
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
     * @return Pedido
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
     * @return Pedido
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
     * @return Pedido
     */
    public function setUrlRetorno($urlRetorno)
    {
        $this->urlRetorno = $urlRetorno;
        return $this;
    }

    /**
     * @return array
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * @param $produtos
     * @return $this
     */
    public function setProdutos($produtos)
    {
        foreach ($produtos as $produto)
            $this->produtos[] = SerializerHelper::denormalize($produto, Produto::class);

        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return Pedido
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param string $hora
     * @return Pedido
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
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
     * @return Pedido
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorFormat()
    {
        return $this->valorFormat;
    }

    /**
     * @param string $valorFormat
     * @return Pedido
     */
    public function setValorFormat($valorFormat)
    {
        $this->valorFormat = $valorFormat;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorAberto()
    {
        return $this->valorAberto;
    }

    /**
     * @param float $valorAberto
     * @return Pedido
     */
    public function setValorAberto($valorAberto)
    {
        $this->valorAberto = $valorAberto;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorAbertoFormat()
    {
        return $this->valorAbertoFormat;
    }

    /**
     * @param string $valorAbertoFormat
     * @return Pedido
     */
    public function setValorAbertoFormat($valorAbertoFormat)
    {
        $this->valorAbertoFormat = $valorAbertoFormat;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorOriginalPago()
    {
        return $this->valorOriginalPago;
    }

    /**
     * @param float $valorOriginalPago
     * @return Pedido
     */
    public function setValorOriginalPago($valorOriginalPago)
    {
        $this->valorOriginalPago = $valorOriginalPago;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorOriginalPagoFormat()
    {
        return $this->valorOriginalPagoFormat;
    }

    /**
     * @param string $valorOriginalPagoFormat
     * @return Pedido
     */
    public function setValorOriginalPagoFormat($valorOriginalPagoFormat)
    {
        $this->valorOriginalPagoFormat = $valorOriginalPagoFormat;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorOriginalEmPagamento()
    {
        return $this->valorOriginalEmPagamento;
    }

    /**
     * @param float $valorOriginalEmPagamento
     * @return Pedido
     */
    public function setValorOriginalEmPagamento($valorOriginalEmPagamento)
    {
        $this->valorOriginalEmPagamento = $valorOriginalEmPagamento;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorOriginalEmPagamentoFormat()
    {
        return $this->valorOriginalEmPagamentoFormat;
    }

    /**
     * @param string $valorOriginalEmPagamentoFormat
     * @return Pedido
     */
    public function setValorOriginalEmPagamentoFormat($valorOriginalEmPagamentoFormat)
    {
        $this->valorOriginalEmPagamentoFormat = $valorOriginalEmPagamentoFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return Pedido
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
     * @return Pedido
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @return PedidoStatus
     */
    public function getPedidoStatus()
    {
        return $this->pedidoStatus;
    }

    /**
     * @param PedidoStatus $pedidoStatus
     * @return Pedido
     */
    public function setPedidoStatus($pedidoStatus)
    {
        $this->pedidoStatus = $pedidoStatus;

        if(is_array($this->pedidoStatus))
            $this->pedidoStatus = SerializerHelper::denormalize($this->pedidoStatus, PedidoStatus::class);

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeTransacoes()
    {
        return $this->quantidadeTransacoes;
    }

    /**
     * @param int $quantidadeTransacoes
     * @return Pedido
     */
    public function setQuantidadeTransacoes($quantidadeTransacoes)
    {
        $this->quantidadeTransacoes = $quantidadeTransacoes;
        return $this;
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
     * @return Pedido
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'pedidoId' => $this->pedidoId,
            'referencia' => $this->referencia,
            'valorTotalPedido' => $this->valorTotalPedido,
            'quantidade' => $this->quantidade,
            'quantidadeTransacoes' => $this->quantidadeTransacoes,
            'urlRetorno' => $this->urlRetorno,
            'produtosPedido' => $this->produtos,
            'valor' => $this->valor,
            'valorFormat' => $this->valorFormat,
            'valorOriginalPago' => $this->valorOriginalPago,
            'valorOriginalPagoFormat' => $this->valorOriginalPagoFormat,
            'valorOriginalEmPagamento' => $this->valorOriginalEmPagamento,
            'valorOriginalEmPagamentoFormat' => $this->valorOriginalEmPagamentoFormat,
            'tipo' => $this->tipo,
            'pedidoStatus' => $this->pedidoStatus
        ];
    }

}