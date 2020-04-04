<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Countries</h1>

<?=LinkPager::widget(['pagination' => $pagination])?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Country</th>
            <th>Population</th>
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