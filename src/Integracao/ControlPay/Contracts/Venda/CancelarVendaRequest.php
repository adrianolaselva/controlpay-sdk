<?php

namespace Integracao\ControlPay\Contracts\Venda;

/**
 * Class CancelarVendaRequest
 * @package Integracao\ControlPay\Contracts\Venda
 */
class CancelarVendaRequest implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $intencaoVendaId;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @var integer
     */
    private $terminalId;

    /**
     * @var boolean
     */
    private $aguardarTefIniciarTransacao;

    /**
     * @var string
     */
    private $senhaTecnica;

    /**
     * @return int
     */
    public function getIntencaoVendaId()
    {
        return $this->intencaoVendaId;
    }

    /**
     * @param int $intencaoVendaId
     * @return CancelarVendaRequest
     */
    public function setIntencaoVendaId($intencaoVendaId)
    {
        $this->intencaoVendaId = $intencaoVendaId;
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
     * @return CancelarVendaRequest
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;
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
     * @return CancelarVendaRequest
     */
    public function setAguardarTefIniciarTransacao($aguardarTefIniciarTransacao)
    {
        $this->aguardarTefIniciarTransacao = $aguardarTefIniciarTransacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenhaTecnica()
    {
        return $this->senhaTecnica;
    }

    /**
     * @param string $senhaTecnica
     * @return CancelarVendaRequest
     */
    public function setSenhaTecnica($senhaTecnica)
    {
        $this->senhaTecnica = $senhaTecnica;
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
     * @return CancelarVendaRequest
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
            'intencaoVendaId' => $this->intencaoVendaId,
            'terminalId' => $this->terminalId,
            'aguardarTefIniciarTransacao' => $this->aguardarTefIniciarTransacao,
            'senhaTecnica' => $this->senhaTecnica,
            'referencia' => $this->referencia
        ];
    }


}