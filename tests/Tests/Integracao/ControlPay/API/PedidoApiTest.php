<?php

namespace Tests\Integracao\ControlPay\API;

use Integracao\ControlPay\API\PedidoApi;
use Integracao\ControlPay\Contracts\Pedido\GetByFiltrosRequest;
use Integracao\ControlPay\Contracts\Pedido\InserirRequest;
use Integracao\ControlPay\Model\Pedido;
use Integracao\ControlPay\Model\PedidoStatus;
use Integracao\ControlPay\Model\Produto;
use Tests\Integracao\ControlPay\PHPUnit;

/**
 * Class PedidoApiTest
 * @package Tests\Integracao\NTKOnline\Api
 */
class PedidoApiTest extends PHPUnit
{
    /**
     * @var PedidoApi
     */
    private $_pedidoApi;

    /**
     * @var string
     */
    private static $referencia;

    /**
     * @var integer
     */
    private static $pessoaId;

    /**
     * @var integer
     */
    private static $pedidoId;

    /**
     * PedidoApiTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_pedidoApi = new PedidoApi($this->client);
        self::$referencia = rand(100000, 999999);
        self::$pessoaId = 7343;
    }

    public function test_inserir()
    {
        $response = $this->_pedidoApi->insert(
            (new InserirRequest())
                ->setReferencia(self::$referencia)
                ->setUrlRetorno('api.cointrolpay.furacao.com.br/callbacks/controlpayintencaovendacallBack')
                ->setValorTotalPedido(20.00)
                ->setProdutosPedido([
                    (new Produto())
                        //->setId(41)
                        ->setValor(20.00)
                        ->setQuantidade(1)
                ])
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_pedidoApi->getResponse());
        $this->assertInstanceOf(Pedido::class, $response->getPedido());
        $this->assertInstanceOf(PedidoStatus::class, $response->getPedido()->getPedidoStatus());

        $this->assertNotEmpty($response->getPedido()->getId());
        self::$pedidoId = $response->getPedido()->getId();
        $this->assertNotEmpty($response->getPedido()->getData());
        $this->assertNotEmpty($response->getPedido()->getHora());
        $this->assertNotEmpty($response->getPedido()->getTipo());
        $this->assertNotEmpty($response->getPedido()->getQuantidade());
        $this->assertNotEmpty($response->getPedido()->getReferencia());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValor());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorAberto());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorOriginalEmPagamento());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorOriginalPago());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorTotalPedido());

        if(!empty($response->getPedido()->getProdutos()))
            foreach ($response->getPedido()->getProdutos() as $produto)
            {
                $this->assertNotEmpty($produto->getId());
                $this->assertNotEmpty($produto->getNome());
                $this->assertNotEmpty($produto->getQuantidade());
                $this->assertNotEmpty($produto->getDescricao());
                $this->assertNotEmpty($produto->getValor());
                break;
            }
    }

    public function test_getByFiltros()
    {
        $response = $this->_pedidoApi->getByFiltros(
            (new GetByFiltrosRequest())
                ->setDataInicio(
                    (new \DateTime('now'))
                        ->sub(new \DateInterval('P3D'))
                )
                ->setDataFim(
                    (new \DateTime('now'))
                        ->add(new \DateInterval('P10D'))
                )
        );

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_pedidoApi->getResponse());

        if(!empty($response->getPedidos()))
            foreach ($response->getPedidos() as $pedido)
            {
                $this->assertInstanceOf(Pedido::class, $pedido);
                $this->assertInstanceOf(PedidoStatus::class, $pedido->getPedidoStatus());

                $this->assertNotEmpty($pedido->getData());
                $this->assertNotEmpty($pedido->getHora());
                $this->assertNotEmpty($pedido->getTipo());
                $this->assertNotEmpty($pedido->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $pedido->getValor());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorAberto());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorOriginalEmPagamento());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorOriginalPago());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorTotalPedido());

                if(!empty($pedido->getProdutos()))
                    foreach ($pedido->getProdutos() as $produto)
                    {
                        $this->assertInstanceOf(Produto::class, $produto);
                        $this->assertNotEmpty($produto->getId());
                        $this->assertNotEmpty($produto->getNome());
                        $this->assertNotEmpty($produto->getQuantidade());
                        $this->assertNotEmpty($produto->getDescricao());
                        $this->assertNotEmpty($produto->getValor());
                        break;
                    }
            }
    }

    public function test_getByPessoaIdByReferencia()
    {
        $response = $this->_pedidoApi->getByPessoaIdByReferencia(self::$pessoaId, self::$referencia);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_pedidoApi->getResponse());

        if(!empty($response->getPedidos()))
            foreach ($response->getPedidos() as $pedido)
            {
                $this->assertInstanceOf(Pedido::class, $pedido);
                $this->assertInstanceOf(PedidoStatus::class, $pedido->getPedidoStatus());

                $this->assertNotEmpty($pedido->getData());
                $this->assertNotEmpty($pedido->getHora());
                $this->assertNotEmpty($pedido->getTipo());
                $this->assertNotEmpty($pedido->getQuantidade());
                $this->assertNotEmpty($pedido->getReferencia());
                $this->assertGreaterThanOrEqual(0, $pedido->getValor());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorAberto());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorOriginalEmPagamento());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorOriginalPago());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorTotalPedido());

                if(!empty($pedido->getProdutos()))
                    foreach ($pedido->getProdutos() as $produto)
                    {
                        $this->assertInstanceOf(Produto::class, $produto);
                        $this->assertNotEmpty($produto->getId());
                        $this->assertNotEmpty($produto->getNome());
                        $this->assertNotEmpty($produto->getQuantidade());
                        $this->assertNotEmpty($produto->getDescricao());
                        $this->assertNotEmpty($produto->getValor());
                        break;
                    }
            }
    }

    public function test_getPedidosByPessoaId()
    {
        $response = $this->_pedidoApi->getPedidosByPessoaId(self::$pessoaId, self::$pedidoId);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_pedidoApi->getResponse());

        if(!empty($response->getPedidos()))
            foreach ($response->getPedidos() as $pedido)
            {
                $this->assertInstanceOf(Pedido::class, $pedido);
                $this->assertInstanceOf(PedidoStatus::class, $pedido->getPedidoStatus());

                $this->assertNotEmpty($pedido->getData());
                $this->assertNotEmpty($pedido->getHora());
                $this->assertNotEmpty($pedido->getTipo());
                $this->assertNotEmpty($pedido->getQuantidade());
                $this->assertGreaterThanOrEqual(0, $pedido->getValor());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorAberto());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorOriginalEmPagamento());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorOriginalPago());
                $this->assertGreaterThanOrEqual(0, $pedido->getValorTotalPedido());

                if(!empty($pedido->getProdutos()))
                    foreach ($pedido->getProdutos() as $produto)
                    {
                        $this->assertInstanceOf(Produto::class, $produto);
                        $this->assertNotEmpty($produto->getId());
                        $this->assertNotEmpty($produto->getNome());
                        $this->assertNotEmpty($produto->getQuantidade());
                        $this->assertNotEmpty($produto->getDescricao());
                        $this->assertNotEmpty($produto->getValor());
                        break;
                    }
            }
    }

    public function test_getById()
    {
        $response = $this->_pedidoApi->getById(self::$pedidoId);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_pedidoApi->getResponse());
        $this->assertInstanceOf(Pedido::class, $response->getPedido());
        $this->assertInstanceOf(PedidoStatus::class, $response->getPedido()->getPedidoStatus());

        $this->assertNotEmpty($response->getPedido()->getData());
        $this->assertNotEmpty($response->getPedido()->getHora());
        $this->assertNotEmpty($response->getPedido()->getTipo());
        $this->assertNotEmpty($response->getPedido()->getQuantidade());
        $this->assertNotEmpty($response->getPedido()->getReferencia());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValor());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorAberto());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorOriginalEmPagamento());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorOriginalPago());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorTotalPedido());

        if(!empty($response->getPedido()->getProdutos()))
            foreach ($response->getPedido()->getProdutos() as $produto)
            {
                $this->assertNotEmpty($produto->getId());
                $this->assertNotEmpty($produto->getNome());
                $this->assertNotEmpty($produto->getQuantidade());
                $this->assertNotEmpty($produto->getDescricao());
                $this->assertNotEmpty($produto->getValor());
                break;
            }
    }

    public function test_cancelar()
    {
        $response = $this->_pedidoApi->cancelar(self::$pedidoId);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_pedidoApi->getResponse());
        $this->assertInstanceOf(Pedido::class, $response->getPedido());
        $this->assertInstanceOf(PedidoStatus::class, $response->getPedido()->getPedidoStatus());

        $this->assertNotEmpty($response->getPedido()->getData());
        $this->assertNotEmpty($response->getPedido()->getHora());
        $this->assertNotEmpty($response->getPedido()->getTipo());
        $this->assertNotEmpty($response->getPedido()->getQuantidade());
        $this->assertNotEmpty($response->getPedido()->getReferencia());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValor());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorAberto());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorOriginalEmPagamento());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorOriginalPago());
        $this->assertGreaterThanOrEqual(0, $response->getPedido()->getValorTotalPedido());

        if(!empty($response->getPedido()->getProdutos()))
            foreach ($response->getPedido()->getProdutos() as $produto)
            {
                $this->assertNotEmpty($produto->getId());
                $this->assertNotEmpty($produto->getNome());
                $this->assertNotEmpty($produto->getQuantidade());
                $this->assertNotEmpty($produto->getDescricao());
                $this->assertNotEmpty($produto->getValor());
                break;
            }
    }

}