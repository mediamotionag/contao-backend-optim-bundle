<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   BackendOptimBundle
 * @author    Rory Zünd, Media Motion AG
 */

/**
 * Allow HTML in Headlines (to add linebreakts)
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['headline']['eval']['allowHtml'] = true;
$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['allowHtml'] = true;

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
