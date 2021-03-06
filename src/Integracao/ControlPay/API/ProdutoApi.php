<?php

namespace Integracao\ControlPay\API;

use GuzzleHttp\Exception\RequestException;
use Integracao\ControlPay\AbstractAPI;
use Integracao\ControlPay\Client;
use Integracao\ControlPay\Helpers\SerializerHelper;
use Integracao\ControlPay\Contracts;

/**
 * Class ProdutoApi
 * @package Integracao\ControlPay\API
 */
class ProdutoApi extends AbstractAPI
{

    /**
     * ProdutoApi constructor.
     */
    public function __construct(Client $client = null)
    {
        parent::__construct('produto', $client);
    }

    /**
     * @param integer $pessoaId
     * @return Contracts\Venda\VenderResponse
     * @throws \Exception
     */
    public function getByAtivosByPessoaId($pessoaId)
    {
        try{
            $this->response = $this->_httpClient->post(__FUNCTION__,[
                'query' => $this->addQueryAdditionalParameters([
                    'pessoaId' => $pessoaId
                ])
            ]);

            return SerializerHelper::denormalize(
                $this->response->json(),
                Contracts\Produto\GetByAtivosByPessoaIdResponse::class
            );
        }catch (RequestException $ex) {
            $this->requestException($ex);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage(), $ex->getCode(), $ex);
        }
    }

}