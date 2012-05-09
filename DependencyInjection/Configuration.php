<?php

namespace Ikimea\CKEditor\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration {
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\DependencyInjection\Configuration\NodeInterface
     */
    
    public function getConfigTree()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ikimea_ck_editor', 'array');
        $rootNode
            ->children()
                ->scalarNode('config')
                    ->children()
                        ->scalarNode('lang')->cannotBeEmpty()->end()
				->scalarNode('toolbar')
                ->end();
        return $treeBuilder->buildTree();
    }
    
}