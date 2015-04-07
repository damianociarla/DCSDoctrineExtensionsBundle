<?php

namespace DCS\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public static $classes = array(
        'blameable'         => 'Gedmo\Blameable\BlameableListener',
        'ip_traceable'      => 'Gedmo\IpTraceable\IpTraceableListener',
        'loggable'          => 'Gedmo\Loggable\LoggableListener',
        'sluggable'         => 'Gedmo\Sluggable\SluggableListener',
        'soft_deleteable'   => 'Gedmo\SoftDeleteable\SoftDeleteableListener',
        'sortable'          => 'Gedmo\Sortable\SortableListener',
        'timestampable'     => 'Gedmo\Timestampable\TimestampableListener',
        'translatable'      => 'Gedmo\Translatable\TranslatableListener',
        'tree'              => 'Gedmo\Tree\TreeListener',
        'uploadable'        => 'Gedmo\Uploadable\UploadableListener',
    );

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dcs_doctrine_extensions');

        $rootNode
            ->append($this->baseCheckerConfigurationNode('blameable'))
            ->append($this->baseCheckerConfigurationNode('ip_traceable'))
            ->append($this->baseCheckerConfigurationNode('loggable'))
            ->append($this->baseCheckerConfigurationNode('sluggable'))
            ->append($this->baseCheckerConfigurationNode('soft_deleteable'))
            ->append($this->baseCheckerConfigurationNode('sortable'))
            ->append($this->baseCheckerConfigurationNode('timestampable'))
            ->append($this->baseCheckerConfigurationNode('tree'))
            ->append($this->translatableConfigurationNode())
            ->append($this->uploadableConfigurationNode())
        ;

        return $treeBuilder;
    }

    private function baseCheckerConfigurationNode($nodeName)
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root($nodeName);

        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('enabled')
                    ->defaultFalse()
                ->end()
                ->scalarNode('class')
                    ->cannotBeEmpty()
                    ->defaultValue(self::$classes[$nodeName])
                ->end()
            ->end()
        ;

        return $node;
    }

    private function translatableConfigurationNode()
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root('translatable');

        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('enabled')
                    ->defaultFalse()
                ->end()
                ->scalarNode('class')
                    ->cannotBeEmpty()
                    ->defaultValue(self::$classes['translatable'])
                ->end()
                ->booleanNode('default_locale')
                    ->cannotBeEmpty()
                ->end()
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
                ->booleanNode('enabled')
                    ->defaultFalse()
                ->end()
                ->scalarNode('class')
                    ->cannotBeEmpty()
                    ->defaultValue(self::$classes['uploadable'])
                ->end()
                ->scalarNode('default_path')
                    ->defaultValue(realpath('.').'/upload')
                ->end()
                ->scalarNode('mime_type_guesser_class')
                    ->defaultValue('DCS\DoctrineExtensionsBundle\Manager\Uploadable\MimeTypeGuesser')
                ->end()
            ->end()
        ;

        return $node;
    }
}
