<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/10/2016
 * Time: 09:51
 */

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Constants\ControlPayParameterConst;
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Contracts;

/**
 * Class VenderApi
 * @package Integracao\ControlPay\API
 */
class VendaApi extends AbstractAPI
{
    /**
     * @var PedidoApi
     */
    private $pedidoApi;

    /**
     * VenderApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('venda', $client);
        $this->pedidoApi = new PedidoApi($client);
    }

    /**
     * @param Contracts\Venda\VenderRequest $venderRequest
     * @return Contracts\Venda\VenderResponse
     * @throws \Exception
     */
    public function vender(Contracts\Venda\VenderRequest $venderRequest)
    {
        try{

            if(empty($venderRequest->getTerminalId()))
                $venderRequest->setTerminalId(
                    $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_TERMINAL_ID)
                );
            
            if(empty($venderRequest->getFormaPagamentoId()))
                $venderRequest->setFormaPagamentoId(
                    $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_PAGAMENTO_ID)
                );

            if(empty($venderRequest->isAguardarTefIniciarTransacao()))
                $venderRequest->setAguardarTefIniciarTransacao(
                    boolval(
                        $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_AGUARDA_TEF)
                    )
                );

            foreach ($venderRequest->getProdutosVendidos() as $key => $produto)
            {
                if(empty($produto->getId()))
                    $venderRequest->getProdutosVendidos()[$key]->setId(
                        $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_PRODUTO_ID)
                    );

                if(empty($produto->getQuantidade()))
                    $venderRequest->getProdutosVendidos()[$key]->setQuantidade(
                        $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_PRODUTO_QTDE)
                    );
            }

            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($venderRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Venda\VenderResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param Contracts\Venda\VenderComPedidoRequest $venderComPedidoRequest
     * @return Contracts\Venda\VenderResponse
     * @throws \Exception
     */
    public function venderComPedido(Contracts\Venda\VenderComPedidoRequest $venderComPedidoRequest)
    {
        try{
            $response = $this->pedidoApi->insert($venderComPedidoRequest->getPedidoInserirRequest());

            if(empty($response->getPedido()->getId()))
                throw new \Exception("Falha ao inserir pedido");

            $venderComPedidoRequest->getInventarioVenderRequest()->setPedidoId(
                $response->getPedido()->getId()
            );

            return $this->vender($venderComPedidoRequest->getInventarioVenderRequest());
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param Contracts\Venda\CancelarVendaRequest $cancelarVendaRequest
     * @return Contracts\Venda\CancelarVendaResponse
     * @throws \Exception
     */
    public function cancelarVenda(Contracts\Venda\CancelarVendaRequest $cancelarVendaRequest)
    {
        try{

            if(empty($cancelarVendaRequest->getTerminalId()))
                $cancelarVendaRequest->setTerminalId(
                    $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_TERMINAL_ID)
                );

            if(empty($cancelarVendaRequest->getSenhaTecnica()))
                $cancelarVendaRequest->setSenhaTecnica(
                    $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_SENHA_TECNICA)
                );

            if(empty($cancelarVendaRequest->isAguardarTefIniciarTransacao()))
                $cancelarVendaRequest->setAguardarTefIniciarTransacao(
                    boolval(
                        $this->_client->getParameter(ControlPayParameterConst::CONTROLPAY_DEFAULT_FORMA_AGUARDA_TEF)
                    )
                );


            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($cancelarVendaRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Venda\CancelarVendaResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }


//    /**
//     * API Provavelmente descontinuada
//     *
//     * @return Contracts\Venda\ConsultarVendasResponse
//     * @throws \Exception
//     */
//    public function consultarVendas(array $ids = [])
//    {
//        try{
//            $this->response = $this->_httpClient->post(__FUNCTION__, [
//                'body' => json_encode(array_map(function($id){
//                    return [
//                        'Id' => (string)$id
//                    ];
//                },$ids))
//            ]);
//
//            return SerializerHelper::denormalize(
//                $this->response->json(),
//                Contracts\Venda\ConsultarVendasResponse::class
//            );
//        }catch (RequestException $ex) {
//            $this->response = $ex->getResponse();
//            $responseBody = $ex->getResponse()->json();
//            throw new \Exception($responseBody['message']);
//        }catch (\Exception $ex){
//            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
//        }
//    }

}