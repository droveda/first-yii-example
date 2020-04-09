<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget {

    public $message;

    public function init() {
        parent::init();
        if ($this->message === NULL) {
            $this->message = "Hello World";
        }
    }

    public function run() {
        return Html::encode($this->message);
    }

}

?>