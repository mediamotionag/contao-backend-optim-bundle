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

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {

    // Define CSS File
    $strCSSFileURL = 'bundles/memobackendoptim/backend.css';
    $strCSSFilePath = 'vendor/mediamotionag/contao-backend-optim-bundle/src/Resources/public/backend.css';

    // Get File mtimestamp
    $strRootDir = System::getContainer()->getParameter('kernel.project_dir');
    $strCSSFileTimestamp = filemtime($strRootDir . '/' . $strCSSFilePath);
    $GLOBALS['TL_CSS'][] = $strCSSFileURL . '?v=' . $strCSSFileTimestamp;

}
