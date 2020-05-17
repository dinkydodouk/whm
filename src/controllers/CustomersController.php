<?php

namespace dinkydodouk\whm\controllers;

use Craft;
use craft\web\Controller;
use dinkydodouk\whm\WHM;
use dinkydodouk\whm\services\WHMService;
use yii\web\Response;
use craft\web\View;

class CustomersController extends Controller
{
    /**
     * @return mixed
     */
    public function actionIndex() : Response
    {
        $data['contentTitle'] = "Customers";

        // GET A LIST OF WHM ACCOUNTS
        $whmService = WHMService::instance();
        $listAccounts = $whmService->listAccts();

        $data['listTable'] = [];
        foreach($listAccounts->data->acct as $row) {
            $data['listTable'][] = $row;
        }

        return $this->renderTemplate('whm/customers/all.twig', $data, View::TEMPLATE_MODE_CP);
    }

    /**
     * @return boolean
     */
    public function actionNew() : Response
    {

    }
}