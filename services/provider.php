<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  System.hiddensecrets
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Brian\Plugin\System\HiddenSecrets\Extension\HiddenSecrets;
use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;

return new class implements ServiceProviderInterface {

    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {

                $plugin = (array) PluginHelper::getPlugin('system', 'hiddensecrets');

                return new HiddenSecrets(
                    $container->get(DispatcherInterface::class),
                    $plugin
                );
            }
        );
    }
};