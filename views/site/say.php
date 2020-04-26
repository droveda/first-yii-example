<?php
use yii\helpers\Html;
var_dump($message);
echo "<br />";
echo "<pre>";
    var_dump($myObject);
echo "</pre>";

$this->title = 'My Web Page 123';
$this->params['breadcrumbs'][] = 'Say Page';
?>
<br />
<?=Html::encode($message)?>