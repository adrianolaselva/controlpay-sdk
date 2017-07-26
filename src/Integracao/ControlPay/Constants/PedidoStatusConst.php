<?php

namespace Integracao\ControlPay\Constants;

/**
 * Class PedidoStatusConst
 * @package Integracao\ControlPay\Constants
 */
class PedidoStatusConst
{
    const ABERTO = 5;
    const AGUARDANDO_PAGAMENTO = 6;
    const PAGO = 10;
    const CANCELADO = 15;
}