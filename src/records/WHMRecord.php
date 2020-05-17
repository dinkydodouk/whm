<?php

namespace dinkydodouk\whm\records;

use dinkydodouk\whm\WHM;

use Craft;
use craft\db\ActiveRecord;

class WHMRecord extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%whm_whmrecord}}';
    }
}
