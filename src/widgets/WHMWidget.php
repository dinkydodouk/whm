<?php
/**
 * WHM plugin for Craft CMS 3.x
 *
 * A link to the Dodo WHM server
 *
 * @link      https://www.dinkydodo.com
 * @copyright Copyright (c) 2020 Dodo Technologies Ltd
 */

namespace dinkydodouk\whm\widgets;

use dinkydodouk\whm\WHM;
use dinkydodouk\whm\assetbundles\whmwidgetwidget\WHMWidgetWidgetAsset;

use Craft;
use craft\base\Widget;

/**
 * WHM Widget
 *
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class WHMWidget extends Widget
{

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $message = 'Hello, world.';

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('whm', 'WHMWidget');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@dinkydodouk/whm/assetbundles/whmwidgetwidget/dist/img/WHMWidget-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function maxColspan()
    {
        return null;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge(
            $rules,
            [
                ['message', 'string'],
                ['message', 'default', 'value' => 'Hello, world.'],
            ]
        );
        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate(
            'whm/_components/widgets/WHMWidget_settings',
            [
                'widget' => $this
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerAssetBundle(WHMWidgetWidgetAsset::class);

        return Craft::$app->getView()->renderTemplate(
            'whm/_components/widgets/WHMWidget_body',
            [
                'message' => $this->message
            ]
        );
    }
}
