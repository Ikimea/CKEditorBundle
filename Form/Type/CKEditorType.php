<?php

namespace Ikimea\CKEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;



/**
 * CKEditor type
 *
 * @inspire GeLo <geloen.eric@gmail.com>
 */
class CKEditorType extends AbstractType
{
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
    public function buildView(FormViewInterface $view, FormInterface $form, array $options)
    {
        $view
            ->setVar('toolbar', $form->getAttribute('toolbar')
        );
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
                    'name' => 'clipboard',
                    'items' => array('PasteText','PasteFromWord','-','Undo','Redo')
                ),
                array(
                    'name' => 'editing',
                    'items' => array('-','-','SpellChecker', 'Scayt')
                ),
                array(
                    'name' => 'basicstyles',
                    'items' => array('Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat')
                ),
               
                array(
                    'name' => 'paragraph',
                    'items' => array('NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-')
                ),
                '/',
                array(
                    'name' => 'links',
                    'items' => array('Link','Unlink','Anchor')
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
                    'name' => 'colors',
                    'items' => array('TextColor','BGColor')
                ),
                array(
                    'name' => 'tools',
                    'items' => array('Maximize', 'ShowBlocks', '-', 'Source')
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
