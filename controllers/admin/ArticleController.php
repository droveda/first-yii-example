<?php

namespace app\controllers\admin;

use yii\filters\AccessControl;
use yii\web\Controller;


class ArticleController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

}

?>