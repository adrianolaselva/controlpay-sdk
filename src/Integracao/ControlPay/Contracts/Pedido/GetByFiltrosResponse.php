<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 28/10/2016
 * Time: 09:09
 */

namespace Integracao\ControlPay\Contracts\Pedido;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Pedido;

/**
 * Class GetByFiltrosResponse
 * @package Integracao\ControlPay\Contracts\Pedido
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
    private $pedidos;

    /**
     * InserirResponse constructor.
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
     * @return InserirResponse
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);
        return $this;
    }

    /**
     * @return array
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * @param $pedidos
     * @return $this
     */
    public function setPedidos($pedidos)
    {
        foreach ($pedidos as $pedido)
            $this->pedidos[] = SerializerHelper::denormalize($pedido, Pedido::class);

        return $this;
    }
}