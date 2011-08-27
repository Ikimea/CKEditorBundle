<?php 


/*
* This file is part of CKeditorBundle
* (c) 2011 Mbechezi Mlanawo
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/


namespace IkimeaCKEditorBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

class IkimeaCKEditorExtension {

    public function getFunctions() {
        return array(
            'ckeditor_init' => new \Twig_Function_Method($this, 'ckeditor_init', array('is_safe' => array('html')))
        );
    }

    /**
     * TinyMce initializations
     */
    public function ckeditor_init() {
        //$assets = $this->getContainer()->get('templating.helper.assets');
        return ($this->getContainer()->get('templating')->render('IkimeaCkeditorBundle:Script:init.html.twig', array(
                    'ckeditor_config_json' => json_encode($this->getContainer()->getParameter('ikimea_ckeditor.config'))
        )));
    }
    public function getName(){
        return 'ikimea_ckeditor';
    }
}