<?php

declare(strict_types=1);

/*
 * Node Bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2019, terminal42 gmbh
 * @author     terminal42 <https://terminal42.ch>
 * @license    MIT
 */

namespace Memo\BackendOptimBundle\EventListener;

use Contao\DataContainer;
use Terminal42\NodeBundle\EventListener\DataContainerListener as NodeDataContainerListener;

if (!class_exists('DataContainerListener')) {
class_alias(DataContainerListener::class, 'NodeDataContainerListener');
}
class DataContainerListener extends NodeDataContainerListener
{
    /**
     * On label callback.
     */
    public function onCustomLabelCallback(array $row, string $label, DataContainer $dc = null, string $imageAttribute = '', bool $returnImage = false): string
    {
        $strOriginalLabel = parent::onLabelCallback($row, $label, $dc, $imageAttribute, $returnImage);

        // Add the id to the label
        return $strOriginalLabel . ' <span style="color:#fd9828;">(ID: ' . $row['id'] . ')</span>';
    }
}
