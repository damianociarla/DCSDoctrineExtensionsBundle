<?php

namespace DCS\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class DCSDoctrineExtensionsExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $configurations = array_keys(Configuration::$classes);


        foreach ($configurations as $configurationName) {
            $configuration = $config[$configurationName];

            if ($configuration['enabled']) {
                foreach ($configuration as $key => $value) {
                    if ($key == 'enabled') continue;
                    $container->setParameter('dcs_doctrine_extensions.'.$configurationName.'.'.$key, $value);
                }
                $loader->load(sprintf('listener/%s.xml', $configurationName));
            }
        }
    }
}
