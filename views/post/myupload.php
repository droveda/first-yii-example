<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1><?=\Yii::t('app','Upload Example')?></h1>

<h2><?=\Yii::t('app', 'welcome')?></h2>

<p><?=\Yii::$app->language?></p>
<p><?=\Yii::t('app', 'Today is {0,date}', time())?></p>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?=$form->field($model, 'imageFile')->fileInput()?>
    <?=Html::submitButton('Submit',['class'=>'btn btn-primary'])?>
<?php ActiveForm::end(); ?>