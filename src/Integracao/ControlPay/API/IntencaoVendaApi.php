<?php

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
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
            $response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($getByFiltrosRequest),
            ]);

            return SerializerHelper::denormalize(
                $response->json(),
                Contracts\IntencaoVenda\GetByFiltrosResponse::class
            );
        }catch (RequestException $ex) {
            $responseBody = $ex->getResponse()->json();
            throw new \Exception($responseBody['message']);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

}