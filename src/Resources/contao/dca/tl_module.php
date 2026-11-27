<?php

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
    if (strpos($_SERVER['REQUEST_URI'], 'table=tl_module') !== false) {
        // Core escapes every label field; the format may carry markup on 5.7 and 6.
        $GLOBALS['TL_DCA']['tl_module']['list']['label']['fields'] = ['name', 'type', 'id'];
        $GLOBALS['TL_DCA']['tl_module']['list']['label']['format'] = '%s <span class="label-info">[%s]</span> <span style="color:#fd9828;">(ID: %s)</span>';
    }
}

$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['allowHtml'] = true;
