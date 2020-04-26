<?php

namespace app\controllers;

use yii\web\Controller;


class CakesController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}


?>