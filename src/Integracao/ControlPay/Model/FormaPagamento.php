<?php
/**
 * Created by PhpStorm.
 * User: a.moreira
 * Date: 20/10/2016
 * Time: 10:00
 */

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class FormaPagamento
 * @package Integracao\ControlPay\Model
 */
class FormaPagamento implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $modalidade;

    /**
     * @var FluxoPagamento
     */
    private $fluxoPagamento;

    /**
     * FormaPagamento constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return FormaPagamento
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return FormaPagamento
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getModalidade()
    {
        return $this->modalidade;
    }

    /**
     * @param string $modalidade
     * @return FormaPagamento
     */
    public function setModalidade($modalidade)
    {
        $this->modalidade = $modalidade;
        return $this;
    }

    /**
     * @return FluxoPagamento
     */
    public function getFluxoPagamento()
    {
        return $this->fluxoPagamento;
    }

    /**
     * @param FluxoPagamento $fluxoPagamento
     * @return FormaPagamento
     */
    public function setFluxoPagamento($fluxoPagamento)
    {
        $this->fluxoPagamento = $fluxoPagamento;

        if(is_array($this->fluxoPagamento))
            $this->fluxoPagamento = SerializerHelper::denormalize($this->fluxoPagamento, FluxoPagamento::class);

        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'modalidade' => $this->modalidade,
            'fluxoPagamento' => $this->fluxoPagamento,
        ];
    }


}