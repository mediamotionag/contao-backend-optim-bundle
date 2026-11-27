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

use Contao\CoreBundle\DataContainer\RecordLabel;
use Contao\DataContainer;
use Contao\StringUtil;

if (class_exists('\Terminal42\NodeBundle\EventListener\DataContainerListener')) {
    class NodeDataContainerListener extends \Terminal42\NodeBundle\EventListener\DataContainerListener { }
} else {
    class NodeDataContainerListener { }
}

class DataContainerListener extends NodeDataContainerListener
{
    /**
     * The node bundle returns an HTML string (Contao 5) or a RecordLabel (Contao 6); the ID is appended to either.
     */
    public function onCustomLabelCallback(array $row, string $label, ?DataContainer $dc = null, string $imageAttribute = '', bool $returnImage = false): string|object
    {
        $original = parent::onLabelCallback($row, $label, $dc, $imageAttribute, $returnImage);
        $suffix = ' <span style="color:#fd9828;">(ID: ' . (int) $row['id'] . ')</span>';

        if ($original instanceof RecordLabel) {
            return RecordLabel::fromHtml(($original->htmlLabel ?? StringUtil::specialchars($original->label)) . $suffix);
        }

        // Contao 6 escapes a plain string label; RecordLabel does not exist on 5.7.
        return class_exists(RecordLabel::class) ? RecordLabel::fromHtml($original . $suffix) : $original . $suffix;
    }
}
