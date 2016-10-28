<?php

namespace Integracao\ControlPay\Contracts\Pedido;

/**
 * Class GetByFiltrosRequest
 * @package Integracao\ControlPay\Contracts\Pedido
 */
class GetByFiltrosRequest implements \JsonSerializable
{

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var boolean
     */
    private $valorComDivergencia;

    /**
     * @var string
     */
    private $referencia;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return GetByFiltrosRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return GetByFiltrosRequest
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * @param \DateTime $dataInicio
     * @return GetByFiltrosRequest
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * @param \DateTime $dataFim
     * @return GetByFiltrosRequest
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isValorComDivergencia()
    {
        return $this->valorComDivergencia;
    }

    /**
     * @param boolean $valorComDivergencia
     * @return GetByFiltrosRequest
     */
    public function setValorComDivergencia($valorComDivergencia)
    {
        $this->valorComDivergencia = $valorComDivergencia;
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
            'status' => $this->status,
            'dataInicio' => empty($this->dataInicio) ? null : $this->dataInicio->format('d/m/Y H:i:s'),
            'dataFim' => empty($this->dataFim) ? null :$this->dataFim->format('d/m/Y H:i:s'),
            'tipo' => $this->tipo,
            'valorComDivergencia' => $this->valorComDivergencia,
            'referencia' => $this->referencia
        ];
    }

}