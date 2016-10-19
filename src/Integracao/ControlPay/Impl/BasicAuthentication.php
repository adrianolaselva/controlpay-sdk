<?php

namespace Integracao\ControlPay\Impl;

use Integracao\ControlPay\Interfaces\IAuthentication;

/**
 * Class BasicAuthentication
 * @package Integracao\ControlPay\Impl
 */
class BasicAuthentication implements IAuthentication
{

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * BasicAuthentication constructor.
     *
     * @param string $user
     * @param string $password
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAuthorization()
    {
        return sprintf("Basic %s", base64_encode(sprintf("%s:%s", $this->user, $this->password)));
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return BasicAuthentication
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return BasicAuthentication
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

}