<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model {

    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rule() {
        return [
            ['imageFile', 'file', 'skipOnEmpty' => false, 'extensions' => ['png, jpg']],
        ];
    }

    public function upload() {
        //die($this->validate());
        if ($this->validate()) {
            $target = '../upload/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($target);
        } else {
            return false;
        }
    }

}

?>