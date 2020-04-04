<?php

namespace app\Models;

use yii\db\ActiveRecord;
use yii\db\Expression;

class Post extends ActiveRecord {    

    public static function primaryKey() {
        return array('id');
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created' => 'Created',
            'updated' => 'Updated',
        );
    }

    public function rules() {
        return [
            [['title', 'content'], 'required']
        ];
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->created = new Expression('NOW()');
        }
        $this->updated = new Expression("NOW()");
        return parent::beforeSave($insert);
    }

}


?>