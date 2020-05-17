<?php

namespace dinkydodouk\whm\assetbundles\indexcpsection;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class IndexCPSectionAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@dinkydodouk/whm/assetbundles/indexcpsection/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Index.js',
        ];

        $this->css = [
            'css/Index.css',
        ];

        parent::init();
    }
}
