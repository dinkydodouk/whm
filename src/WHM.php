<?php

namespace dinkydodouk\whm;

use dinkydodouk\whm\services\WHMService as WHMServiceService;
use dinkydodouk\whm\variables\WHMVariable;
use dinkydodouk\whm\twigextensions\WHMTwigExtension;
use dinkydodouk\whm\models\Settings;
use dinkydodouk\whm\fields\WHMField as WHMFieldField;
use dinkydodouk\whm\widgets\WHMWidget as WHMWidgetWidget;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\console\Application as ConsoleApplication;
use craft\web\UrlManager;
use craft\services\Elements;
use craft\services\Fields;
use craft\web\twig\variables\CraftVariable;
use craft\services\Dashboard;
use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class WHM
 *
 * @property  WHMServiceService $wHMService
 */
class WHM extends Plugin
{
    /**
     * @var WHM
     */
    public static $plugin;

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = true;

    /**
     * @var bool
     */
    public $hasCpSection = true;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new WHMTwigExtension());

        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'dinkydodouk\whm\console\controllers';
        }

        /*
        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['whm'] = 'whm/customers';
            }
        );
        */

        Event::on(
            UrlManager::class,
            UrlManager::EVENT_REGISTER_CP_URL_RULES,
            function (RegisterUrlRulesEvent $event) {
                $event->rules['whm/customers'] = 'whm/customers';
            }
        );

        Event::on(
            Elements::class,
            Elements::EVENT_REGISTER_ELEMENT_TYPES,
            function (RegisterComponentTypesEvent $event) {
            }
        );

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = WHMFieldField::class;
            }
        );

        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = WHMWidgetWidget::class;
            }
        );

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('wHM', WHMVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'whm',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'whm/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }

    public function getCpNavItem()
    {
        $item = parent::getCpNavItem();
        $item['subnav'] = [
            'dashboard' => ['label' => 'Dashboard', 'url' => 'whm'],
            'customers' => ['label' => 'Customers', 'url' => 'whm/customers'],
            'products' => ['label' => 'Products', 'url' => 'whm/products'],
            'orders' => ['label' => 'Orders', 'url' => 'whm/orders'],
            'billing' => ['label' => 'Billing', 'url' => 'whm/billing'],
            'support' => ['label' => 'Support', 'url' => 'whm/support'],
            'reports' => ['label' => 'Reports', 'url' => 'whm/reports']
        ];
        return $item;
    }
}
