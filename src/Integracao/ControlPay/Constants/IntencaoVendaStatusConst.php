<?php

namespace Integracao\ControlPay\Constants;

/**
 * Class IntencaoVendaStatusConst
 * @package Integracao\ControlPay\Constants
 */
class IntencaoVendaStatusConst
{
    const PENDENTE = 5;
    const EM_PAGAMENTO = 6;
    const CREDITADO = 10;
    const EXPIRADO = 15;
    const CANCELAMENTO_INICIADO = 18;
    const EM_CANCELAMENTO = 19;
    const CANCELADO = 20;
    const PAGAMENTO_RECUSADO = 25;
}