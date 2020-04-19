<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

/**
 * @var $this yii\web\View
 * @var $sort yii\data\Sort
 */

?>

<h1>Countries</h1>

<?=LinkPager::widget(['pagination' => $pagination])?>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?=$sort->link('name')?></th>
            <th><?=$sort->link('population')?></th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($countries as $country): ?>
            <tr>
                <td><?=Html::encode("{$country->code} ({$country->name})")?>:</td>
                <td><?=$country->population?></td>
                <td>***</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>