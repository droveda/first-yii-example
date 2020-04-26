<?php

namespace app\Models;

use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;
use yii\db\Query;

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

    public function myQueryAll() {
        return Yii::$app->db->createCommand('SELECT * FROM post')->queryAll();
    }

    public function exampleWithQueryBuilder() {
        $query = new Query();
        $query->select(['id', 'title'])
            ->from('post')
            ->orderBy(['updated' => SORT_DESC])
            ->limit(10);
        //echo $query->createCommand()->sql . "\n";
        $rows = $query->all();
        return $rows;    
    }

}


?>