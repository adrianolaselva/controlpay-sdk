<?php

namespace Tests\Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\API\IntencaoVendaApi;
use Integracao\ControlPay\API\VendaApi;
use Integracao\ControlPay\Contracts\IntencaoVenda\GetByFiltrosRequest;
use Integracao\ControlPay\Contracts\Pedido\InserirRequest;
use Integracao\ControlPay\Contracts\Venda\CancelarVendaRequest;
use Integracao\ControlPay\Contracts\Venda\VenderComPedidoRequest;
use Integracao\ControlPay\Contracts\Venda\VenderRequest;
use Integracao\ControlPay\Model\FluxoPagamento;
use Integracao\ControlPay\Model\FormaPagamento;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\IntencaoVendaStatus;
use Integracao\ControlPay\Model\Produto;
use Integracao\ControlPay\Model\Terminal;
use Tests\Integracao\ControlPay\PHPUnit;

/**
 * Class VendaApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class VendaApiTest extends PHPUnit
{

    /**
     * @var VendaApi
     */
    private $_venderApi;

    /**
     * @var IntencaoVendaApi
     */
    private $_intencaoVendaApi;

    /**
     * @var string
     */
    private static $referencia;

    /**
     * @var string
     */
    private static $intencaoVendaId;

    /**
     * @var string
     */
    private static $terminalId;

    /**
     * @var string
     */
    private static $senhaTecnica;

    /**
     * UsuarioApi constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_venderApi = new VendaApi($this->client);
        $this->_intencaoVendaApi = new IntencaoVendaApi($this->client);
        self::$referencia = rand(100000, 999999);
        self::$terminalId = 59;
    }

    public function test_vender_semtef()
    {
        $response = $this->_venderApi->vender(
            (new VenderRequest())
                ->setReferencia(self::$referencia)
                ->setOperadorId(null)
                ->setPessoaClienteId(null)
                //->setFormaPagamentoId(21)
                ->setPedidoId(null)
                //->setTerminalId(self::$terminalId)
                ->setValorTotalVendido(null)
                ->setValorAcrescimo(null)
                ->setValorDesconto(null)
                ->setObservacao(null)
                //->setAguardarTefIniciarTransacao(false) //Aciona TEF
                ->setParcelamentoAdmin(null)
                ->setQuantidadeParcelas(null)
                ->setProdutosVendidos([
                    (new Produto())
                        //->setId(41)
                        ->setValor(12.00)
                        //->setQuantidade(1)
                ])
        );

        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_venderApi->getResponse());
        $this->assertNotEmpty($response->getData());
        $this->assertNotEmpty($response->getIntencaoVenda()->getToken());
        self::$intencaoVendaId = $response->getIntencaoVenda()->getId();
        $this->assertGreaterThanOrEqual(1, $response->getIntencaoVenda()->getQuantidade());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorOriginal());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorAcrescimo());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorDesconto());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorFinal());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertNotEmpty($response->getIntencaoVenda()->getFormaPagamento());
        $this->assertInstanceOf(IntencaoVenda::class, $response->getIntencaoVenda());
        $this->assertNotEmpty($response->getIntencaoVenda()->getFormaPagamento());
        $this->assertInstanceOf(FormaPagamento::class, $response->getIntencaoVenda()->getFormaPagamento());
        $this->assertNotEmpty($response->getIntencaoVenda()->getFormaPagamento()->getFluxoPagamento());
        $this->assertInstanceOf(FluxoPagamento::class, $response->getIntencaoVenda()->getFormaPagamento()->getFluxoPagamento());
        $this->assertNotEmpty($response->getIntencaoVenda()->getTerminal());
        $this->assertInstanceOf(Terminal::class, $response->getIntencaoVenda()->getTerminal());
        $this->assertNotEmpty($response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertInstanceOf(IntencaoVendaStatus::class, $response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertNotEmpty($response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertInstanceOf(IntencaoVendaStatus::class, $response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertNotEmpty($response->getIntencaoVenda()->getProdutos());
        $this->assertNotEmpty($response->getIntencaoVenda()->getPagamentosExterno());
    }

    public function test_cancelarVenda_semtef()
    {
        try{
            $response = $this->_venderApi->cancelarVenda(
                (new CancelarVendaRequest())
                    ->setReferencia(self::$referencia)
                    ->setIntencaoVendaId(self::$intencaoVendaId)
                    //->setTerminalId(self::$terminalId)
                    ->setSenhaTecnica(self::$senhaTecnica)
            //->setAguardarTefIniciarTransacao(false)
            );
        }catch (RequestException $ex) {
            return;
        }

        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_venderApi->getResponse());
        $this->assertNotEmpty($response->getData());
        $this->assertNotEmpty($response->getIntencaoVenda()->getToken());
        $this->assertGreaterThanOrEqual(1, $response->getIntencaoVenda()->getQuantidade());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorOriginal());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorAcrescimo());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorDesconto());
        $this->assertGreaterThanOrEqual(0, $response->getIntencaoVenda()->getValorFinal());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertNotEmpty($response->getIntencaoVenda()->getFormaPagamento());
        $this->assertInstanceOf(IntencaoVenda::class, $response->getIntencaoVenda());
        $this->assertNotEmpty($response->getIntencaoVenda()->getFormaPagamento());
        $this->assertInstanceOf(FormaPagamento::class, $response->getIntencaoVenda()->getFormaPagamento());
        $this->assertNotEmpty($response->getIntencaoVenda()->getFormaPagamento()->getFluxoPagamento());
        $this->assertInstanceOf(FluxoPagamento::class, $response->getIntencaoVenda()->getFormaPagamento()->getFluxoPagamento());
        $this->assertNotEmpty($response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertInstanceOf(IntencaoVendaStatus::class, $response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertNotEmpty($response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertInstanceOf(IntencaoVendaStatus::class, $response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertNotEmpty($response->getIntencaoVenda()->getProdutos());
    }

    public function test_getByFiltros_referencia()
    {
        $response = $this->_intencaoVendaApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setReferencia(self::$referencia)
        );

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
                break;
            }

    }

}