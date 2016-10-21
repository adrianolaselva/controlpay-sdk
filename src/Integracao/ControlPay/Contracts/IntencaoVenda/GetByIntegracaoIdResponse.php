<?php

namespace Integracao\ControlPay\Contracts\IntencaoVenda;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\IntencaoVenda;

/**
 * Class GetByIntegracaoIdResponse
 * @package Integracao\ControlPay\Contracts\Venda
 */
class GetByIntegracaoIdResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var array
     */
    private $intencoesVendas;

    /**
     * GetByIntegracaoIdResponse constructor.
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
     * @return GetByIntegracaoIdResponse
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);
        return $this;
    }

    /**
     * @return array
     */
    public function getIntencoesVendas()
    {
        return $this->intencoesVendas;
    }

    /**
     * @param array $intencoesVendas
     * @return GetByIntegracaoIdResponse
     */
    public function setIntencoesVendas($intencoesVendas)
    {

        foreach ($intencoesVendas as $intencaoVenda)
            $this->intencoesVendas[] = SerializerHelper::denormalize($intencaoVenda, IntencaoVenda::class);

        return $this;
    }

}