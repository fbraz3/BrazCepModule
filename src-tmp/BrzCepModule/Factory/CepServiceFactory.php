<?php

namespace BrzCepModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use BrzCepModule\Service\CepService;

class CepServiceFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){

        /** @var \BrzCepModule\Adapter\CepAdapterInterface $cepAdapter */
        $cepAdapter = $serviceLocator->get('BrzCepModule\Adapter\CepDefaultAdapter');
        $service = new CepService($cepAdapter);

        try {
            $doctrineModule = $serviceLocator->get('doctrine.entitymanager.orm_default');
            $service->setConn($doctrineModule);
        }catch(\Exception $e){}

        return $service;
    }

}