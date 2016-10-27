<?php

namespace Tests\Integracao\NTKOnline\Api;

use Integracao\ControlPay\API\IntencaoVendaApi;
use Integracao\ControlPay\Contracts\IntencaoVenda\GetByFiltrosRequest;
use Integracao\ControlPay\Contracts\IntencaoVenda\GetByIntegracaoIdRequest;
use Integracao\ControlPay\Model\FluxoPagamento;
use Integracao\ControlPay\Model\FormaPagamento;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\IntencaoVendaStatus;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\Terminal;
use Tests\Integracao\ControlPay\PHPUnit;

/**
 * Class IntencaoVendaApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class IntencaoVendaApiTest extends PHPUnit
{

    /**
     * @var IntencaoVenda
     */
    private $_intencaoVendaApi;

    /**
     * @var integer
     */
    private $id;


    /**
     * UsuarioApi constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_intencaoVendaApi = new IntencaoVendaApi($this->client);
    }

    public function test_getByFiltros_status_pendente()
    {
        $response = $this->_intencaoVendaApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setStatus("Pendente,15")
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        //$this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_intencaoVendaApi->getResponse());

        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getId());
                $this->id = $intencaoVenda->getId();
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getQuantidade());
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
        //$this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_intencaoVendaApi->getResponse());

        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getQuantidade());
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
        //$this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_intencaoVendaApi->getResponse());

        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getQuantidade());
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

    public function test_getById()
    {
        $response = $this->_intencaoVendaApi->getById(22274);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        //$this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_intencaoVendaApi->getResponse());

        if(!empty($response->getIntencoesVendas()))
            foreach ($response->getIntencoesVendas() as $intencaoVenda)
            {
                $this->assertNotEmpty($intencaoVenda->getToken());
                $this->assertNotEmpty($intencaoVenda->getData());
                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getQuantidade());
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

//    /**
//     * API Provavelmente descontinuada
//     */
//    public function test_getByIntegracaoId()
//    {
//        $response = $this->_intencaoVendaApi->getByIntegracaoId(
//            (new GetByIntegracaoIdRequest())
//                ->setIntegracaoId(1)
//        );
//
//        $this->assertNotEmpty($response->getData());
//        $this->assertInstanceOf(\DateTime::class, $response->getData());
//        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_intencaoVendaApi->getResponse());
//
//        if(!empty($response->getIntencoesVendas()))
//            foreach ($response->getIntencoesVendas() as $intencaoVenda)
//            {
//                $this->assertNotEmpty($intencaoVenda->getId());
//                $this->id = $intencaoVenda->getId();
//                $this->assertNotEmpty($intencaoVenda->getToken());
//                $this->assertNotEmpty($intencaoVenda->getData());
//                $this->assertInstanceOf(\DateTime::class, $intencaoVenda->getData());
//                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getQuantidade());
//                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorOriginal());
//                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorAcrescimo());
//                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorDesconto());
//                $this->assertGreaterThanOrEqual(0, $intencaoVenda->getValorFinal());
//                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
//                $this->assertInstanceOf(IntencaoVenda::class, $intencaoVenda);
//                $this->assertNotEmpty($intencaoVenda->getFormaPagamento());
//                $this->assertInstanceOf(FormaPagamento::class, $intencaoVenda->getFormaPagamento());
//                $this->assertNotEmpty($intencaoVenda->getFormaPagamento()->getFluxoPagamento());
//                $this->assertInstanceOf(FluxoPagamento::class, $intencaoVenda->getFormaPagamento()->getFluxoPagamento());
//                $this->assertNotEmpty($intencaoVenda->getTerminal());
//                $this->assertInstanceOf(Terminal::class, $intencaoVenda->getTerminal());
//                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
//                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
//                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
//                $this->assertInstanceOf(IntencaoVendaStatus::class, $intencaoVenda->getIntencaoVendaStatus());
//                $this->assertNotEmpty($intencaoVenda->getIntencaoVendaStatus());
//                $this->assertInstanceOf(Pessoa::class, $intencaoVenda->getVendedor());
//                $this->assertNotEmpty($intencaoVenda->getVendedor());
//                break;
//            }
//    }

}