<?php

namespace Integracao\ControlPay\Contracts\Venda;
use Integracao\ControlPay\Contracts\Pedido\InserirRequest;

/**
 * Class VenderComPedidoRequest
 * @package Integracao\ControlPay\Contracts\Venda
 */
class VenderComPedidoRequest
{
    /**
     * @var VenderRequest
     */
    private $inventarioVenderRequest;

    /**
     * @var InserirRequest
     */
    private $pedidoInserirRequest;

    /**
     * @return VenderRequest
     */
    public function getInventarioVenderRequest()
    {
        return $this->inventarioVenderRequest;
    }

    /**
     * @param VenderRequest $inventarioVenderRequest
     * @return VenderComPedidoRequest
     */
    public function setInventarioVenderRequest($inventarioVenderRequest)
    {
        $this->inventarioVenderRequest = $inventarioVenderRequest;
        return $this;
    }

    /**
     * @return InserirRequest
     */
    public function getPedidoInserirRequest()
    {
        return $this->pedidoInserirRequest;
    }

    /**
     * @param InserirRequest $pedidoInserirRequest
     * @return VenderComPedidoRequest
     */
    public function setPedidoInserirRequest($pedidoInserirRequest)
    {
        $this->pedidoInserirRequest = $pedidoInserirRequest;
        return $this;
    }

}