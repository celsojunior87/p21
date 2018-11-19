<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cartorio
 *
 * @ORM\Table(name="cartorio")
 *
 *
 * @ORM\Entity
 *
 * @ORM\Entity(repositoryClass="Application\Entity\CartorioRepository")
 */
class Cartorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcartorio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcartorio;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=45, nullable=false)
     */
    private $bairro;

    /**
     * @var integer
     *
     * @ORM\Column(name="cep", type="integer", nullable=false)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=45, nullable=false)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=45, nullable=false)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="flg_situacao", type="string", length=45, nullable=false)
     */
    private $flgSituacao;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_tabeliao", type="string", length=45, nullable=false)
     */
    private $nomeTabeliao;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=45, nullable=false)
     */
    private $razaoSocial;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefone", type="integer", nullable=false)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_documento", type="string", length=45, nullable=false)
     */
    private $tipoDocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=45, nullable=false)
     */
    private $uf;



    /**
     * Get idcartorio
     *
     * @return integer
     */
    public function getIdcartorio()
    {
        return $this->idcartorio;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Cartorio
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set cep
     *
     * @param integer $cep
     *
     * @return Cartorio
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return integer
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Cartorio
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cartorio
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Cartorio
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set flgSituacao
     *
     * @param string $flgSituacao
     *
     * @return Cartorio
     */
    public function setFlgSituacao($flgSituacao)
    {
        $this->flgSituacao = $flgSituacao;

        return $this;
    }

    /**
     * Get flgSituacao
     *
     * @return string
     */
    public function getFlgSituacao()
    {
        return $this->flgSituacao;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Cartorio
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set nomeTabeliao
     *
     * @param string $nomeTabeliao
     *
     * @return Cartorio
     */
    public function setNomeTabeliao($nomeTabeliao)
    {
        $this->nomeTabeliao = $nomeTabeliao;

        return $this;
    }

    /**
     * Get nomeTabeliao
     *
     * @return string
     */
    public function getNomeTabeliao()
    {
        return $this->nomeTabeliao;
    }

    /**
     * Set razaoSocial
     *
     * @param string $razaoSocial
     *
     * @return Cartorio
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get razaoSocial
     *
     * @return string
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set telefone
     *
     * @param integer $telefone
     *
     * @return Cartorio
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return integer
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     *
     * @return Cartorio
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return Cartorio
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }
}
