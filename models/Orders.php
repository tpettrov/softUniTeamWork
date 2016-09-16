<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $content
 * @property string $adress
 * @property string $date
 * @property string $state
 * @property string $user
 * @property string $holder
 * @property string $slug
 * @property MyUser $user0
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'adress', 'state'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['adress', 'state', 'user', 'holder', 'slug' ], 'string', 'max' => 45],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => MyUser::className(), 'targetAttribute' => ['user' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Поръчка номер',
            'content' => 'Описание',
            'adress' => 'Адрес за доставка',
            'date' => 'Дата',
            'state' => 'Състояние',
            'user' => 'Потребител',
            'holder' => 'Получена от',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(MyUser::className(), ['username' => 'user']);
    }

    
}
