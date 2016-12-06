<?php

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class PagamentoExterno
 * @package Integracao\ControlPay\Model
 */
class PagamentoExterno implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var integer
     */
    private $origem;

    /**
     * @var integer
     */
    private $tipoParcelamento;

    /**
     * @var PagamentoExternoStatus
     */
    private $pagamentoExternoStatus;

    /**
     * @var Pessoa
     */
    private $pessoa;

    /**
     * @var IntencaoVenda
     */
    private $intencoesVenda;

    /**
     * @var Terminal
     */
    private $terminal;

    /**
     * @var integer
     */
    private $nsuTid;

    /**
     * @var string
     */
    private $autorizacao;

    /**
     * @var string
     */
    private $adquirente;

    /**
     * @var string
     */
    private $codigoRespostaAdquirente;

    /**
     * @var string
     */
    private $mensagemRespostaAdquirente;

    /**
     * @var \DateTime
     */
    private $dataAdquirente;

    /**
     * @var string
     */
    private $respostaAdquirente;

    /**
     * @var string
     */
    private $comprovanteAdquirente;

    /**
     * PagamentoExterno constructor.
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
     * @return PagamentoExterno
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     * @return PagamentoExterno
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrigem()
    {
        return $this->origem;
    }

    /**
     * @param int $origem
     * @return PagamentoExterno
     */
    public function setOrigem($origem)
    {
        $this->origem = $origem;
        return $this;
    }

    /**
     * @return int
     */
    public function getTipoParcelamento()
    {
        return $this->tipoParcelamento;
    }

    /**
     * @param int $tipoParcelamento
     * @return PagamentoExterno
     */
    public function setTipoParcelamento($tipoParcelamento)
    {
        $this->tipoParcelamento = $tipoParcelamento;
        return $this;
    }

    /**
     * @return PagamentoExternoStatus
     */
    public function getPagamentoExternoStatus()
    {
        return $this->pagamentoExternoStatus;
    }

    /**
     * @param PagamentoExternoStatus $pagamentoExternoStatus
     * @return PagamentoExterno
     */
    public function setPagamentoExternoStatus($pagamentoExternoStatus)
    {
        $this->pagamentoExternoStatus = $pagamentoExternoStatus;

        if(is_array($this->pagamentoExternoStatus))
            $this->pagamentoExternoStatus = SerializerHelper::denormalize(
                $this->pagamentoExternoStatus, PagamentoExternoStatus::class);

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
     * @return PagamentoExterno
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;

        if(is_array($this->pessoa))
            $this->pessoa = SerializerHelper::denormalize($this->pessoa, Pessoa::class);

        return $this;
    }

    /**
     * @return IntencaoVenda
     */
    public function getIntencoesVenda()
    {
        return $this->intencoesVenda;
    }

    /**
     * @param IntencaoVenda $intencoesVenda
     * @return PagamentoExterno
     */
    public function setIntencoesVenda($intencoesVenda)
    {
        $this->intencoesVenda = $intencoesVenda;

        if(is_array($this->intencoesVenda))
            $this->intencoesVenda = SerializerHelper::denormalize($this->intencoesVenda, IntencaoVenda::class);

        return $this;
    }

    /**
     * @return Terminal
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @param Terminal $terminal
     * @return PagamentoExterno
     */
    public function setTerminal($terminal)
    {
        $this->terminal = $terminal;

        if(is_array($this->terminal))
            $this->terminal = SerializerHelper::denormalize($this->terminal, Terminal::class);

        return $this;
    }

    /**
     * @return int
     */
    public function getNsuTid()
    {
        return $this->nsuTid;
    }

    /**
     * @param int $nsuTid
     * @return PagamentoExterno
     */
    public function setNsuTid($nsuTid)
    {
        $this->nsuTid = $nsuTid;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutorizacao()
    {
        return $this->autorizacao;
    }

    /**
     * @param string $autorizacao
     * @return PagamentoExterno
     */
    public function setAutorizacao($autorizacao)
    {
        $this->autorizacao = $autorizacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdquirente()
    {
        return $this->adquirente;
    }

    /**
     * @param string $adquirente
     * @return PagamentoExterno
     */
    public function setAdquirente($adquirente)
    {
        $this->adquirente = $adquirente;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigoRespostaAdquirente()
    {
        return $this->codigoRespostaAdquirente;
    }

    /**
     * @param string $codigoRespostaAdquirente
     * @return PagamentoExterno
     */
    public function setCodigoRespostaAdquirente($codigoRespostaAdquirente)
    {
        $this->codigoRespostaAdquirente = $codigoRespostaAdquirente;
        return $this;
    }

    /**
     * @return string
     */
    public function getMensagemRespostaAdquirente()
    {
        return $this->mensagemRespostaAdquirente;
    }

    /**
     * @param string $mensagemRespostaAdquirente
     * @return PagamentoExterno
     */
    public function setMensagemRespostaAdquirente($mensagemRespostaAdquirente)
    {
        $this->mensagemRespostaAdquirente = $mensagemRespostaAdquirente;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataAdquirente()
    {
        return $this->dataAdquirente;
    }

    /**
     * @param \DateTime $dataAdquirente
     * @return PagamentoExterno
     */
    public function setDataAdquirente($dataAdquirente)
    {
        $this->dataAdquirente = $dataAdquirente;
        return $this;
    }

    /**
     * @return string
     */
    public function getRespostaAdquirente()
    {
        return $this->respostaAdquirente;
    }

    /**
     * @param string $respostaAdquirente
     * @return PagamentoExterno
     */
    public function setRespostaAdquirente($respostaAdquirente)
    {
        $this->respostaAdquirente = explode(PHP_EOL, $respostaAdquirente);
        return $this;
    }

    /**
     * @return string
     */
    public function getComprovanteAdquirente()
    {
        return $this->comprovanteAdquirente;
    }

    /**
     * @param string $comprovanteAdquirente
     * @return PagamentoExterno
     */
    public function setComprovanteAdquirente($comprovanteAdquirente)
    {
        $this->comprovanteAdquirente = explode(PHP_EOL, $comprovanteAdquirente);
        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'terminal' => $this->terminal,
            'tipo' => $this->tipo,
            'origem' => $this->origem,
            'tipoParcelamento' => $this->tipoParcelamento,
            'pagamentoExternoStatus' => $this->pagamentoExternoStatus,
            'intencoesVenda' => $this->intencoesVenda,
            'nsuTid' => $this->nsuTid,
            'autorizacao' => $this->autorizacao,
            'adquirente' => $this->adquirente,
            'codigoRespostaAdquirente' => $this->codigoRespostaAdquirente,
            'mensagemRespostaAdquirente' => $this->mensagemRespostaAdquirente,
            'dataAdquirente' => $this->dataAdquirente,
            'respostaAdquirente' => $this->respostaAdquirente,
            'comprovanteAdquirente' => $this->comprovanteAdquirente
        ];
    }


}