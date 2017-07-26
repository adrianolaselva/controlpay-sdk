<?php

namespace Integracao\ControlPay\Contracts\Pedido;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\Pedido;

/**
 * Class GetByIdResponse
 * @package Integracao\ControlPay\Contracts\Venda
 */
class GetByIdResponse
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
     * GetByIdResponse constructor.
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
     * @return GetByIdResponse
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