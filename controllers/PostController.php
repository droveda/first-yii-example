<?php

namespace app\controllers;

use app\components\Foo;
use app\components\Player;
use yii\web\Controller;
use app\models\Post;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class PostController extends Controller {

    //tutorial from this site -> https://www.yiiframework.com/wiki/490/creating-a-simple-crud-app-with-yii2-revised-12202013?revision=2

    public function behaviors() {

        return [
            [
                'class' => 'app\components\ActionTimeFilter',
                'only' => ['index']
            ]
        ];
        
    }

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

        $request = Yii::$app->request;

        if ($post->load($request->post()) && $post->validate()) {

            if (!$request->isPost) {
                die('Method is not post');
            }    

            //echo "<pre>";
            //var_dump($request->headers);
            //echo "</pre>";
            //die();
            
            $post->save();
            Yii::$app->response->redirect(array('post/read', 'id' => $post->id));
        } else {
            return $this->render('create', array('model' => $post));
        }

    }

    public function actionInfo() {

        $player = Yii::createObject(['class' => Player::className()]);
        $player->name = ' Diegues ';

        //print_r($player);

        $foo = Yii::createObject(['class' => Foo::className()]);
        $foo->on(Foo::EVENT_HELLO, function ($event) { 
            echo "event called...\n";
            echo $event->someMessage . "\n";
        });

        //$foo->bar(); #invocando o evento registrado


        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
                'message' => 'Hello World!', 
                'code' => 100,
                'player' => $player,
            ];
    }

}


?>