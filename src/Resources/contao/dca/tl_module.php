<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   BackendOptimBundle
 * @author    Rory Zünd, Media Motion AG
 */

use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\System;
use Symfony\Component\Security\Core\Security;

if (System::getContainer()->get('contao.security.token_checker')->hasBackendUser()) {
    $security = System::getContainer()->get('security.helper');
    if ($security->isGranted('ROLE_ADMIN')) {
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
        return '<div style="float:left;">'. $row['name'] .' <span style="color:#b7b7b7; padding-left:3px;">['.$GLOBALS['TL_LANG']['FMD'][$row['type']][0] .'] </span><span style="color:#fd9828;">(ID:' .$row['id']. ")</span></div>\n";
    }

}
