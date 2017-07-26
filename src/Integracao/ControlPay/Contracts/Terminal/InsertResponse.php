<?php

namespace Integracao\ControlPay\Contracts\Terminal;

use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Model\Terminal;

/**
 * Class InsertResponse
 * @package Integracao\ControlPay\Contracts\Produto
 */
class InsertResponse
{
    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var Terminal
     */
    private $terminal;

    /**
     * InsertResponse constructor.
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
     * @return InsertResponse
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);

        if(!$this->data)
            $this->data = \DateTime::createFromFormat('d/m/Y H:i:s', $data);

        return $this;
    }

    /**
     * @return Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @param Terminal $terminal
     * @return InsertResponse
     */
    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;

        if(is_array($this->terminal))
            $this->terminal = SerializerHelper::denormalize($this->terminal, Terminal::class);

        return $this;
    }

}