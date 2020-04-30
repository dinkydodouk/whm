<?php
/**
 * WHM plugin for Craft CMS 3.x
 *
 * A link to the Dodo WHM server
 *
 * @link      https://www.dinkydodo.com
 * @copyright Copyright (c) 2020 Dodo Technologies Ltd
 */

namespace dinkydodoukwhm\whm\utilities;

use dinkydodoukwhm\whm\WHM;
use dinkydodoukwhm\whm\assetbundles\whmutilityutility\WHMUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * WHM Utility
 *
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class WHMUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('whm', 'WHMUtility');
    }

    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'whm-w-h-m-utility';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@dinkydodoukwhm/whm/assetbundles/whmutilityutility/dist/img/WHMUtility-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(WHMUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'whm/_components/utilities/WHMUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
