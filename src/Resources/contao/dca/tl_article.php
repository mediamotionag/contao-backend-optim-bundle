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
use Contao\BackendUser;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
    if($objUser = BackendUser::getInstance()){
        if(isset($objUser->admin) && $objUser->admin == 1){
            if(strpos($_SERVER['REQUEST_URI'],'table=') === false) {
                $GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'] = array('title', 'inColumn', 'id');
                $GLOBALS['TL_DCA']['tl_article']['list']['label']['format'] = '%s <span style="color: #fd9828; padding-left: 3px;"><span style="color: #b7b7b7;">%s</span> (ID: %s)</span>';
            }
        }
    }
}
