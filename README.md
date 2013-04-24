# This project is no longer maintained by Ikimea
Use [IvoryCKEditorBundle](https://github.com/egeloen/IvoryCKEditorBundle) instead
-------------------------------------------------------------------

##Ckeditor

CKEditor est un éditeur de texte pour être utilisé dans les pages Web. Il s'agit d'un éditeur WYSIWYG, ce qui signifie que le texte en cours d'édition sur il semble aussi semblables que possible aux utilisateurs résultats ont quand le publier. Il apporte les fonctionnalités d'édition web communes trouvées sur les applications de bureau d'édition telles que Microsoft Word et OpenOffice.



Features
=================

* Symfony2 integration


Installation with Symfony 2.1 and composer
==========================================

Just add the following line to your projects composer.json require section:

```
"ikimea/ckeditor-bundle": "dev-master"
```

Enable the module
=================


``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        new Ikimea\CKEditorBundle\CKEditorBundle(),
        // ...
    );
}
```

``` bash
$ ./app/console assets:install web --symlink
```


Configuration
=============

Simply configure as many paths as needed with the given parameters:



``` yaml
# app/config.yml
ikimea_ck_editor:
    lang : fr
    src : /bundles/ikimeackeditor/js/ckeditor/
    skin: moono
    toolbar:
      - ['Format']
      - ['Bold','Italic']
      - ['Outdent','Indent','Blockquote']
      - ['NumberedList','BulletedList']
      - ['-','Link','Unlink','Anchor','-','Table']
      - ['Maximize','Source']

```

Usage
=============


```php
/** @var $builder FormBuilderInterface */
$builder
    ->add('content', 'ckeditor')
```
