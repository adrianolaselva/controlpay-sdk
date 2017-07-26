<?php

namespace Integracao\ControlPay\Contracts\IntencaoVenda;

/**
 * Class GetByFiltrosRequest
 * @package Integracao\ControlPay\Contracts\Venda
 */
class GetByFiltrosRequest implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $intencaoVendaId;

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
    private $status;

    /**
     * @var integer
     */
    private $vendasDia;

    /**
     * @var string
     */
    private $referencia;

    /**
     * GetByFiltrosRequest constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getIntencaoVendaId()
    {
        return $this->intencaoVendaId;
    }

    /**
     * @param int $intencaoVendaId
     * @return GetByFiltrosRequest
     */
    public function setIntencaoVendaId($intencaoVendaId)
    {
        $this->intencaoVendaId = $intencaoVendaId;
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
     * @return GetByFiltrosRequest
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
     * @return GetByFiltrosRequest
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return GetByFiltrosRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getVendasDia()
    {
        return $this->vendasDia;
    }

    /**
     * @param int $vendasDia
     * @return GetByFiltrosRequest
     */
    public function setVendasDia($vendasDia)
    {
        $this->vendasDia = $vendasDia;
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
     * @return GetByFiltrosRequest
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            "intencaoVendaId" => $this->intencaoVendaId,
            "formaPagamentoId" => $this->formaPagamentoId,
            "terminalId" => $this->terminalId,
            "status" => $this->status,
            "vendasDia" => $this->vendasDia,
            "referencia" => $this->referencia,
        ];
    }


}