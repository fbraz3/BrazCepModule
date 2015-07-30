<?php

namespace BrzCepModule\Factory;

use BrzCepModule\Adapter\CorreioControlAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CorreioControlAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('BrzCepModule\Http\Client');

        /** @var \BrzCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('BrzCepModule\Response\EnderecoResponse');

        $adapter          = new CorreioControlAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}