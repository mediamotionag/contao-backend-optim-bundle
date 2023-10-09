<?php
/**
 * @copyright  Media Motion AG <https://www.mediamotion.ch>
 * @author     Rory Zünd (Media Motion AG)
 * @package    BackendOptim
 * @license    LGPL-3.0+
 * @see	       https://github.com/mediamotionag/contao-jwplayer-bundle
 */

namespace Memo\BackendOptimBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Memo\BackendOptimBundle\MemoBackendOptimBundle;
use Terminal42\NodeBundle\Terminal42NodeBundle;
use Codefog\HasteBundle\CodefogHasteBundle;


class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(MemoBackendOptimBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                    Terminal42NodeBundle::class,
                    CodefogHasteBundle::class
                ])
                ->setReplace(['backend-optim']),];
    }
}
