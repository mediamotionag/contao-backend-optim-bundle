<?php

declare(strict_types=1);

namespace Memo\BackendOptimBundle\EventListener;

use Contao\CoreBundle\DataContainer\RecordLabel;
use Contao\DataContainer;
use Contao\PageModel;

/**
 * Appends how many pages use a layout to its row in the layout list.
 */
class LayoutLabelListener
{
    /** @var array<int, int>|null layout id => number of pages, built once per request */
    private array|null $usage = null;

    /**
     * $label arrives already encoded (core formats and escapes the label fields).
     *
     * @param array<string, mixed> $row
     */
    public function onLabelCallback(array $row, string $label, DataContainer|null $dc = null, array $args = []): string|object
    {
        $count = $this->usage()[(int) $row['id']] ?? 0;
        $info = $count > 0 ? '[' . $count . ' mal verwendet]' : '[nicht verwendet]';
        $html = $label . ' <span class="label-info">' . $info . '</span>';

        // Contao 6 escapes a plain string label; RecordLabel does not exist on 5.7.
        return class_exists(RecordLabel::class) ? RecordLabel::fromHtml($html) : $html;
    }

    /** @return array<int, int> */
    private function usage(): array
    {
        if (null !== $this->usage) {
            return $this->usage;
        }

        $this->usage = [];

        foreach (PageModel::findAll() ?? [] as $page) {
            // loadDetails() resolves the layout a page inherits from its parents
            $page->loadDetails();

            if ($page->layout) {
                $this->usage[(int) $page->layout] = ($this->usage[(int) $page->layout] ?? 0) + 1;
            }
        }

        return $this->usage;
    }
}
