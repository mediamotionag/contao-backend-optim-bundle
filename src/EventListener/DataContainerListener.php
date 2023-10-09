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

use Codefog\TagsBundle\Manager\ManagerInterface;
use Contao\CoreBundle\Intl\Locales;
use Contao\DataContainer;
use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Terminal42\NodeBundle\PermissionChecker;

class DataContainerListener extends \Terminal42\NodeBundle\EventListener\DataContainerListener
{
    const BREADCRUMB_SESSION_KEY = 'tl_node_node';

    /**
     * @var Connection
     */
    private $db;

    /**
     * @var Locales
     */
    private $locales;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var PermissionChecker
     */
    private $permissionChecker;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var ManagerInterface
     */
    private $tagsManager;

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
