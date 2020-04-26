<?php 
    use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use app\components\HelloWidget;
?>

<?php $form = ActiveForm::begin(array('options' => array('class' => 'form-horizontal'))); ?>
    <?php echo $form->field($model, 'title')->textInput(); ?>
	<?php echo $form->field($model, 'content')->textArea(); ?>
	<?//=$form->field($model, 'content')->dropDownList(
		//[
		//	'1' => 'Item 1',
		//	'2' => 'Item 2',
		//	'3' => 'Item 3',
		//],
		//['prompt' => 'Select Category']
	//)
	?>
	<div class="form-actions">
		<?=Html::a('<< Back', array('post/index'), array('class'=>'btn btn-default')); ?>
		<?=Html::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
	</div>

	<?=HelloWidget::widget(['message' => 'Good afternoon!'])?>
<?php ActiveForm::end(); ?>