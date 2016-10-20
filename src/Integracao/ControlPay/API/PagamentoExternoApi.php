<?php

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Contracts;

/**
 * Class PagamentoExternoApi
 * @package Integracao\ControlPay\API
 */
class PagamentoExternoApi extends AbstractAPI
{

    /**
     * PagamentoExternoApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('pagamentoExterno', $client);
    }

    /**
     * @param Contracts\PagamentoExterno\GetByFiltrosRequest $getByFiltrosRequest
     * @return Contracts\PagamentoExterno\GetByFiltrosResponse
     * @throws \Exception
     */
    public function getByFiltros(Contracts\PagamentoExterno\GetByFiltrosRequest $getByFiltrosRequest)
    {
        try{
            $response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($getByFiltrosRequest),
            ]);

            return SerializerHelper::denormalize(
                $response->json(),
                Contracts\PagamentoExterno\GetByFiltrosResponse::class
            );
        }catch (RequestException $ex) {
            $responseBody = $ex->getResponse()->json();
            throw new \Exception($responseBody['message']);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

}