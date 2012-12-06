<?php

/*
* This file is part of CKEditortBundle
* (c) 2011-2012 Mbechezi Mlanawo
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/


namespace Ikimea\CKEditorBundle\Tests\Form\Type;

use Symfony\Component\Form\Tests\Extension\Core\Type\TypeTestCase;
use  Ikimea\CKEditorBundle\Tests\TestKernel;
use Ikimea\CKEditorBundle\Form\Type\CKEditorType;

/**
 * CKEditor type test
 *
 *  @author Mlanawo Mbechezi <mlanawo.mbechezi.com>
 */
class CKEditorTypeTest extends TypeTestCase
{
    /**
     * @override
     */
    protected function setUp()
    {
        parent::setUp();

        $this->container = $container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerBuilder')->disableOriginalConstructor()->getMock();
        $this->factory->addType(new CKEditorType($this->container));
    }

    /**
     * Checks the default required property
     */
    public function testDefaultRequired()
    {
        $form = $this->factory->create('ckeditor');
        $view = $form->createView();
        $required = $view->vars['required'];

        $this->assertFalse($required);
    }

    /**
     * Checks the required property
     *
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testRequired()
    {
        $this->factory->create('ckeditor', null, array('required' => true));
    }

    /**
     * Checks the default toolbar property
     */
    public function testDefaultToolbar()
    {
        $form = $this->factory->create('ckeditor');
        $view = $form->createView();
        $toolbar = $view->vars['toolbar'];

        $this->assertEquals($toolbar, array(
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
        );
    }

    /**
     * Checks the toolbar property
     */
    public function testToolbar()
    {
        $form = $this->factory->create('ckeditor', null, array('toolbar' => array(
            array(
                'name' => 'name',
                'items' => array('Item1', 'Item2')
            ))));
        $view = $form->createView();
        $toolbar = $view->vars['toolbar'];

        $this->assertEquals($toolbar, array(
            array(
                'name' => 'name',
                'items' => array('Item1', 'Item2')
            ))
        );
    }

}