<?php

/*
* This file is part of CKEditortBundle
* (c) 2011-2012 Mbechezi Mlanawo
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Ikimea\CKEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;



/**
 * CKEditor Form type
 *
 * @author Mlanawo Mbechezi <mlanawo.mbechezi.com>
 */
class CKEditorType extends AbstractType
{

    /**
     * @var
     */
    private $container;

    /**
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAttribute('toolbar', $options['toolbar']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['path'] =  $this->container->getParameter('ikimea_ck_editor.src');
        $view->vars['skin'] =  $this->container->getParameter('ikimea_ck_editor.skin');
        $view->vars['toolbar'] =  $form->getAttribute('toolbar');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
         $resolver->setDefaults(array(
            'required' => false,
            'toolbar' => array(
                array(
                    'items' => 'Format'
                ),
                array(
                    'name' => 'basicstyles',
                    'items' => array('Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat', '-', 'TextColor')
                ),
                array(
                    'name' => 'paragraph',
                    'items' => array('NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-')
                ),
                array(
                    'name' => 'links',
                    'items' => array('Link','Unlink')
                ),
                array(
                    'name' => 'insert',
                    'items' => array('Image','Table','HorizontalRule','SpecialChar')
                ),
                array(
                    'name' => 'styles',
                    'items' => array('Styles','Format','FontSize')
                ),
                array(
                    'name' => 'tools',
                    'items' => array('Maximize', '-', 'Source')
                )
            )
        ));

        $resolver->setAllowedValues(array(
            'required' => array(false),
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'textarea';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'ckeditor';
    }
}
