<?php

namespace Barcha17\Module\ModuleTest\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class ConfigurationSchema implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('report-maker');

        $rootNode = $treeBuilder->getRootNode();
        $treeBuilder->getRootNode()
            ->fixXmlConfig('storage')
            ->children()
                ->scalarNode('storageDir')->isRequired()->end()
            ->end();
        return $treeBuilder;
    }
}
