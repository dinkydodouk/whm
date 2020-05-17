<?php
/**
 * WHM plugin for Craft CMS 3.x
 *
 * A link to the Dodo WHM server
 *
 * @link      https://www.dinkydodo.com
 * @copyright Copyright (c) 2020 Dodo Technologies Ltd
 */

namespace dinkydodouk\whm\console\controllers;

use dinkydodouk\whm\WHM;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Default Command
 *
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class DefaultController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Handle whm/default console commands
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console DefaultController actionIndex() method\n";

        return $result;
    }

    /**
     * Handle whm/default/do-something console commands
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'something';

        echo "Welcome to the console DefaultController actionDoSomething() method\n";

        return $result;
    }
}
