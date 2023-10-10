<?php

use Contao\Backend;
use Contao\PageModel;

$GLOBALS['TL_DCA']['tl_layout']['list']['sorting']['child_record_callback'] = array('tl_layout_ids', 'listLayout');

class tl_layout_ids extends Backend
{

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
    public function listLayout($row)
    {
        // Default Label
        $strLabel = $row['name'];

        // Get all pages
        $colPages = PageModel::findAll();

        if(!$colPages){
            return $strLabel;
        }

        // Counter
        $intCounter = 0;

        // Loop pages, load details and count layout usage
        foreach($colPages as $objPage){

            // Load details
            $objPage->loadDetails();

            // Check if layout is used
            if($objPage->layout == $row['id']){
                $intCounter++;
            }
        }

        // Get all pages, that use this layout
        if($intCounter > 0){
            $strLabel .= ' <span class="label-info">[' . $intCounter . " mal verwendet]</span>";
        } else {
            $strLabel .= ' <span class="label-info">[nicht verwendet]</span>';
        }

        return $strLabel;
    }

}
