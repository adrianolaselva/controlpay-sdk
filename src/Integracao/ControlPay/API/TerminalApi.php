<?php

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Contracts;

/**
 * Class TerminalApi
 * @package Integracao\ControlPay\API
 */
class TerminalApi extends AbstractAPI
{

    /**
     * TerminalApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('terminal', $client);
    }

    /**
     * @param integer $pessoaId
     * @return Contracts\Terminal\GetByPessoaIdResponse
     * @throws \Exception
     */
    public function getByPessoaId($pessoaId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'pessoaId' => $pessoaId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Terminal\GetByPessoaIdResponse::class
            );
        }catch (RequestException $ex) {
            $responseBody = $ex->getResponse()->json();
            throw new \Exception($responseBody['message']);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param integer $terminalId
     * @return Contracts\Terminal\GetByIdResponse
     * @throws \Exception
     */
    public function getById($terminalId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'terminalId' => $terminalId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Terminal\GetByIdResponse::class
            );
        }catch (RequestException $ex) {
            $responseBody = $ex->getResponse()->json();
            throw new \Exception($responseBody['message']);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

    /**
     * @param Contracts\Terminal\InsertRequest $insertRequest
     * @return Contracts\Terminal\GetByIdResponse
     * @throws \Exception
     */
    public function insert(Contracts\Terminal\InsertRequest $insertRequest)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'body' => json_encode($insertRequest)
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Terminal\InsertResponse::class
            );
        }catch (RequestException $ex) {
            $responseBody = $ex->getResponse()->json();
            throw new \Exception($responseBody['message']);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

}