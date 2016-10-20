<?php

namespace Integracao\NTKOnline\Api;

use Integracao\ControlPay\API\IntencaoVendaApi;
use Integracao\ControlPay\API\PagamentoExternoApi;
use Integracao\ControlPay\API\VenderApi;
use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Contracts\PagamentoExterno\GetByFiltrosRequest;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;
use Integracao\ControlPay\Model\FluxoPagamento;
use Integracao\ControlPay\Model\FormaPagamento;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\IntencaoVendaStatus;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\Terminal;

/**
 * Class PagamentoExternoApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class PagamentoExternoApiTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var VenderApi
     */
    private $_intencaoVendaApi;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pwd;

    /**
     * @var integer
     */
    private $id;

    /**
     * UsuarioApi constructor.
     */
    public function __construct()
    {
        $this->host = getenv(ControlPayParameter::CONTROLPAY_HOST);
        $this->user = getenv(ControlPayParameter::CONTROLPAY_USER);
        $this->pwd = getenv(ControlPayParameter::CONTROLPAY_PWD);
        $client = new \Integracao\ControlPay\Client([
            ControlPayParameter::CONTROLPAY_HOST => $this->host,
            ControlPayParameter::CONTROLPAY_TIMEOUT => 10,
            ControlPayParameter::CONTROLPAY_OAUTH_TYPE => KeyQueryStringAuthentication::class,
            ControlPayParameter::CONTROLPAY_USER => $this->user,
            ControlPayParameter::CONTROLPAY_PWD => $this->pwd,
        ]);

        $this->_intencaoVendaApi = new PagamentoExternoApi($client);
    }

    public function test_getByFiltros_status_pendente()
    {
        $response = $this->_intencaoVendaApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setStatus("5,10,15")
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        if(!empty($response->getPagamentosExterno()))
            foreach ($response->getPagamentosExterno() as $pagamentoExterno)
            {
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getId());
                $this->id = $pagamentoExterno->getIntencoesVenda()->getId();
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getToken());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getData());
                $this->assertInstanceOf(IntencaoVenda::class, $pagamentoExterno->getIntencoesVenda());
                $this->assertInstanceOf(\DateTime::class, $pagamentoExterno->getIntencoesVenda()->getData());
                $this->assertGreaterThanOrEqual(1, $pagamentoExterno->getIntencoesVenda()->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorOriginal());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorAcrescimo());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorDesconto());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorFinal());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getFormaPagamento());
                $this->assertInstanceOf(FormaPagamento::class, $pagamentoExterno->getIntencoesVenda()->getFormaPagamento());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getFormaPagamento()->getFluxoPagamento());
                $this->assertInstanceOf(FluxoPagamento::class, $pagamentoExterno->getIntencoesVenda()->getFormaPagamento()->getFluxoPagamento());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $pagamentoExterno->getIntencoesVenda()->getIntencaoVendaStatus());
                $this->assertInstanceOf(Pessoa::class, $pagamentoExterno->getIntencoesVenda()->getVendedor());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getVendedor());
                break;
            }

    }

    public function test_getByFiltros_intencaoVendaId()
    {
        $response = $this->_intencaoVendaApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setIntegracaoId($this->id)
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        if(!empty($response->getPagamentosExterno()))
            foreach ($response->getPagamentosExterno() as $pagamentoExterno)
            {
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getId());
                $this->id = $pagamentoExterno->getIntencoesVenda()->getId();
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getToken());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getData());
                $this->assertInstanceOf(IntencaoVenda::class, $pagamentoExterno->getIntencoesVenda());
                $this->assertInstanceOf(\DateTime::class, $pagamentoExterno->getIntencoesVenda()->getData());
                $this->assertGreaterThanOrEqual(1, $pagamentoExterno->getIntencoesVenda()->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorOriginal());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorAcrescimo());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorDesconto());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorFinal());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getFormaPagamento());
                $this->assertInstanceOf(FormaPagamento::class, $pagamentoExterno->getIntencoesVenda()->getFormaPagamento());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getFormaPagamento()->getFluxoPagamento());
                $this->assertInstanceOf(FluxoPagamento::class, $pagamentoExterno->getIntencoesVenda()->getFormaPagamento()->getFluxoPagamento());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $pagamentoExterno->getIntencoesVenda()->getIntencaoVendaStatus());
                $this->assertInstanceOf(Pessoa::class, $pagamentoExterno->getIntencoesVenda()->getVendedor());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getVendedor());
                break;
            }

    }

    public function test_getByFiltros_formaPagamentoId()
    {
        $response = $this->_intencaoVendaApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setFormaPagamentoId(21)
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());

        if(!empty($response->getPagamentosExterno()))
            foreach ($response->getPagamentosExterno() as $pagamentoExterno)
            {
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getId());
                $this->id = $pagamentoExterno->getIntencoesVenda()->getId();
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getToken());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getData());
                $this->assertInstanceOf(IntencaoVenda::class, $pagamentoExterno->getIntencoesVenda());
                $this->assertInstanceOf(\DateTime::class, $pagamentoExterno->getIntencoesVenda()->getData());
                $this->assertGreaterThanOrEqual(1, $pagamentoExterno->getIntencoesVenda()->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorOriginal());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorAcrescimo());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorDesconto());
                $this->assertGreaterThanOrEqual(0, $pagamentoExterno->getIntencoesVenda()->getValorFinal());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getFormaPagamento());
                $this->assertInstanceOf(FormaPagamento::class, $pagamentoExterno->getIntencoesVenda()->getFormaPagamento());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getFormaPagamento()->getFluxoPagamento());
                $this->assertInstanceOf(FluxoPagamento::class, $pagamentoExterno->getIntencoesVenda()->getFormaPagamento()->getFluxoPagamento());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $pagamentoExterno->getIntencoesVenda()->getIntencaoVendaStatus());
                $this->assertInstanceOf(Pessoa::class, $pagamentoExterno->getIntencoesVenda()->getVendedor());
                $this->assertNotEmpty($pagamentoExterno->getIntencoesVenda()->getVendedor());
                break;
            }

    }

}