<?php

namespace BrzCepModule\Factory;

use BrzCepModule\Adapter\PostmonAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostmonAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        /** @var \Zend\Http\Client $httpClient */
        $httpClient       = $serviceLocator->get('BrzCepModule\Http\Client');

        /** @var \BrzCepModule\Response\EnderecoResponse $enderecoResponse */
        $enderecoResponse = $serviceLocator->get('BrzCepModule\Response\EnderecoResponse');

        $adapter          = new PostmonAdapter($httpClient, $enderecoResponse);
        return $adapter;
    }

}