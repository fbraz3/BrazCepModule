<?php

namespace InfanaticaCepModule\Service;
use InfanaticaCepModule\Adapter\CepAdapterInterface;
use InfanaticaCepModule\Exception\EnderecoFormatException;
use InfanaticaCepModule\Exception\EnderecoResponseException;
use InfanaticaCepModule\Response\EnderecoResponseInterface;
use Doctrine\ORM\EntityManager;
use InfanaticaCepModule\Entity\Cepcache;

class CepService {

    /** @var  CepAdapterInterface */
    protected $cepAdapter;
    private $conn;

    public function __construct(CepAdapterInterface $cepAdapter)
    {
        $this->cepAdapter = $cepAdapter;
    }

    public function getEnderecoByCep($cep, $format=null)
    {
        $cache = $this->getFromCache($cep);
        if($cache) return $this->formatEndereco($this->cepAdapter->getEnderecoResponse(), $format);

        $cep = $this->removeNaoDigitos($cep);
        $endereco = $this->cepAdapter->getEnderecoByCep($cep);

        if (! $endereco instanceof EnderecoResponseInterface){
            throw new EnderecoResponseException();
        }

        $this->setCache($cep, $endereco->toArray());
        return $this->formatEndereco($endereco, $format);
    }

    private function getFromCache($cep){
        if(!$this->getConn() instanceof EntityManager) return false;

        try {
            $res = $this->getConn()->getRepository('InfanaticaCepModule\Entity\Cepcache')->findOneBy(array('cep' => $cep));
        }catch(\Exception $e){
            return false;
        }

        if(!$res instanceof Cepcache) return false;

        $this->cepAdapter->getEnderecoResponse()->setLogradouro($res->getLogradouro());
        $this->cepAdapter->getEnderecoResponse()->setBairro($res->getBairro());
        $this->cepAdapter->getEnderecoResponse()->setLocalidade($res->getLocalidade());
        $this->cepAdapter->getEnderecoResponse()->setUf($res->getUf());
        return true;
    }

    private function setCache($cep, $data){
        if(!$this->getConn() instanceof EntityManager) return false;

        try{
            $repo = new Cepcache();
            $repo->setCep($cep);
            $repo->setBairro($data['bairro']);
            $repo->setLocalidade($data['localidade']);
            $repo->setLogradouro($data['logradouro']);
            $repo->setUf($data['uf']);

            $this->getConn()->persist($repo);
            $this->getConn()->flush();
        }catch(\Exception $e){
            return false;
        }
        return true;
    }

    protected function formatEndereco($endereco, $format)
    {
        if( is_null($format) )
        {
            return $endereco->toJson();
        }

        $nomeDoMetodo = 'to'.ucfirst($format);
        if(! method_exists($endereco,$nomeDoMetodo))
        {
            throw new EnderecoFormatException();
        }

        return $endereco->$nomeDoMetodo();
    }

    protected function removeNaoDigitos($string)
    {
        return preg_replace('/[^0-9]/', '', $string);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $conn
     */
    public function setConn(\Doctrine\ORM\EntityManager $conn)
    {
        $this->conn = $conn;
    }


}