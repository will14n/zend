<?php

use ContainerInteropDoctrine\EntityManagerFactory;

return [
    'dependencies' => [
        'factories' => [
            'doctrine.entity_manager.orm_default' => EntityManagerFactory::class,
        ],
    ],

    /**
     * For full configuration options, see
     * https://github.com/DASPRiD/container-interop-doctrine/blob/master/example/full-config.php
     */
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'url' => 'mysql://blog:silveira@localhost/blog',
                ],
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
                'drivers' => [
                    'App\Entity' => 'blog',
                ],
            ],
            'blog' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => 'src/App/Entity/',
            ],
        ],
    ],
];