<?php

namespace BrzCepModule\Factory;

use BrzCepModule\Adapter\PostmonAdapter;
use BrzCepModule\Adapter\RepublicaVirtualAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RepublicaVirtualAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('BrzCepModule\Http\Client');

        /** @var \BrzCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('BrzCepModule\Response\EnderecoResponse');

        $adapter          = new RepublicaVirtualAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}