<?php

/*
 * This file is part of CKeditorBundle
 * (c) 2011 Mbechezi Mlanawo
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ikimea\CKEditorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\DependencyInjection\Configuration\NodeInterface
     */

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('ikimea_ck_editor')
            ->children()
                ->scalarNode('lang')->end()
                ->scalarNode('skin')->defaultValue('kama')->cannotBeEmpty()->end()
				->scalarNode('toolbar')->end()
				->scalarNode('src')->end()
                ->end();
        return $treeBuilder;
    }

}