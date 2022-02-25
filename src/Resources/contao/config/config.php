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
$GLOBALS['TL_DCA']['tl_module']['fields']['headline']['eval']['allowHtml']  = true;

/**
 * Backend CSS for sticky save etc.
 */


if(TL_MODE == 'BE')
{
	
	$objUser = BackendUser::getInstance();

	if ($objUser->username != NULL)
	{
		$GLOBALS['TL_CSS'][]        = 'bundles/memobackendoptim/backend.css?v=2';
	}
}
