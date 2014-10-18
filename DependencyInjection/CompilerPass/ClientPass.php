<?php
/**
 * Copyright Brodev Software.
 * (c) Quan MT <quanmt@brodev.com>
 */


namespace BK\TrackerHubBundle\DependencyInjection\CompilerPass;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ClientPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        // Find client
        $definitions = $container->findTaggedServiceIds('bk_tracker_hub.client');

        foreach ($definitions as $serviceId => $arguments) {
            $container->getDefinition('tracker_hub')
                ->addMethodCall('addClient', [new Reference($serviceId)]);
        }

    }
}