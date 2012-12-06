<?php

/*
* This file is part of CKEditortBundle
* (c) 2011-2012 Mbechezi Mlanawo
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

/**
 *
 * @author Mlanawo Mbechezi <mlanawo.mbechezi.com>
 */
class IkimeaCKEditorExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config as $key => $param) {
            $container->setParameter('ikimea_ck_editor.'.$key, $param);
        }

        if (!empty($configs[0]['toolbar'])) {
            $container->setParameter('ikimea_ck_editor.toolbar', $this->parseToolbarConfig($configs[0]['toolbar']));
        } else {
            $container->setParameter('ikimea_ck_editor.toolbar', array());
        }

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('twig.form.resources', array_merge(
            $container->getParameter('twig.form.resources'),
            array('IkimeaCKEditorBundle:Form:ckeditor_widget.html.twig')
        ));
    }

    /**
     * @param array $toolbar
     */
    public function parseToolbarConfig(array $toolbar)
    {
        $config = array();
        foreach ($toolbar as $value) {
            $config[]['items'] = $value;
        }
       return $config;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'ikimea_ck_editor';
    }

}
