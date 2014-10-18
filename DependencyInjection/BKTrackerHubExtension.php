<?php

namespace BK\TrackerHubBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class BKTrackerHubExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Clients
        if (isset($config['clients']) && is_array($config['clients'])) {

            foreach ($config['clients'] as $type => $params) {
                $definitionDecorator = new DefinitionDecorator('bk_tracker_hub.client.' . $type . '.def');
                $definitionDecorator->addTag('bk_tracker_hub.client');

                foreach (array_values($params) as $argument) {
                    $definitionDecorator->addArgument($argument);
                }

                $container->setDefinition('bk_tracker_hub.client.' . $type, $definitionDecorator);
            }
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('clients.yml');
    }
}
