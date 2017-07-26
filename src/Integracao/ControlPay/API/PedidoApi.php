<?php

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Constants\ControlPayParameterConst;
use Integracao\ControlPay\Contracts\Pedido;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class PedidoApi
 * @package Integracao\ControlPay\API
 */
class PedidoApi extends AbstractAPI
{
    /**
     * PedidoApi constructor.
     */
    public function __construct(Client $client)
    {
        parent::__construct('pedido', $client);
    }

    /**
     * @param Pedido\InserirRequest $inserirRequest
     * @return Pedido\InserirResponse
     * @throws \Exception
     */
    public function insert(Pedido\InserirRequest $inserirRequest)
    {
        try{

            foreach ($inserirRequest->getProdutosPedido() as $key => $produto)
            {
                if(empty($produto->getId()))
                    $inserirRequest->getProdutosPedido()[$key]->setId(
                        $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_PRODUTO_ID)
                    );
            }

            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($inserirRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Pedido\InserirResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param Pedido\GetByFiltrosRequest $getByFiltrosRequest
     * @return Pedido\GetByFiltrosResponse
     * @throws \Exception
     */
    public function getByFiltros(Pedido\GetByFiltrosRequest $getByFiltrosRequest)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($getByFiltrosRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Pedido\GetByFiltrosResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param $pessoaId
     * @param $pedidoReferencia
     * @return Pedido\GetByPessoaIdByReferenciaResponse
     * @throws \Exception
     */
    public function getByPessoaIdByReferencia($pessoaId, $pedidoReferencia)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'pessoaId' => $pessoaId,
                    'pedidoReferencia' => $pedidoReferencia
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Pedido\GetByPessoaIdByReferenciaResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param $pessoaVendedorId
     * @param $pedidoId
     * @return Pedido\GetByPessoaIdByReferenciaResponse
     * @throws \Exception
     */
    public function getPedidosByPessoaId($pessoaVendedorId, $pedidoId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'pessoaVendedorId' => $pessoaVendedorId,
                    'pedidoId' => $pedidoId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Pedido\GetByPessoaIdByReferenciaResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param $pedidoId
     * @return Pedido\CancelarResponse
     * @throws \Exception
     */
    public function cancelar($pedidoId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'pedidoId' => $pedidoId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Pedido\CancelarResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param integer $pedidoId
     * @return Pedido\GetByIdResponse
     * @throws \Exception
     */
    public function getById($pedidoId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'pedidoId' => $pedidoId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Pedido\GetByIdResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }
}