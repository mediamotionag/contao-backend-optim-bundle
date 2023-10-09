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
use Contao\Backend;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
    if(strpos($_SERVER['REQUEST_URI'],'table=tl_module') !== false) {
        $GLOBALS['TL_DCA']['tl_module']['list']['sorting']['child_record_callback'] = array('tl_module_ids', 'listModule');
    }
}

/**
 * Class tl_module_ids
 * Definition der Callback-Funktionen
 */
class tl_module_ids extends Backend {

    /**
    * Import the back end user object
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * List a front end module
    * @param array
    * @return string
    */
    public function listModule($row)
    {
        return $row['name'] .' <span class="label-info">['.($GLOBALS['TL_LANG']['FMD'][$row['type']][0] ?? $row['type']) .'] </span><span style="color:#fd9828;">(ID: ' .$row['id']. ")</span>";
    }

}
