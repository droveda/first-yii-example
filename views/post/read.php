<?php 
    use yii\helpers\Html; 
    //use yii\i18n\Formatter;
    $formatter = Yii::$app->formatter;
?>

<div class="pull-right btn-group">
    <?=Html::a('Update', array('post/update', 'id' => $post->id), array('class' => 'btn btn-primary'))?>
    <?=Html::a('Delete', array('post/delete', 'id' => $post->id), array('class' => 'btn btn-danger'))?>
</div>

<h1><?=Html::encode($post->title)?></h1>
<p><?=Html::encode($post->content)?></p>
<hr />
<time>Created On: <?=$formatter->asDatetime(Html::encode($post->created), 'dd/MM/yyyy HH:mm:ss')?></time><br />
<time>Updated On: <?=$formatter->asDatetime(Html::encode($post->updated));?></time>
<br /><hr />
<?=Html::a('<< Back', array('post/index'),['class'=>'btn btn-default']);?>