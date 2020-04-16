<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?=$form->field($model, 'imageFile')->fileInput()?>
    <?=Html::submitButton('Submit',['class'=>'btn btn-primary'])?>
<?php ActiveForm::end(); ?>