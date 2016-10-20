<?php

namespace Integracao\NTKOnline\Api;

use Integracao\ControlPay\API\IntencaoVendaApi;
use Integracao\ControlPay\API\VenderApi;
use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Contracts\IntencaoVenda\GetByFiltrosRequest;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;
use Integracao\ControlPay\Model\FluxoPagamento;
use Integracao\ControlPay\Model\FormaPagamento;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\IntencaoVendaStatus;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\Terminal;

/**
 * Class IntencaoVendaApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class IntencaoVendaApiTest extends \PHPUnit_Framework_TestCase
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

        $this->_intencaoVendaApi = new IntencaoVendaApi($client);
    }

    public function test_getByFiltros_status_pendente()
    {
        $response = $this->_intencaoVendaApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setStatus("Pendente,15")
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getId());
                $this->id = $intencaoVenda->getId();
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(1, $intencaoVenda->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorOriginal());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorAcrescimo());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorDesconto());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorFinal());
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
                $this->assertInstanceOf(IntencaoVenda::class, $intencaoVenda);
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
                $this->assertInstanceOf(FormaPagamento::class, $intencaoVenda->getFormaPagamento());
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento()->getFluxoPagamento());
                $this->assertInstanceOf(FluxoPagamento::class, $intencaoVenda->getFormaPagamento()->getFluxoPagamento());
                $this->assertNotEmpty($intencaoVenda->getTerminal());
                $this->assertInstanceOf(Terminal::class, $intencaoVenda->getTerminal());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(Pessoa::class, $intencaoVenda->getVendedor());
                $this->assertNotEmpty($intencaoVenda->getVendedor());
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
        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(1, $intencaoVenda->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorOriginal());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorAcrescimo());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorDesconto());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorFinal());
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
                $this->assertInstanceOf(IntencaoVenda::class, $intencaoVenda);
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
                $this->assertInstanceOf(FormaPagamento::class, $intencaoVenda->getFormaPagamento());
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento()->getFluxoPagamento());
                $this->assertInstanceOf(FluxoPagamento::class, $intencaoVenda->getFormaPagamento()->getFluxoPagamento());
                $this->assertNotEmpty($intencaoVenda->getTerminal());
                $this->assertInstanceOf(Terminal::class, $intencaoVenda->getTerminal());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(Pessoa::class, $intencaoVenda->getVendedor());
                $this->assertNotEmpty($intencaoVenda->getVendedor());
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

        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(1, $intencaoVenda->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorOriginal());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorAcrescimo());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorDesconto());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorFinal());
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
                $this->assertInstanceOf(IntencaoVenda::class, $intencaoVenda);
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
                $this->assertInstanceOf(FormaPagamento::class, $intencaoVenda->getFormaPagamento());
                $this->assertNotEmpty($intencaoVenda->getFormaPagamento()->getFluxoPagamento());
                $this->assertInstanceOf(FluxoPagamento::class, $intencaoVenda->getFormaPagamento()->getFluxoPagamento());
                $this->assertNotEmpty($intencaoVenda->getTerminal());
                $this->assertInstanceOf(Terminal::class, $intencaoVenda->getTerminal());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
                $this->assertInstanceOf(Pessoa::class, $intencaoVenda->getVendedor());
                $this->assertNotEmpty($intencaoVenda->getVendedor());
                break;
            }

    }

}