<?php

namespace Tests\Integracao\NTKOnline\Api;

use Integracao\ControlPay\API\TerminalApi;
use Integracao\ControlPay\Contracts\Terminal\InsertRequest;
use Integracao\ControlPay\Model\Impressora;
use Integracao\ControlPay\Model\Pessoa;
use Integracao\ControlPay\Model\ProdutoStatus;
use Integracao\ControlPay\Model\Terminal;
use Tests\Integracao\ControlPay\PHPUnit;

/**
 * Class TerminalApiTest
 * @package Integracao\NTKOnline\Api
 *
 */
class TerminalApiTest extends PHPUnit
{

    /**
     * @var TerminalApi
     */
    private $_terminalApi;

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
        $this->_terminalApi = new TerminalApi($this->client);
    }

    public function test_insert()
    {
        $response = $this->_terminalApi->insert(
            (new InsertRequest())
                ->setId(22)
                ->setNome("Teste 123")
                ->setImpressora(
                    (new Impressora())
                        ->setId(8)
                )
                ->setPessoa(
                    (new Pessoa())
                        ->setId(7343)
                )

        );

        $this->assertInstanceOf(\GuzzleHttp\Message\ResponseInterface::class, $this->_terminalApi->getResponse());
        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertNotEmpty($response->getTerminal());
        $this->assertInstanceOf(Terminal::class, $response->getTerminal());
    }

    public function test_getByAtivosByPessoaId()
    {
        $response = $this->_terminalApi->getByPessoaId(7343);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertNotEmpty($response->getTerminais());

        if(!empty($response->getTerminais()))
            foreach ($response->getTerminais() as $terminal)
            {
                $this->assertNotEmpty($terminal->getId());
                $this->id = $terminal->getId();
                $this->assertNotEmpty($terminal->getNome());
                break;
            }

    }

    public function test_getById()
    {
        $response = $this->_terminalApi->getById(22);

        $this->assertNotEmpty($response->getData());
        $this->assertInstanceOf(\DateTime::class, $response->getData());
        $this->assertNotEmpty($response->getTerminal());
        $this->assertInstanceOf(Terminal::class, $response->getTerminal());
    }

}