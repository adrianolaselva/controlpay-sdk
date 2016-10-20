<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/10/2016
 * Time: 10:49
 */

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class Pagamento
 * @package Integracao\ControlPay\Model
 */
class Pagamento implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var ContaBancaria
     */
    private $contaBancaria;

    /**
     * @var PagamentoStatus
     */
    private $pagamentoStatus;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var double
     */
    private $valor;

    /**
     * @var array
     */
    private $contaRecebimentoLancamentos;

    /**
     * Pagamento constructor.
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
     * @return Pagamento
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Conta
     */
    public function getContaBancaria()
    {
        return $this->contaBancaria;
    }

    /**
     * @param Conta $contaBancaria
     * @return Pagamento
     */
    public function setContaBancaria($contaBancaria)
    {
        $this->contaBancaria = $contaBancaria;

        if(is_array($this->contaBancaria))
            $this->contaBancaria = SerializerHelper::denormalize($this->contaBancaria, ContaBancaria::class);

        return $this;
    }

    /**
     * @return PagamentoStatus
     */
    public function getPagamentoStatus()
    {
        return $this->pagamentoStatus;
    }

    /**
     * @param PagamentoStatus $pagamentoStatus
     * @return Pagamento
     */
    public function setPagamentoStatus($pagamentoStatus)
    {
        $this->pagamentoStatus = $pagamentoStatus;

        if(is_array($this->pagamentoStatus))
            $this->pagamentoStatus = SerializerHelper::denormalize($this->pagamentoStatus, PagamentoStatus::class);

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
     * @return Pagamento
     */
    public function setData($data)
    {
        $this->data = $data;
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
     * @return Pagamento
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return array
     */
    public function getContaRecebimentoLancamentos()
    {
        return $this->contaRecebimentoLancamentos;
    }

    /**
     * @param array $contaRecebimentoLancamentos
     * @return Pagamento
     */
    public function setContaRecebimentoLancamentos($contaRecebimentoLancamentos)
    {
        if(is_array($contaRecebimentoLancamentos))
            foreach ($contaRecebimentoLancamentos as $contaRecebimentoLancamento) {
                $this->contaRecebimentoLancamentos[] = SerializerHelper::denormalize(
                    $contaRecebimentoLancamento, ContaRecebimentoLancamento::class);
            }

        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'contaBancaria' => $this->contaBancaria,
            'pagamentoStatus' => $this->pagamentoStatus,
            'data' => $this->data,
            'valor' => $this->valor,
            'contaRecebimentoLancamentos' => $this->contaRecebimentoLancamentos,
        ];
    }


}