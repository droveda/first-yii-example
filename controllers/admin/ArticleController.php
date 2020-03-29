<?php

namespace app\controllers\admin;

use yii\web\Controller;


class ArticleController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

}

?>