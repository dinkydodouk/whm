<?php
/**
 * WHM plugin for Craft CMS 3.x
 *
 * A link to the Dodo WHM server
 *
 * @link      https://www.dinkydodo.com
 * @copyright Copyright (c) 2020 Dodo Technologies Ltd
 */

namespace dinkydodouk\whm\jobs;

use dinkydodouk\whm\WHM;

use Craft;
use craft\queue\BaseJob;

/**
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class WHMTask extends BaseJob
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        // Do work here
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('whm', 'WHMTask');
    }
}
