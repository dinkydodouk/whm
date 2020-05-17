<?php
/**
 * WHM plugin for Craft CMS 3.x
 *
 * A link to the Dodo WHM server
 *
 * @link      https://www.dinkydodo.com
 * @copyright Copyright (c) 2020 Dodo Technologies Ltd
 */

namespace dinkydodouk\whm\assetbundles\whmfieldfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class WHMFieldFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@dinkydodouk/whm/assetbundles/whmfieldfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/WHMField.js',
        ];

        $this->css = [
            'css/WHMField.css',
        ];

        parent::init();
    }
}
