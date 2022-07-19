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

        # Only for article-listing
        if(strpos($_SERVER['REQUEST_URI'],'table=') === false) {

            # Show Article-ID
            $GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'] = array('title', 'inColumn', 'id');
            $GLOBALS['TL_DCA']['tl_article']['list']['label']['format'] = '%s <span style="color: #fd9828; padding-left: 3px;"><span style="color: #b7b7b7;">%s</span> (ID: %s)</span>';
        }

    }
}
