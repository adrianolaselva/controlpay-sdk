<?php

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class IntencaoVenda
 * @package Integracao\ControlPay\Model
 */
class IntencaoVenda implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Pessoa
     */
    private $pessoaVendedor;

    /**
     * @var Pessoa
     */
    private $pessoaCliente;

    /**
     * @var Pessoa
     */
    private $cliente;

    /**
     * @var FormaPagamento
     */
    private $formaPagamento;

    /**
     * @var Terminal
     */
    private $terminal;

    /**
     * @var Pedido
     */
    private $pedido;

    /**
     * @var Operador
     */
    private $operador;

    /**
     * @var ContaRecebimentoLancamento
     */
    private $contaRecebimentoLancamento;

    /**
     * @var PagamentoRecorrenteLancamento
     */
    private $pagamentoRecorrenteLancamento;

    /**
     * @var IntencaoVendaStatus
     */
    private $intencaoVendaStatus;

    /**
     * @var string
     */
    private $integracaoId;

    /**
     * @var string
     */
    private $token;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var string
     */
    private $hora;

    /**
     * @var double
     */
    private $valorOriginal;

    /**
     * @var double
     */
    private $valorAcrescimo;

    /**
     * @var double
     */
    private $valorDesconto;

    /**
     * @var double
     */
    private $valorFinal;

    /**
     * @var string
     */
    private $valorOriginalFormat;

    /**
     * @var string
     */
    private $valorDescontoFormat;

    /**
     * @var string
     */
    private $valorAcrescimoFormat;

    /**
     * @var string
     */
    private $valorFinalFormat;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var string
     */
    private $gate2allToken;

    /**
     * @var string
     */
    private $cpfCnpj;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var integer
     */
    private $quantidade;

    /**
     * @var array
     */
    private $itemProdutos;

    /**
     * @var array
     */
    private $produtos;

    /**
     * @var array
     */
    private $pagamentosExterno;

    /**
     * @var Pessoa
     */
    private $vendedor;

    /**
     * IntencaoVenda constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return IntencaoVenda
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getPessoaVendedor()
    {
        return $this->pessoaVendedor;
    }

    /**
     * @param Pessoa $pessoaVendedor
     * @return IntencaoVenda
     */
    public function setPessoaVendedor($pessoaVendedor)
    {
        $this->pessoaVendedor = $pessoaVendedor;

        if(is_array($this->pessoaVendedor))
            $this->pessoaVendedor = SerializerHelper::denormalize($this->pessoaVendedor, Pessoa::class);

        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getPessoaCliente()
    {
        return $this->pessoaCliente;
    }

    /**
     * @param Pessoa $pessoaCliente
     * @return IntencaoVenda
     */
    public function setPessoaCliente($pessoaCliente)
    {
        $this->pessoaCliente = $pessoaCliente;

        if(is_array($this->pessoaCliente))
            $this->pessoaCliente = SerializerHelper::denormalize($this->pessoaCliente, Pessoa::class);

        return $this;
    }

    /**
     * @return FormaPagamento
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    /**
     * @param FormaPagamento $formaPagamento
     * @return IntencaoVenda
     */
    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;

        if(is_array($this->formaPagamento))
            $this->formaPagamento = SerializerHelper::denormalize($this->formaPagamento, FormaPagamento::class);

        return $this;
    }

    /**
     * @return Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @param Terminal $terminal
     * @return IntencaoVenda
     */
    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;

        if(is_array($this->terminal))
            $this->terminal = SerializerHelper::denormalize($this->terminal, Terminal::class);

        return $this;
    }

    /**
     * @return Pedido
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * @param Pedido $pedido
     * @return IntencaoVenda
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        if(is_array($this->pedido))
            $this->pedido = SerializerHelper::denormalize($this->pedido, Pedido::class);

        return $this;
    }

    /**
     * @return Operador
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param Operador $operador
     * @return IntencaoVenda
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;

        if(is_array($this->operador))
            $this->operador = SerializerHelper::denormalize($this->operador, Operador::class);

        return $this;
    }

    /**
     * @return ContaRecebimentoLancamento
     */
    public function getContaRecebimentoLancamento()
    {
        return $this->contaRecebimentoLancamento;
    }

    /**
     * @param ContaRecebimentoLancamento $contaRecebimentoLancamento
     * @return IntencaoVenda
     */
    public function setContaRecebimentoLancamento($contaRecebimentoLancamento)
    {
        $this->contaRecebimentoLancamento = $contaRecebimentoLancamento;

        if(is_array($this->contaRecebimentoLancamento))
            $this->contaRecebimentoLancamento = SerializerHelper::denormalize($this->contaRecebimentoLancamento, ContaRecebimentoLancamento::class);

        return $this;
    }

    /**
     * @return PagamentoRecorrenteLancamento
     */
    public function getPagamentoRecorrenteLancamento()
    {
        return $this->pagamentoRecorrenteLancamento;
    }

    /**
     * @param PagamentoRecorrenteLancamento $pagamentoRecorrenteLancamento
     * @return IntencaoVenda
     */
    public function setPagamentoRecorrenteLancamento($pagamentoRecorrenteLancamento)
    {
        $this->pagamentoRecorrenteLancamento = $pagamentoRecorrenteLancamento;

        if(is_array($this->pagamentoRecorrenteLancamento))
            $this->pagamentoRecorrenteLancamento = SerializerHelper::denormalize($this->pagamentoRecorrenteLancamento, PagamentoRecorrenteLancamento::class);

        return $this;
    }

    /**
     * @return IntencaoVendaStatus
     */
    public function getIntencaoVendaStatus()
    {
        return $this->intencaoVendaStatus;
    }

    /**
     * @param IntencaoVendaStatus $intencaoVendaStatus
     * @return IntencaoVenda
     */
    public function setIntencaoVendaStatus($intencaoVendaStatus)
    {
        $this->intencaoVendaStatus = $intencaoVendaStatus;

        if(is_array($this->intencaoVendaStatus))
            $this->intencaoVendaStatus = SerializerHelper::denormalize($this->intencaoVendaStatus, IntencaoVendaStatus::class);

        return $this;
    }

    /**
     * @return string
     */
    public function getIntegracaoId()
    {
        return $this->integracaoId;
    }

    /**
     * @param string $integracaoId
     * @return IntencaoVenda
     */
    public function setIntegracaoId($integracaoId)
    {
        $this->integracaoId = $integracaoId;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return IntencaoVenda
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     * @return IntencaoVenda
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);

        if(!$this->data)
            $this->data = \DateTime::createFromFormat('d/m/Y H:i:s', $data);

        return $this;
    }

    /**
     * @return float
     */
    public function getValorOriginal()
    {
        return $this->valorOriginal;
    }

    /**
     * @param float $valorOriginal
     * @return IntencaoVenda
     */
    public function setValorOriginal($valorOriginal)
    {
        $this->valorOriginal = $valorOriginal;
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
     * @return IntencaoVenda
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
     * @return IntencaoVenda
     */
    public function setValorDesconto($valorDesconto)
    {
        $this->valorDesconto = $valorDesconto;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorFinal()
    {
        return $this->valorFinal;
    }

    /**
     * @param float $valorFinal
     * @return IntencaoVenda
     */
    public function setValorFinal($valorFinal)
    {
        $this->valorFinal = $valorFinal;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return IntencaoVenda
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return IntencaoVenda
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getGate2allToken()
    {
        return $this->gate2allToken;
    }

    /**
     * @param string $gate2allToken
     * @return IntencaoVenda
     */
    public function setGate2allToken($gate2allToken)
    {
        $this->gate2allToken = $gate2allToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     * @return IntencaoVenda
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param string $obs
     * @return IntencaoVenda
     */
    public function setObs($obs)
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return array
     */
    public function getItemProdutos()
    {
        return $this->itemProdutos;
    }

    /**
     * @param array $itemProdutos
     * @return IntencaoVenda
     */
    public function setItemProdutos($itemProdutos)
    {
        //$this->itemProdutos = $itemProdutos;

        if(is_array($itemProdutos))
            foreach ($itemProdutos as $itemProduto) {
                $this->itemProdutos[] = SerializerHelper::denormalize(
                    $itemProduto, ItemProduto::class);
            }

        return $this;
    }

    /**
     * @return array
     */
    public function getPagamentosExterno()
    {
        return $this->pagamentosExterno;
    }

    /**
     * @param array $pagamentosExterno
     * @return IntencaoVenda
     */
    public function setPagamentosExterno($pagamentosExterno)
    {
        if(is_array($pagamentosExterno))
            foreach ($pagamentosExterno as $pagamentoExterno) {
                $this->pagamentosExterno[] = SerializerHelper::denormalize(
                    $pagamentoExterno, PagamentoExterno::class);
            }

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
     * @param array $produtos
     * @return IntencaoVenda
     */
    public function setProdutos($produtos)
    {

        if(is_array($produtos))
            foreach ($produtos as $produto) {
                $this->produtos[] = SerializerHelper::denormalize(
                    $produto, ItemProduto::class);
            }

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
     * @return IntencaoVenda
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
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
     * @return IntencaoVenda
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorOriginalFormat()
    {
        return $this->valorOriginalFormat;
    }

    /**
     * @param string $valorOriginalFormat
     * @return IntencaoVenda
     */
    public function setValorOriginalFormat($valorOriginalFormat)
    {
        $this->valorOriginalFormat = $valorOriginalFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorDescontoFormat()
    {
        return $this->valorDescontoFormat;
    }

    /**
     * @param string $valorDescontoFormat
     * @return IntencaoVenda
     */
    public function setValorDescontoFormat($valorDescontoFormat)
    {
        $this->valorDescontoFormat = $valorDescontoFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorAcrescimoFormat()
    {
        return $this->valorAcrescimoFormat;
    }

    /**
     * @param string $valorAcrescimoFormat
     * @return IntencaoVenda
     */
    public function setValorAcrescimoFormat($valorAcrescimoFormat)
    {
        $this->valorAcrescimoFormat = $valorAcrescimoFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getValorFinalFormat()
    {
        return $this->valorFinalFormat;
    }

    /**
     * @param string $valorFinalFormat
     * @return IntencaoVenda
     */
    public function setValorFinalFormat($valorFinalFormat)
    {
        $this->valorFinalFormat = $valorFinalFormat;
        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param Pessoa $vendedor
     * @return IntencaoVenda
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;

        if(is_array($this->vendedor))
            $this->vendedor = SerializerHelper::denormalize($this->pessoaVendedor, Pessoa::class);

        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param Pessoa $cliente
     * @return IntencaoVenda
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'pessoaVendedor' => $this->pessoaVendedor,
            'pessoaCliente' => $this->pessoaCliente,
            'itemProdutos' => $this->itemProdutos,
            'pagamentosExterno' => $this->pagamentosExterno,
            'produtos' => $this->produtos,
            'contaRecebimentoLancamento' => $this->contaRecebimentoLancamento,
            'cpfCnpj' => $this->cpfCnpj,
            'data' => $this->data,
            'formaPagamento' => $this->formaPagamento,
            'gate2allToken' => $this->gate2allToken,
            'integracaoId' => $this->integracaoId,
            'intencaoVendaStatus' => $this->intencaoVendaStatus,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'obs' => $this->obs,
            'pedido' => $this->pedido,
            'quantidade' => $this->quantidade,
            'vendedor' => $this->vendedor,
            'terminal' => $this->terminal,
            'hora' => $this->hora,
            'cliente' => $this->cliente,
            'valorOriginal' => $this->valorOriginal,
            'valorOriginalFormat' => $this->valorOriginalFormat,
            'valorAcrescimo' => $this->valorAcrescimo,
            'valorAcrescimoFormat' => $this->valorAcrescimoFormat,
            'valorDesconto' => $this->valorDesconto,
            'valorDescontoFormat' => $this->valorDescontoFormat,
            'valorFinal' => $this->valorFinal,
            'valorFinalFormat' => $this->valorFinalFormat,
        ];
    }


}