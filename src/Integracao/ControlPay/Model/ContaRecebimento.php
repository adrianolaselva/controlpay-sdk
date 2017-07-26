<?php

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class ContaRecebimento
 * @package Integracao\ControlPay\Model
 */
class ContaRecebimento implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Pessoa
     */
    private $pessoa;

    /**
     * @var double
     */
    private $saldoAtual;

    /**
     * @var \DateTime
     */
    private $dataInsercao;

    /**
     * @var array
     */
    private $contaRecebimentoLancamentos;

    /**
     * ContaRecebimento constructor.
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
     * @return ContaRecebimento
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * @param Pessoa $pessoa
     * @return ContaRecebimento
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

        if(is_array($this->pessoa))
            $this->pessoa = SerializerHelper::denormalize($pessoa, Pessoa::class);

        return $this;
    }

    /**
     * @return float
     */
    public function getSaldoAtual()
    {
        return $this->saldoAtual;
    }

    /**
     * @param float $saldoAtual
     * @return ContaRecebimento
     */
    public function setSaldoAtual($saldoAtual)
    {
        $this->saldoAtual = $saldoAtual;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataInsercao()
    {
        return $this->dataInsercao;
    }

    /**
     * @param \DateTime $dataInsercao
     * @return ContaRecebimento
     */
    public function setDataInsercao($dataInsercao)
    {
        $this->dataInsercao = \DateTime::createFromFormat('d/m/Y H:i:s.u', $dataInsercao);
        return $this;
    }

    /**
     * @return array
     */
    public function getContaRecebimentoLancamentos()
    {
        return $this->contaRecebimentoLancamentos;
    }

    /**
     * @param array $contaRecebimentoLancamentos
     * @return ContaRecebimento
     */
    public function setContaRecebimentoLancamentos($contaRecebimentoLancamentos)
    {

        foreach ($contaRecebimentoLancamentos as $contaRecebimentoLancamento)
        {
            $this->contaRecebimentoLancamentos[] = SerializerHelper::denormalize(
                $contaRecebimentoLancamento, ContaRecebimentoLancamento::class);
        }

        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'pessoa' => $this->pessoa,
            'saldoAtual' => $this->saldoAtual,
            'dataInsercao' => $this->dataInsercao,
            'contaRecebimentoLancamentos' => $this->contaRecebimentoLancamentos,
        ];
    }


}