<?php

namespace ignatenkovnikita\addresses\frontend\controllers;

use ignatenkovnikita\addresses\backend\models\search\AddressSearch;
use ignatenkovnikita\dadata\Addresses;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class DefaultController extends Controller
{
    use Addresses;

}
