<?php

namespace Integracao\ControlPay\Contracts\Pedido;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\Pedido;

/**
 * Class CancelarResponse
 * @package Integracao\ControlPay\Contracts\Venda
 */
class CancelarResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var Pedido
     */
    private $pedido;

    /**
     * CancelarResponse constructor.
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
     * @return CancelarResponse
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);
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
     * @param $pedido
     * @return $this
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        if(is_array($this->pedido))
            $this->pedido = SerializerHelper::denormalize($this->pedido, Pedido::class);

        return $this;
    }

}