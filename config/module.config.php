<?php
return array(
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'brz-cep' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/cep',
                    'defaults' => array(
                        '__NAMESPACE__' => 'BrzCepModule\Controller',
                        'controller'    => 'Cep',
                        'action'        => 'index',

                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'cep-format-default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:cep]',
                            'constraints' => array(
                                'cep' => '[0-9\-]{8,9}',
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'BrzCepModule\Controller',
                                'controller'    => 'Cep',
                                'action'        => 'getEnderecoByCep',
                                'formato'        => 'json'

                            ),
                        ),
                    ),

                    'cep-format' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/:cep:/:formato',
                             'defaults' => array(
                                'action'=> 'getEnderecobyCep',
                                'formato'=>'json'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    //Doctrine ORM
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src-tmp/BrzCepModule/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'BrzCepModule\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),

    'service_manager' => array(
        'invokables' => array (
          'BrzCepModule\Http\Client' => 'Zend\Http\Client',
          'BrzCepModule\Http\Response' => 'Zend\Http\Response',
          'BrzCepModule\Response\EnderecoResponse' => 'BrzCepModule\Response\EnderecoResponse'
        ),
        'factories' => array(
            'BrzCepModule\Service\CepService' =>'BrzCepModule\Factory\CepServiceFactory',
            'BrzCepModule\Service\ViaCepAdapter' =>'BrzCepModule\Factory\ViaCepAdapterFactory',
            'BrzCepModule\Service\PostmonAdapter' =>'BrzCepModule\Factory\PostmonAdapterFactory',
            'BrzCepModule\Service\CorreioControlAdapter' =>'BrzCepModule\Factory\CorreioControlAdapterFactory',
            'BrzCepModule\Service\RepublicaVirtualAdapter' =>'BrzCepModule\Factory\RepublicaVirtualAdapterFactory',
        ),
        'aliases' => array(
            'BrzCepModule\Adapter\CepDefaultAdapter' => 'BrzCepModule\Service\ViaCepAdapter'
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'BrzCepModule\Controller\Cep' =>'BrzCepModule\Factory\CepControllerFactory'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
