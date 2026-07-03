<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.hiddensecrets
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

declare(strict_types=1);

namespace Brian\Plugin\System\HiddenSecrets\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Document\HtmlDocument;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

final class HiddenSecrets extends CMSPlugin implements SubscriberInterface
{
    protected $autoloadLanguage = true;

    private ?string $modalHtml = null;

    public static function getSubscribedEvents(): array
    {
        return [
            'onAfterDispatch' => 'onAfterDispatch',
            'onAfterRender'   => 'onAfterRender',
        ];
    }

    public function onAfterDispatch(): void
    {
        $app = $this->getApplication();

        if (!$app->isClient('site')) {
            return;
        }

        $document = $app->getDocument();

        if (!$document instanceof HtmlDocument) {
            return;
        }

        $position = $this->params->get('position', 'hiddensecret');
        $modules  = ModuleHelper::getModules($position);

        if (!$modules) {
            return;
        }

        $html = '';

        foreach ($modules as $module) {
            $html .= ModuleHelper::renderModule($module);
        }

        $wa = $document->getWebAssetManager();

        $wa->registerAndUseScript(
            'plg_system_hiddensecrets.hiddensecrets',
            'media/plg_system_hiddensecrets/js/hiddensecrets.js',
            [],
            ['type' => 'module'],
            ['core', 'bootstrap.modal']
        );

        $document->addScriptOptions('plg_system_hiddensecrets', [
            'selector' => $this->params->get('selector', '.navbar-brand'),
            'backdrop' => (bool) $this->params->get('backdrop', 1),
            'keyboard' => (bool) $this->params->get('keyboard', 1),
            'focus'    => (bool) $this->params->get('focus', 1),
            'suppress' => (bool) $this->params->get('suppress_context', 1),
            'debug'    => (bool) $this->params->get('debug', 0),
        ]);

        $this->modalHtml = LayoutHelper::render(
            'plg_system_hiddensecrets.modal',
            [
                'id'      => 'plg-system-hiddensecrets-modal',
                'modules' => $html,
                'options' => [
                    'title' => $this->params->get('title', ''),
                    'size'  => $this->params->get('size', 'lg'),
                ],
            ],
            JPATH_PLUGINS . '/system/hiddensecrets/layouts'
        );
    }

    public function onAfterRender(): void
    {
        $app = $this->getApplication();

        if (!$this->modalHtml || !$app->isClient('site')) {
            return;
        }

        $body = $app->getBody();

        $pos = strripos($body, '</body>');

        if ($pos === false) {
            return;
        }

        $body = substr_replace($body, $this->modalHtml . '</body>', $pos, 7);

        $app->setBody($body);
    }
}