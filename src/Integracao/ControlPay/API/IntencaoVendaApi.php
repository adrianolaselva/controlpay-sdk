<?php

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\ResponseInterface;
use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Contracts;

/**
 * Class IntencaoVendaApi
 * @package Integracao\ControlPay\API
 */
class IntencaoVendaApi extends AbstractAPI
{

    /**
     * IntencaoVendaApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('intencaoVenda', $client);
    }

    /**
     * @param Contracts\IntencaoVenda\GetByFiltrosRequest $getByFiltrosRequest
     * @return Contracts\IntencaoVenda\GetByFiltrosResponse
     * @throws \Exception
     */
    public function getByFiltros(Contracts\IntencaoVenda\GetByFiltrosRequest $getByFiltrosRequest)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($getByFiltrosRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\IntencaoVenda\GetByFiltrosResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param Contracts\IntencaoVenda\GetByFiltrosRequest $getByFiltrosRequest
     * @return Contracts\IntencaoVenda\GetByFiltrosResponse
     * @throws \Exception
     */
    public function getByFiltrosAsync(Contracts\IntencaoVenda\GetByFiltrosRequest $getByFiltrosRequest)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($getByFiltrosRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\IntencaoVenda\GetByFiltrosResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param integer $intencaoVendaId
     * @return Contracts\IntencaoVenda\GetByIdResponse
     * @throws \Exception
     */
    public function getById($intencaoVendaId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'intencaoVendaId' => $intencaoVendaId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\IntencaoVenda\GetByIdResponse::class
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
//     * @param Contracts\IntencaoVenda\GetByIntegracaoIdRequest $getByIntegracaoIdRequest
//     * @return Contracts\IntencaoVenda\GetByIntegracaoIdResponse
//     * @throws \Exception
//     */
//    public function getByIntegracaoId(Contracts\IntencaoVenda\GetByIntegracaoIdRequest $getByIntegracaoIdRequest)
//    {
//        try{
//            $this->response = $this->_httpClient->post(__FUNCTION__,[
//                'body' => json_encode($getByIntegracaoIdRequest),
//            ]);
//
//            return SerializerHelper::denormalize(
//                $this->response->json(),
//                Contracts\IntencaoVenda\GetByIntegracaoIdResponse::class
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