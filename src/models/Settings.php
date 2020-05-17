<?php

namespace dinkydodouk\whm\models;

use dinkydodouk\whm\WHM;

use Craft;
use craft\base\Model;

class Settings extends Model
{
    /**
     * @var string
     */
    public $whmApiKey;
    public $hostname;
    public $portNumber;
    public $username;

    public function rules()
    {
        return [
            ['whmApiKey', 'string'],
            ['hostname', 'string'],
            ['portNumber', 'string'],
            ['username', 'string'],
            [['whmApiKey', 'hostname', 'portNumber', 'username'], 'required']
        ];
    }
}
