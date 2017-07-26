<?php

namespace Integracao\ControlPay\Contracts\IntencaoVenda;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\IntencaoVenda;

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
     * @var IntencaoVenda
     */
    private $intencaoVenda;

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
     * @return IntencaoVenda
     */
    public function getIntencaoVenda()
    {
        return $this->intencaoVenda;
    }

    /**
     * @param IntencaoVenda $intencaoVenda
     * @return GetByIdResponse
     */
    public function setIntencaoVenda($intencaoVenda)
    {
        $this->intencaoVenda = $intencaoVenda;

        if(is_array($this->intencaoVenda))
            $this->intencaoVenda = SerializerHelper::denormalize($this->intencaoVenda, IntencaoVenda::class);

        return $this;
    }

}