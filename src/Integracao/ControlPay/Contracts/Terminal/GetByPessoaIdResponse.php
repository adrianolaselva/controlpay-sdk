<?php

namespace Integracao\ControlPay\Contracts\Terminal;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Produto;
use Integracao\ControlPay\Model\Terminal;

/**
 * Class GetByPessoaIdResponse
 * @package Integracao\ControlPay\Contracts\Produto
 */
class GetByPessoaIdResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var array
     */
    private $terminais;

    /**
     * GetByPessoaIdResponse constructor.
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
     * @return GetByPessoaIdResponse
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
    public function getTerminais()
    {
        return $this->terminais;
    }

    /**
     * @param array $terminais
     * @return GetByPessoaIdResponse
     */
    public function setTerminais($terminais)
    {
        foreach ($terminais as $item)
            $this->terminais[] = SerializerHelper::denormalize($item, Terminal::class);

        return $this;
    }

}