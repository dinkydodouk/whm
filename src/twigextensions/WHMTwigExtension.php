<?php
/**
 * WHM plugin for Craft CMS 3.x
 *
 * A link to the Dodo WHM server
 *
 * @link      https://www.dinkydodo.com
 * @copyright Copyright (c) 2020 Dodo Technologies Ltd
 */

namespace dinkydodouk\whm\twigextensions;

use dinkydodouk\whm\WHM;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class WHMTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'WHM';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new TwigFilter('someFilter', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('someFunction', [$this, 'someInternalFunction']),
        ];
    }

    /**
     * @param null $text
     *
     * @return string
     */
    public function someInternalFunction($text = null)
    {
        $result = $text . " in the way";

        return $result;
    }
}
