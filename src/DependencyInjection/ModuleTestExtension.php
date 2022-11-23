<?php 
namespace Barcha17\Module\ModuleTest\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Barcha17\Module\ModuleTest\DocumentRepository;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ModuleTestExtension extends Extension
{
    function load(array $configs, ContainerBuilder $container)
   { 

      $configDir = new FileLocator(__DIR__ . '/../../config');      // Load the bundle's service declarations 
      $loader = new YamlFileLoader($container, $configDir);
      $loader->load('services.yaml');      // Apply our config schema to the given app's configs
      $schema = new ConfigurationSchema();
      $options = $this->processConfiguration($schema, $configs);      // Set our own "storageDir" argument with the app's configs
      $repo = $container->getDefinition(DocumentRepository::class);
      $repo->replaceArgument(0, $options['storageDir']);
   }
}