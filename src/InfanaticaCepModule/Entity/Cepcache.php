<?php
/**
 * Created by PhpStorm.
 * User: Felipe Braz
 * Date: 28/07/2015
 * Time: 22:00
 */

namespace InfanaticaCepModule\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cepcache
 *
 * @ORM\Table(name="cepCache")
 * @ORM\Entity
 */
class Cepcache
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="logradouro", type="string", length=150, nullable=false)
     */
    private $logradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=150, nullable=false)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="localidade", type="string", length=150, nullable=false)
     */
    private $localidade;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=2, nullable=false)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=8, nullable=false)
     */
    private $cep;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param string $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return string
     */
    public function getLocalidade()
    {
        return $this->localidade;
    }

    /**
     * @param string $localidade
     */
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

    /**
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
}