<?php

namespace Integracao\NTKOnline\Api;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\API\LoginApi;
use Integracao\ControlPay\API\VenderApi;
use Integracao\ControlPay\Constants\ControlPayParameter;
use Integracao\ControlPay\Contracts\Login\ConsultaLoginRequest;
use Integracao\ControlPay\Contracts\Login\Login;
use Integracao\ControlPay\Contracts\Login\LoginRequest;
use Integracao\ControlPay\Contracts\Venda\VenderRequest;
use Integracao\ControlPay\Impl\BasicAuthentication;
use Integracao\ControlPay\Impl\KeyQueryStringAuthentication;
use Integracao\ControlPay\Model\FluxoPagamento;
use Integracao\ControlPay\Model\FormaPagamento;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\IntencaoVendaStatus;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\PessoaStatus;
use Integracao\ControlPay\Model\Produto;
use Integracao\ControlPay\Model\Terminal;
use Integracao\NTKOnline\Client;

/**
 * Class VenderApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class VenderApiTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var VenderApi
     */
    private $_venderApi;

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

        $this->_venderApi = new VenderApi($client);
    }

    public function test_vender_semtef()
    {
        $response = $this->_venderApi->vender(
            (new VenderRequest())
                ->setOperadorId(null)
                ->setPessoaClienteId(null)
                ->setFormaPagamentoId(21)
                ->setPedidoId(null)
                ->setTerminalId(null)
                ->setIntegracaoId(null)
                ->setValorTotalVendido(null)
                ->setValorAcrescimo(null)
                ->setValorDesconto(null)
                ->setObservacao(null)
                ->setAguardarTefIniciarTransacao(false) //Aciona TEF
                ->setParcelamentoAdmin(null)
                ->setQuantidadeParcelas(null)
                ->setProdutosVendidos([
                    (new Produto())
                        ->setId(41)
                        ->setValor(12.00)
                        ->setQuantidade(1)
                ])
        );

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
        $this->assertNotEmpty($response->getIntencaoVenda()->getTerminal());
        $this->assertInstanceOf(Terminal::class, $response->getIntencaoVenda()->getTerminal());
        $this->assertNotEmpty($response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertInstanceOf(IntencaoVendaStatus::class, $response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertNotEmpty($response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertInstanceOf(IntencaoVendaStatus::class, $response->getIntencaoVenda()->getIntencaoVendaStatus());
        $this->assertNotEmpty($response->getIntencaoVenda()->getProdutos());
        $this->assertNotEmpty($response->getIntencaoVenda()->getPagamentosExterno());
    }

}