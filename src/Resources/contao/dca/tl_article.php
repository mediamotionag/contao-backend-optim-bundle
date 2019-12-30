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
if (isset($objUser) && $objUser->isAdmin) {
	
	# Show Article-ID
	$GLOBALS['TL_DCA']['tl_article']['list']['label']['fields'][] = 'id'; 
	$GLOBALS['TL_DCA']['tl_article']['list']['label']['format'] = '%s <span style="color: #fd9828; padding-left: 3px;">(<span style="color: #b7b7b7;">%s</span>, ID: %s)</span>';
	
}