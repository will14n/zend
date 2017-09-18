<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\IndexController;
// use Doctrine\ORM\EntityManager;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class DoctrineControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, Array $options = null) {    
        $entityManager = $serviceLocator->get('doctrine.entity_manager.orm_default');
        return new IndexController($entityManager);
    }
}