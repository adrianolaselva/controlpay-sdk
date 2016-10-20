<?php

namespace Integracao\ControlPay\Contracts\PagamentoExterno;

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
     * @var integer
     */
    private $integracaoId;

    /**
     * GetByFiltrosRequest constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getGetByFiltrosId()
    {
        return $this->intencaoVendaId;
    }

    /**
     * @param int $intencaoVendaId
     * @return GetByFiltrosRequest
     */
    public function setGetByFiltrosId($intencaoVendaId)
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
     * @return int
     */
    public function getIntegracaoId()
    {
        return $this->integracaoId;
    }

    /**
     * @param int $integracaoId
     * @return GetByFiltrosRequest
     */
    public function setIntegracaoId($integracaoId)
    {
        $this->integracaoId = $integracaoId;
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
            "integracaoId" => $this->integracaoId,
        ];
    }


}