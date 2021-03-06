<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\Linkable;
use yii\web\Link;
use yii\helpers\Url;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface, Linkable {
    

    public static function tableName() {
        return "user";
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //$hash = \Yii::$app->getSecurity()->generatePasswordHash($password);
        //die($hash);
        return $this->password === $password && \Yii::$app->getSecurity()->validatePassword($password, $this->hash_control);
        //return $this->password === $password;
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public function fields() {
        $fields = parent::fields();

        unset($fields['password'], $fields['access_token'], $fields['access_token'], 
            $fields['auth_key'], $fields['hash_control']);
        return $fields;
    }

    /**
     * @Override 
     */
    public function getLinks() {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
        ];
    }
}
