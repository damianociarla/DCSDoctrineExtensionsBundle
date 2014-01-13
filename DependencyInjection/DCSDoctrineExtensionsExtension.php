<?php

namespace DCS\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class DoctrineDoctrineExtensionExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Translatable
        $container->setParameter('dcs_doctrine_extensions.translatable.translation_fallback', $config['translatable']['translation_fallback']);
        $container->setParameter('dcs_doctrine_extensions.translatable.persist_default_locale_translation', $config['translatable']['persist_default_locale_translation']);
        $container->setParameter('dcs_doctrine_extensions.translatable.skip_on_load', $config['translatable']['skip_on_load']);

        // Uploadable
        $container->setParameter('dcs_doctrine_extensions.uploadable.default_path', $config['uploadable']['default_path']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('listener.xml');
    }
}
