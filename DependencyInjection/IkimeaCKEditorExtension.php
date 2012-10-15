<?php

/*
 * This file is part of CKeditorBundle
 * (c) 2011 Mbechezi Mlanawo
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ikimea\CKEditorBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;


class IkimeaCKEditorExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach($config as $key => $param) {
            $container->setParameter('ikimea_ck_editor.'.$key, $param);
        }

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('twig.form.resources', array_merge(
            $container->getParameter('twig.form.resources'), array('IkimeaCKEditorBundle:Form:ckeditor_widget.html.twig')
        ));



    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'ikimea_ck_editor';
    }

}
