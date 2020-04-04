<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(array('options' => array('class' => 'form-horizontal'))); ?>
    <?php echo $form->field($model, 'title')->textInput(); ?>
	<?php echo $form->field($model, 'content')->textArea(); ?>
	<div class="form-actions">
		<?=Html::a('<< Back', array('post/index'), array('class'=>'btn btn-default')); ?>
		<?=Html::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
	</div>
<?php ActiveForm::end(); ?>