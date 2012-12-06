<?php

/*
* This file is part of CKEditortBundle
* (c) 2011-2012 Mbechezi Mlanawo
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

if (!is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
    throw new \LogicException('Could not find autoload.php in vendor/. Did you run "composer install --dev"?');
}

require $autoloadFile;