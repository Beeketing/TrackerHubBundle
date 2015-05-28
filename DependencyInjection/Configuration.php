<?php

namespace BK\TrackerHubBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bk_tracker_hub');

        // Add clients configuration
        $this->addClientsConfiguration($rootNode);

        return $treeBuilder;
    }

    private function addClientsConfiguration(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('clients')
                    ->children()

                        // Beeketing
                        ->arrayNode('beeketing')
                            ->children()
                                ->scalarNode('api_key')->end()
                                ->scalarNode('base_url')->end()
                            ->end()
                        ->end()

                        // Customer.io
                        ->arrayNode('customerio')
                            ->children()
                                ->scalarNode('site_id')->end()
                                ->scalarNode('api_key')->end()
                            ->end()
                        ->end()

                        // Mixpanel
                        ->arrayNode('mixpanel')
                            ->children()
                                ->scalarNode('write_token')->end()
                            ->end()
                        ->end()

                        // Mixpanel
                        ->arrayNode('indicative')
                            ->children()
                                ->scalarNode('api_key')->end()
                            ->end()
                        ->end()

                    ->end()
                ->end()
            ->end()
        ;
    }
}
