<?php

namespace Integracao\ControlPay\Contracts\IntencaoVenda;

/**
 * Class GetByIntegracaoIdRequest
 * @package Integracao\ControlPay\Contracts\Venda
 */
class GetByIntegracaoIdRequest implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $integracaoId;

    /**
     * GetByIntegracaoIdRequest constructor.
     */
    public function __construct()
    {
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
     * @return GetByIntegracaoIdRequest
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
            "integracaoId" => $this->integracaoId,
        ];
    }


}