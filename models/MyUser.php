<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "my_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $fullname
 * @property Orders[] $orders

 */
class MyUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname'], 'required'],
            [['username', 'authKey'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 100],
            [['fullname'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'fullname' => 'Fullname',
        ];
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);

    }

    public function validatePassword($password)
    {

        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
        
    }

    public function register()
    {
        $hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);

        Yii::$app->db->createCommand()->insert('my_user', ['username' => $this->username,
            'password' => $hash, 'fullname'=> $this->fullname ])->execute();

    }
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user' => 'username']);
    }

    public function getUsername()
    {
        return Yii::$app->user->identity->username;
    }
}
