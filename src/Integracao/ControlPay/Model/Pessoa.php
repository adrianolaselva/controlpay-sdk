<?php

namespace Integracao\ControlPay\Model;
use Integracao\ControlPay\Helpers\SerializerHelper;

/**
 * Class Pessoa
 * @package Integracao\ControlPay\Model
 */
class Pessoa implements \JsonSerializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Pessoa
     */
    private $pessoaProprietario;

    /**
     * @var PessoaStatus
     */
    private $pessoaStatus;

    /**
     * @var boolean
     */
    private $pessoaJuridica;

    /**
     * @var string
     */
    private $nomeRazaoSocial;

    /**
     * @var string
     */
    private $sobrenomeNomeFantasia;

    /**
     * @var string
     */
    private $foto;

    /**
     * @var string
     */
    private $fotoUrl;

    /**
     * @var string
     */
    private $cpfCnpj;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var string
     */
    private $telefone1;

    /**
     * @var string
     */
    private $telefone2;

    /**
     * @var string
     */
    private $referenciaCliente;

    /**
     * @var boolean
     */
    private $master;

    /**
     * @var string
     */
    private $key;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var \DateTime
     */
    private $dataLogin;

    /**
     * @var \DateTime
     */
    private $dataLoginAnterior;

    /**
     * @var \DateTime
     */
    private $dataLogout;

    /**
     * @var \DateTime
     */
    private $dataAcesso;

    /**
     * @var \DateTime
     */
    private $dataCheckIn;

    /**
     * @var array
     */
    private $endereco;

    /**
     * Pessoa constructor.
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
     * @return Pessoa
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getPessoaProprietario()
    {
        return $this->pessoaProprietario;
    }

    /**
     * @param Pessoa $pessoaProprietario
     * @return Pessoa
     */
    public function setPessoaProprietario($pessoaProprietario)
    {
        $this->pessoaProprietario = $pessoaProprietario;
        return $this;
    }

    /**
     * @return array
     */
    public function getPessoasDoProprietario()
    {
        return $this->pessoasDoProprietario;
    }

    /**
     * @param array $pessoasDoProprietario
     * @return Pessoa
     */
    public function setPessoasDoProprietario($pessoasDoProprietario)
    {
        $this->pessoasDoProprietario = $pessoasDoProprietario;
        return $this;
    }

    /**
     * @return Pessoa
     */
    public function getPessoaCheckInVendedor()
    {
        return $this->pessoaCheckInVendedor;
    }

    /**
     * @param Pessoa $pessoaCheckInVendedor
     * @return Pessoa
     */
    public function setPessoaCheckInVendedor($pessoaCheckInVendedor)
    {
        $this->pessoaCheckInVendedor = $pessoaCheckInVendedor;
        return $this;
    }

    /**
     * @return array
     */
    public function getPessoasClientes()
    {
        return $this->pessoasClientes;
    }

    /**
     * @param array $pessoasClientes
     * @return Pessoa
     */
    public function setPessoasClientes($pessoasClientes)
    {
        $this->pessoasClientes = $pessoasClientes;
        return $this;
    }

    /**
     * @return PessoaStatus
     */
    public function getPessoaStatus()
    {
        return $this->pessoaStatus;
    }

    /**
     * @param PessoaStatus $pessoaStatus
     * @return Pessoa
     */
    public function setPessoaStatus($pessoaStatus)
    {
        $this->pessoaStatus = $pessoaStatus;

        if(is_array($this->pessoaStatus))
            $this->pessoaStatus = SerializerHelper::denormalize($this->pessoaStatus, PessoaStatus::class);

        return $this;
    }

    /**
     * @return boolean
     */
    public function isPessoaJuridica()
    {
        return $this->pessoaJuridica;
    }

    /**
     * @param boolean $pessoaJuridica
     * @return Pessoa
     */
    public function setPessoaJuridica($pessoaJuridica)
    {
        $this->pessoaJuridica = $pessoaJuridica;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeRazaoSocial()
    {
        return $this->nomeRazaoSocial;
    }

    /**
     * @param string $nomeRazaoSocial
     * @return Pessoa
     */
    public function setNomeRazaoSocial($nomeRazaoSocial)
    {
        $this->nomeRazaoSocial = $nomeRazaoSocial;
        return $this;
    }

    /**
     * @return string
     */
    public function getSobrenomeNomeFantasia()
    {
        return $this->sobrenomeNomeFantasia;
    }

    /**
     * @param string $sobrenomeNomeFantasia
     * @return Pessoa
     */
    public function setSobrenomeNomeFantasia($sobrenomeNomeFantasia)
    {
        $this->sobrenomeNomeFantasia = $sobrenomeNomeFantasia;
        return $this;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     * @return Pessoa
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    /**
     * @return string
     */
    public function getFotoUrl()
    {
        return $this->fotoUrl;
    }

    /**
     * @param string $fotoUrl
     * @return Pessoa
     */
    public function setFotoUrl($fotoUrl)
    {
        $this->fotoUrl = $fotoUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     * @return Pessoa
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Pessoa
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Pessoa
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone1()
    {
        return $this->telefone1;
    }

    /**
     * @param string $telefone1
     * @return Pessoa
     */
    public function setTelefone1($telefone1)
    {
        $this->telefone1 = $telefone1;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone2()
    {
        return $this->telefone2;
    }

    /**
     * @param string $telefone2
     * @return Pessoa
     */
    public function setTelefone2($telefone2)
    {
        $this->telefone2 = $telefone2;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenciaCliente()
    {
        return $this->referenciaCliente;
    }

    /**
     * @param string $referenciaCliente
     * @return Pessoa
     */
    public function setReferenciaCliente($referenciaCliente)
    {
        $this->referenciaCliente = $referenciaCliente;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isMaster()
    {
        return $this->master;
    }

    /**
     * @param boolean $master
     * @return Pessoa
     */
    public function setMaster($master)
    {
        $this->master = $master;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Pessoa
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Pessoa
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Pessoa
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return Pessoa
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     * @return Pessoa
     */
    public function setData($data)
    {
        $this->data = \DateTime::createFromFormat('d/m/Y H:i:s.u', $data);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataLogin()
    {
        return $this->dataLogin;
    }

    /**
     * @param \DateTime $dataLogin
     * @return Pessoa
     */
    public function setDataLogin($dataLogin)
    {
        $this->dataLogin = \DateTime::createFromFormat('d/m/Y H:i:s.u', $dataLogin);
       return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataLoginAnterior()
    {
        return $this->dataLoginAnterior;
    }

    /**
     * @param \DateTime $dataLoginAnterior
     * @return Pessoa
     */
    public function setDataLoginAnterior($dataLoginAnterior)
    {
        $this->dataLoginAnterior = \DateTime::createFromFormat('d/m/Y H:i:s.u', $dataLoginAnterior);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataLogout()
    {
        return $this->dataLogout;
    }

    /**
     * @param \DateTime $dataLogout
     * @return Pessoa
     */
    public function setDataLogout($dataLogout)
    {
        $this->dataLogout = \DateTime::createFromFormat('d/m/Y H:i:s.u', $dataLogout);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataAcesso()
    {
        return $this->dataAcesso;
    }

    /**
     * @param \DateTime $dataAcesso
     * @return Pessoa
     */
    public function setDataAcesso($dataAcesso)
    {
        $this->dataAcesso = \DateTime::createFromFormat('d/m/Y H:i:s.u', $dataAcesso);
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCheckIn()
    {
        return $this->dataCheckIn;
    }

    /**
     * @param \DateTime $dataCheckIn
     * @return Pessoa
     */
    public function setDataCheckIn($dataCheckIn)
    {
        $this->dataCheckIn = \DateTime::createFromFormat('d/m/Y H:i:s.u', $dataCheckIn);
        return $this;
    }

    /**
     * @return array
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param array $endereco
     * @return Pessoa
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'cpfCnpj' => $this->cpfCnpj,
            'data' => $this->data,
            'dataAcesso' => $this->dataAcesso,
            'dataCheckIn' => $this->dataCheckIn,
            'dataLogin' => $this->dataLogin,
            'dataLoginAnterior' => $this->dataLoginAnterior,
            'dataLogout' => $this->dataLogout,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'foto' => $this->foto,
            'fotoUrl' => $this->fotoUrl,
            'ip' => $this->ip,
            'key' => $this->key,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'nomeRazaoSocial' => $this->nomeRazaoSocial,
            'sobrenomeNomeFantasia' => $this->sobrenomeNomeFantasia,
            'telefone1' => $this->telefone1,
            'telefone2' => $this->telefone2,
            'senha' => $this->senha,
            'pessoaJuridica' => $this->pessoaJuridica,
            'pessoaProprietario' => $this->pessoaProprietario,
            'pessoaStatus' => $this->pessoaStatus,
        ];
    }


}