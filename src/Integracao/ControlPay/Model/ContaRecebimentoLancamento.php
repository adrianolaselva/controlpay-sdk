<?php

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class ContaRecebimentoLancamento
 * @package Integracao\ControlPay\Model
 */
class ContaRecebimentoLancamento implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var ContaRecebimento
     */
    private $contaRecebimento;

    /**
     * @var ContaPayLancamento
     */
    private $contaPayLancamento;

    /**
     * @var Pagamento
     */
    private $pagamento;

    /**
     * @var LancamentoTipo
     */
    private $lancamentoTipo;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var double
     */
    private $valorBruto;

    /**
     * @var double
     */
    private $valorLiquido;

    /**
     * @var double
     */
    private $tarifaValor;

    /**
     * @var double
     */
    private $tarifaPercentual;

    /**
     * @var IntencaoVenda
     */
    private $intencaoVenda;

    /**
     * ContaRecebimentoLancamento constructor.
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
     * @return ContaRecebimentoLancamento
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ContaRecebimento
     */
    public function getContaRecebimento()
    {
        return $this->contaRecebimento;
    }

    /**
     * @param ContaRecebimento $contaRecebimento
     * @return ContaRecebimentoLancamento
     */
    public function setContaRecebimento($contaRecebimento)
    {
        $this->contaRecebimento = $contaRecebimento;

        if(is_array($this->contaRecebimento))
            $this->contaRecebimento = SerializerHelper::denormalize($this->contaRecebimento, ContaRecebimento::class);

        return $this;
    }

    /**
     * @return ContaPayLancamento
     */
    public function getContaPayLancamento()
    {
        return $this->contaPayLancamento;
    }

    /**
     * @param ContaPayLancamento $contaPayLancamento
     * @return ContaRecebimentoLancamento
     */
    public function setContaPayLancamento($contaPayLancamento)
    {
        $this->contaPayLancamento = $contaPayLancamento;

        if(is_array($this->contaPayLancamento))
            $this->contaPayLancamento = SerializerHelper::denormalize($this->contaPayLancamento, ContaPayLancamento::class);

        return $this;
    }

    /**
     * @return Pagamento
     */
    public function getPagamento()
    {
        return $this->pagamento;
    }

    /**
     * @param Pagamento $pagamento
     * @return ContaRecebimentoLancamento
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;

        if(is_array($this->pagamento))
            $this->pagamento = SerializerHelper::denormalize($this->pagamento, Pagamento::class);

        return $this;
    }

    /**
     * @return LancamentoTipo
     */
    public function getLancamentoTipo()
    {
        return $this->lancamentoTipo;
    }

    /**
     * @param LancamentoTipo $lancamentoTipo
     * @return ContaRecebimentoLancamento
     */
    public function setLancamentoTipo($lancamentoTipo)
    {
        $this->lancamentoTipo = $lancamentoTipo;

        if(is_array($this->lancamentoTipo))
            $this->lancamentoTipo = SerializerHelper::denormalize($this->lancamentoTipo, LancamentoTipo::class);

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
     * @return ContaRecebimentoLancamento
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);
        return $this;
    }

    /**
     * @return float
     */
    public function getValorBruto()
    {
        return $this->valorBruto;
    }

    /**
     * @param float $valorBruto
     * @return ContaRecebimentoLancamento
     */
    public function setValorBruto($valorBruto)
    {
        $this->valorBruto = $valorBruto;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorLiquido()
    {
        return $this->valorLiquido;
    }

    /**
     * @param float $valorLiquido
     * @return ContaRecebimentoLancamento
     */
    public function setValorLiquido($valorLiquido)
    {
        $this->valorLiquido = $valorLiquido;
        return $this;
    }

    /**
     * @return float
     */
    public function getTarifaValor()
    {
        return $this->tarifaValor;
    }

    /**
     * @param float $tarifaValor
     * @return ContaRecebimentoLancamento
     */
    public function setTarifaValor($tarifaValor)
    {
        $this->tarifaValor = $tarifaValor;
        return $this;
    }

    /**
     * @return float
     */
    public function getTarifaPercentual()
    {
        return $this->tarifaPercentual;
    }

    /**
     * @param float $tarifaPercentual
     * @return ContaRecebimentoLancamento
     */
    public function setTarifaPercentual($tarifaPercentual)
    {
        $this->tarifaPercentual = $tarifaPercentual;
        return $this;
    }

    /**
     * @return IntencaoVenda
     */
    public function getIntencaoVenda()
    {
        return $this->intencaoVenda;
    }

    /**
     * @param IntencaoVenda $intencaoVenda
     * @return ContaRecebimentoLancamento
     */
    public function setIntencaoVenda($intencaoVenda)
    {
        $this->intencaoVenda = $intencaoVenda;

        if(is_array($this->intencaoVenda))
            $this->intencaoVenda = SerializerHelper::denormalize($this->intencaoVenda, IntencaoVenda::class);

        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'contaPayLancamento' => $this->contaPayLancamento,
            'contaRecebimento' => $this->contaRecebimento,
            'data' => $this->data,
            'intencaoVenda' => $this->intencaoVenda,
            'lancamentoTipo' => $this->lancamentoTipo,
            'pagamento' => $this->pagamento,
            'tarifaPercentual' => $this->tarifaPercentual,
            'tarifaValor' => $this->tarifaValor,
            'valorBruto' => $this->valorBruto,
            'valorLiquido' => $this->valorLiquido,
        ];
    }


}