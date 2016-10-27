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
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Contracts;

/**
 * Class VenderApi
 * @package Integracao\ControlPay\API
 */
class VendaApi extends AbstractAPI
{

    /**
     * VenderApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('venda', $client);
    }

    /**
     * @param Contracts\Venda\VenderRequest $venderRequest
     * @return Contracts\Venda\VenderResponse
     * @throws \Exception
     */
    public function vender(Contracts\Venda\VenderRequest $venderRequest)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($venderRequest),
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Venda\VenderResponse::class
            );
        }catch (RequestException $ex) {
            $this->response = $ex->getResponse();
            $responseBody = $ex->getResponse()->json();
            throw new \Exception($responseBody['message']);
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