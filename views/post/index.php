<?php

use yii\helpers\Html;
use yii\web\View;

$this->title = 'Simple CRUD Example';

$this->registerJs(
    "$('.edit-button').on('click', function() {return confirm('Confirm editing this item?');});",
    View::POS_READY,
    'my_button_handler'
);

?>

<?php echo Html::a('Create new Post', array('post/create'), array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"></div>
<hr />
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $post): ?>
        <tr>
            <td><?=Html::a($post->id, array('post/read', 'id' => $post->id))?></td>
            <td><?=Html::a($post->title, array('post/read', 'id' => $post->id))?></td>
            <td><?=$post->created?></td>
            <td><?=$post->updated?></td>
            <td>
                <?=Html::a('Edit', array('post/update', 'id'=>$post->id), array('class'=>'edit-button icon icon-edit')); ?>
				<?=Html::a('Delete', array('post/delete', 'id'=>$post->id), array('class'=>'icon icon-trash', 'onclick'=>"return confirm('Are you sure?');")); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>