<?php

namespace Integracao\ControlPay\Contracts\PagamentoExterno;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\PagamentoExterno;

/**
 * Class GetByFiltrosResponse
 * @package Integracao\ControlPay\Contracts\PagamentoExterno
 */
class GetByFiltrosResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var array
     */
    private $pagamentosExterno;

    /**
     * GetByFiltrosResponse constructor.
     */
    public function __construct()
    {
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
     * @return GetByFiltrosResponse
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);

        if(!$this->data)
            $this->data = \DateTime::createFromFormat('d/m/Y H:i:s', $data);

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
     * @return GetByFiltrosResponse
     */
    public function setPagamentosExterno($pagamentosExterno)
    {

        foreach ($pagamentosExterno as $item)
            $this->pagamentosExterno[] = SerializerHelper::denormalize($item, PagamentoExterno::class);

        return $this;
    }



}