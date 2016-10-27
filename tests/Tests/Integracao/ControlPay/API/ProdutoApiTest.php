<?php

namespace Tests\Integracao\NTKOnline\Api;

use Integracao\ControlPay\API\ProdutoApi;
use Integracao\ControlPay\API\VenderApi;
use Integracao\ControlPay\Contracts\PagamentoExterno\GetByFiltrosRequest;
use Integracao\ControlPay\Model\FluxoPagamento;
use Integracao\ControlPay\Model\FormaPagamento;
use Integracao\ControlPay\Model\IntencaoVenda;
use Integracao\ControlPay\Model\IntencaoVendaStatus;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\ProdutoStatus;
use Tests\Integracao\ControlPay\PHPUnit;

/**
 * Class ProdutoApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class ProdutoApiTest extends PHPUnit
{

    /**
     * @var ProdutoApi
     */
    private $_produtoApi;

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
        $this->_produtoApi = new ProdutoApi($this->client);
    }

    public function test_getByAtivosByPessoaId()
    {
        $response = $this->_produtoApi->getByAtivosByPessoaId(7343);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertNotEmpty($response->getProdutos());
        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_produtoApi->getResponse());

        if(!empty($response->getProdutos()))
            foreach ($response->getProdutos() as $produto)
            {
                $this->assertNotEmpty($produto->getId());
                $this->id = $produto->getId();
                $this->assertNotEmpty($produto->getDescricao());
                $this->assertInstanceOf(ProdutoStatus::class, $produto->getProdutoStatus());
                break;
            }

    }

}