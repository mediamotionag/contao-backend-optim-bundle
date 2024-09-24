<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   BackendOptimBundle
 * @author    Rory Zünd, Media Motion AG
 */

use Contao\System;
use Symfony\Component\HttpFoundation\Request;
use Terminal42\NodeBundle\Terminal42NodeBundle;

if (class_exists(Terminal42NodeBundle::class)) {
    $GLOBALS['TL_DCA']['tl_node']['list']['label']['label_callback'] = array('memo.backendoptim.listener.data_container', 'onCustomLabelCallback');
}
