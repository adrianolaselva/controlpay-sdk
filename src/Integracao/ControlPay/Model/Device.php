<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 19/10/2016
 * Time: 17:18
 */

namespace Integracao\ControlPay\Model;

/**
 * Class Device
 * @package Integracao\ControlPay\Model
 */
class Device
{
    /**
     * @var string
     */
    private $versaoApp;

    /**
     * Device constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return string
     */
    public function getVersaoApp()
    {
        return $this->versaoApp;
    }

    /**
     * @param string $versaoApp
     * @return Device
     */
    public function setVersaoApp($versaoApp)
    {
        $this->versaoApp = $versaoApp;
        return $this;
    }


}