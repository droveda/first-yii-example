<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Post;
use Yii;
use yii\web\NotFoundHttpException;

class PostController extends Controller {

    //tutorial from this site -> https://www.yiiframework.com/wiki/490/creating-a-simple-crud-app-with-yii2-revised-12202013?revision=2

    public function actionIndex() {
        $data = Post::find()->all();
        return $this->render('index', ['data' => $data]);
    }

    private function validateGetPost($id=NULL) {
        if ($id === NULL || empty($id)) {
            //echo "aaa";
            Yii::$app->session->setFlash('error', 'A post with that id does not exist');
            Yii::$app->getResponse()->redirect(array('post/index'));
            return;
        }


        $post = Post::findOne($id);
        if ($post === NULL) {    
            Yii::$app->session->setFlash('error', 'A post with that id does not exist');
            Yii::$app->getResponse()->redirect(array('post/index'));
            return;
        }

        return $post;
    }

    public function actionRead($id=NULL) {
        $post = $this->validateGetPost($id);

        if ($post === NULL) {
            return;
        }

        return $this->render('read', array('post' => $post));
    }

    public function actionDelete($id = NULL) {

        $post = $this->validateGetPost($id);

        if ($post === NULL) {
            return;
        }

        $post->delete();
        Yii::$app->session->setFlash('success', 'Your post has been sucessfully deleted');
        Yii::$app->getResponse()->redirect(array('post/index'));
    }

    public function actionCreate() {
        $model = new Post();
   
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           
            //echo "<pre>"; print_r($model->attributes); echo "</pre>";
            //die();
            $model->save();
            Yii::$app->response->redirect(array('post/read', 'id' => $model->id));
        } else {
            return $this->render('create', array('model' => $model));
        }
    }

    public function actionUpdate($id = NULL) {
        $post = $this->validateGetPost($id);

        if($post == NULL) {
            return;
        }

        if ($post->load(Yii::$app->request->post()) && $post->validate()) {
            $post->save();
            Yii::$app->response->redirect(array('post/read', 'id' => $post->id));
        } else {
            return $this->render('create', array('model' => $post));
        }

    }

}


?>