<?php

namespace dinkydodouk\whm\services;

use dinkydodouk\whm\WHM;

use Craft;
use craft\base\Component;

/**
 * @author    Dodo Technologies Ltd
 * @package   WHM
 * @since     1.0.0
 */
class WHMService extends Component
{
    private $whmUrl;
    private $cpanelUrl;
    private $username;
    private $apiKey;

    public function __construct()
    {
        $hostname = WHM::getInstance()->getSettings()->hostname;
        $port = WHM::getInstance()->getSettings()->portNumber;

        $this->whmUrl = $hostname.":".$port."/json-api/";
        $this->cpanelUrl = $hostname.":".$port."/json-api/cpanel?api.version=1";
        $this->username = WHM::getInstance()->getSettings()->username;
        $this->apiKey = WHM::getInstance()->getSettings()->whmApiKey;
    }

    /**
     * return string
     */
    public function listAccts($criteria = NULL)
    {
        $array = ($criteria != NULL) ? "&".http_build_query($criteria) : "";
        $query = $this->whmUrl."listaccts?api.version=1$array";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);

        $header[0] = "Authorization: whm $this->username:$this->apiKey";
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        curl_setopt($curl, CURLOPT_URL, $query);

        $result = curl_exec($curl);

        return json_decode($result);
    }
}
