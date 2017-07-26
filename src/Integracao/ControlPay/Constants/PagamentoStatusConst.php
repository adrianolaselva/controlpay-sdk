<?php

namespace Integracao\ControlPay\Constants;

/**
 * Class PagamentoStatusConst
 * @package Integracao\ControlPay\Constants
 */
class PagamentoStatusConst
{
    const AGENDADO = 5;
    const LIQUIDACAO = 10;
    const INSUFICIENCIA_DE_FUNDOS = 10;
    const CANCELADO = 16;
    const ARQUIVO_CRIADO = 20;
}