<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/10/2016
 * Time: 10:51
 */

namespace Integracao\ControlPay\Model;

/**
 * Class ContaBancaria
 * @package Integracao\ControlPay\Model
 */
class ContaBancaria implements \JsonSerializable
{
    private $id;

    /**
     * ContaBancaria constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ContaBancaria
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id
        ];
    }


}