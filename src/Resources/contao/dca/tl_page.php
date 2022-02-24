<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   BackendOptimBundle
 * @author    Rory Zünd, Media Motion AG
 */
 
$objUser = \BackendUser::getInstance();
if (BE_USER_LOGGED_IN && $objUser->isAdmin) {
	
	# Show Page-ID
	$GLOBALS['TL_DCA']['tl_page']['list']['label']['fields'][] = 'id';
	$GLOBALS['TL_DCA']['tl_page']['list']['label']['format'] = '%s <span style="color: #fd9828; padding-left: 3px;">(ID: %s)</span>';
	
}
