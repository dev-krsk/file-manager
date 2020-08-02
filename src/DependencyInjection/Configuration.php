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
                        ->defaultValue('default')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->scalarNode('directory_class')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->scalarNode('file_class')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                ->end();
        return $treeBuilder;
    }
}