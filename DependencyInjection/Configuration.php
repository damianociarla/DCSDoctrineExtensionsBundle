<?php

namespace DCS\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dcs_doctrine_extensions');

        $rootNode
            ->append($this->translatableConfigurationNode())
            ->append($this->uploadableConfigurationNode())
        ;

        return $treeBuilder;
    }

    private function translatableConfigurationNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('translatable');

        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('translation_fallback')
                    ->defaultFalse()
                ->end()
                ->booleanNode('persist_default_locale_translation')
                    ->defaultFalse()
                ->end()
                ->booleanNode('skip_on_load')
                    ->defaultFalse()
                ->end()
            ->end()
        ;

        return $node;
    }

    private function uploadableConfigurationNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('uploadable');

        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('default_path')
                    ->defaultValue(realpath('.').'/upload')
                ->end()
            ->end()
        ;

        return $node;
    }
}
