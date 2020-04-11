<?php

namespace app\components;

use yii\base\BaseObject;

class Player extends BaseObject {

    private $_name;

    public $age = 39;

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        //die($name);
        $this->_name = trim($name);
    }

}

?>