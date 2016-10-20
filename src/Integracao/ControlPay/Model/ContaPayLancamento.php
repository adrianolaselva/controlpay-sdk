<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/10/2016
 * Time: 10:48
 */

namespace Integracao\ControlPay\Model;

/**
 * Class ContaPayLancamento
 * @package Integracao\ControlPay\Model
 */
class ContaPayLancamento implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * ContaPayLancamento constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ContaPayLancamento
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