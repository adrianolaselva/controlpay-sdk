<?php

namespace Integracao\ControlPay\Constants;

/**
 * Class BoletoStatusConst
 * @package Integracao\ControlPay\Constants
 */
class BoletoStatusConst
{
    const DESCONHECIDO = 0;
    const BOLETO_EMITIDO = 1;
    const PAGO = 2;
    const ERRO_NUMERO_DOCUMENTO_DIFERENTE_CARGA = 2;
    const ERRO_VALOR_TRANSACAO_DIFERENTE_CARGA = 2;
    const ERRO_VALOR_PAGAMENTO_DIFERENTE_CARGA = 2;
}