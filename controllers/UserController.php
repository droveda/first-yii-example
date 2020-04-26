<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\auth\HttpBasicAuth;

class UserController extends ActiveController {

    public $modelClass = 'app\models\User';

    public function init() {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors() {
        $behaviors = parent::behaviors();
        //$behaviors['authenticator'] = [
        //    'class' => HttpBasicAuth::className(),
        //];
        return $behaviors;
    }

    //public function behaviors() {
    //    $behaviors = parent::behaviors();
    //    $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
    //    return $behaviors;
    //}

}

?>