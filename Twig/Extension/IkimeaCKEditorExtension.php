<?php

/*
 * This file is part of CKeditorBundle
 * (c) 2011 Mbechezi Mlanawo
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ikimea\CKEditorBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

class IkimeaCKEditorExtension extends \Twig_Extension {

    private $container;

    public function getFunctions() {
        return array(
            'ckeditor_init' => new \Twig_Function_Method($this, 'ckeditor_init', array('is_safe' => array('html')))
        );
    }

    /**
     * Container
     *
     * @var ContainerInterface


      /**
     * Initialize CKEditor helper
     *
     * @param ContainerInterface $container
     */
    public function __construct($container) {

        $this->container = $container;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer() {
        return $this->container;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function ckeditor_init() {

        //$assets = $this->getContainer()->get('templating.helper.assets');
        return ($this->getContainer()->get('templating')->render('IkimeaCKEditorBundle:Script:init.html.twig'));
    }

    public function getName() {
        return 'ikimea_ckeditor';
    }

}