<?php

namespace Integracao\ControlPay\Contracts\Produto;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Produto;

/**
 * Class GetByAtivosByPessoaIdResponse
 * @package Integracao\ControlPay\Contracts\Produto
 */
class GetByAtivosByPessoaIdResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var array
     */
    private $produtos;

    /**
     * GetByAtivosByPessoaIdResponse constructor.
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
     * @return GetByAtivosByPessoaIdResponse
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
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * @param array $produtos
     * @return GetByAtivosByPessoaIdResponse
     */
    public function setProdutos($produtos)
    {

        foreach ($produtos as $item)
            $this->produtos[] = SerializerHelper::denormalize($item, Produto::class);

        return $this;
    }

}