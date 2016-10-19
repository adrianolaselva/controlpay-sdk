<?php

namespace Integracao\ControlPay\Contracts\Venda;

/**
 * Class Venda
 * @package Integracao\ControlPay\Contracts
 */
class Venda implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $operadorId;

    /**
     * @var integer
     */
    private $pessoaClienteId;

    /**
     * @var integer
     */
    private $formaPagamentoId;

    /**
     * @var integer
     */
    private $terminalId;

    /**
     * @var integer
     */
    private $pedidoId;

    /**
     * @var integer
     */
    private $integracaoId;

    /**
     * @var double
     */
    private $valorTotalVendido;

    /**
     * @var double
     */
    private $valorAcrescimo;

    /**
     * @var double
     */
    private $valorDesconto;

    /**
     * @var string
     */
    private $observacao;

    /**
     * @var boolean
     */
    private $parcelamentoAdmin;

    /**
     * @var integer
     */
    private $quantidadeParcelas;

    /**
     * @var boolean
     */
    private $aguardarTefIniciarTransacao;

    /**
     * @var array
     */
    private $produtosVendidos;

    /**
     * Venda constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getOperadorId()
    {
        return $this->operadorId;
    }

    /**
     * @param int $operadorId
     * @return Venda
     */
    public function setOperadorId($operadorId)
    {
        $this->operadorId = $operadorId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPessoaClienteId()
    {
        return $this->pessoaClienteId;
    }

    /**
     * @param int $pessoaClienteId
     * @return Venda
     */
    public function setPessoaClienteId($pessoaClienteId)
    {
        $this->pessoaClienteId = $pessoaClienteId;
        return $this;
    }

    /**
     * @return int
     */
    public function getFormaPagamentoId()
    {
        return $this->formaPagamentoId;
    }

    /**
     * @param int $formaPagamentoId
     * @return Venda
     */
    public function setFormaPagamentoId($formaPagamentoId)
    {
        $this->formaPagamentoId = $formaPagamentoId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTerminalId()
    {
        return $this->terminalId;
    }

    /**
     * @param int $terminalId
     * @return Venda
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;
        return $this;
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
     * @return Venda
     */
    public function setPedidoId($pedidoId)
    {
        $this->pedidoId = $pedidoId;
        return $this;
    }

    /**
     * @return int
     */
    public function getIntegracaoId()
    {
        return $this->integracaoId;
    }

    /**
     * @param int $integracaoId
     * @return Venda
     */
    public function setIntegracaoId($integracaoId)
    {
        $this->integracaoId = $integracaoId;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTotalVendido()
    {
        return $this->valorTotalVendido;
    }

    /**
     * @param float $valorTotalVendido
     * @return Venda
     */
    public function setValorTotalVendido($valorTotalVendido)
    {
        $this->valorTotalVendido = $valorTotalVendido;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorAcrescimo()
    {
        return $this->valorAcrescimo;
    }

    /**
     * @param float $valorAcrescimo
     * @return Venda
     */
    public function setValorAcrescimo($valorAcrescimo)
    {
        $this->valorAcrescimo = $valorAcrescimo;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    /**
     * @param float $valorDesconto
     * @return Venda
     */
    public function setValorDesconto($valorDesconto)
    {
        $this->valorDesconto = $valorDesconto;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param string $observacao
     * @return Venda
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isParcelamentoAdmin()
    {
        return $this->parcelamentoAdmin;
    }

    /**
     * @param boolean $parcelamentoAdmin
     * @return Venda
     */
    public function setParcelamentoAdmin($parcelamentoAdmin)
    {
        $this->parcelamentoAdmin = $parcelamentoAdmin;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeParcelas()
    {
        return $this->quantidadeParcelas;
    }

    /**
     * @param int $quantidadeParcelas
     * @return Venda
     */
    public function setQuantidadeParcelas($quantidadeParcelas)
    {
        $this->quantidadeParcelas = $quantidadeParcelas;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAguardarTefIniciarTransacao()
    {
        return $this->aguardarTefIniciarTransacao;
    }

    /**
     * @param boolean $aguardarTefIniciarTransacao
     * @return Venda
     */
    public function setAguardarTefIniciarTransacao($aguardarTefIniciarTransacao)
    {
        $this->aguardarTefIniciarTransacao = $aguardarTefIniciarTransacao;
        return $this;
    }

    /**
     * @return array
     */
    public function getProdutosVendidos()
    {
        return $this->produtosVendidos;
    }

    /**
     * @param array $produtosVendidos
     * @return Venda
     */
    public function setProdutosVendidos($produtosVendidos)
    {
        $this->produtosVendidos = $produtosVendidos;
        return $this;
    }

    function jsonSerialize()
    {
        return [
            "operadorId" => $this->operadorId,
            "pessoaClienteId" => $this->pessoaClienteId,
            "formaPagamentoId" => $this->formaPagamentoId,
            "pedidoId" => $this->pedidoId,
            "terminalId" => $this->terminalId,
            "integracaoId" => $this->integracaoId,
            "valorTotalVendido" => $this->valorTotalVendido,
            "valorAcrescimo" => $this->valorAcrescimo,
            "valorDesconto" => $this->valorDesconto,
            "observacao" => $this->observacao,
            "aguardarTefIniciarTransacao" => $this->aguardarTefIniciarTransacao,
            "parcelamentoAdmin" => $this->parcelamentoAdmin,
            "quantidadeParcelas" => $this->quantidadeParcelas,
            "produtosVendidos" => $this->produtosVendidos
        ];
    }


}