<?php

namespace BrzCepModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use BrzCepModule\Adapter\ViaCepAdapter;

class ViaCepAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('BrzCepModule\Http\Client');

        /** @var \BrzCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('BrzCepModule\Response\EnderecoResponse');

        $adapter          = new ViaCepAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}