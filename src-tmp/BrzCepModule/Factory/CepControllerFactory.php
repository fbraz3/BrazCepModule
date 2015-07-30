<?php

namespace BrzCepModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Http\Response;
use BrzCepModule\Controller\CepController;
use BrzCepModule\Service\CepService;

class CepControllerFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator){
        $serviceManager = $serviceLocator->getServiceLocator();

        /** @var CepService $cepService */
        $cepService = $serviceManager->get('BrzCepModule\Service\CepService');

        /** @var Response $reponse */
        $response = $serviceManager->get('BrzCepModule\Http\Response');
        $controller = new CepController($cepService,$response);
        return $controller;
    }

}