<?php


namespace Dev\Krsk\FileManager\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('dev_krsk_file_manager');
        $treeBuilder
            ->getRootNode()
                ->children()
                    ->scalarNode('em')
                        ->isRequired()
                    ->end()
                    ->scalarNode('directory_class')
                        ->isRequired()
                    ->end()
                    ->scalarNode('file_class')
                        ->isRequired()
                    ->end()
                ->end();
        return $treeBuilder;
    }
}