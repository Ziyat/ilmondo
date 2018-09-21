<?php

namespace app\modules\admin\entities;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property int $date_of_birth
 * @property string $phone
 * @property string $email
 * @property string $params
 * @property string $avatar
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%clients}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_of_birth'], 'integer'],
            [['params'], 'string'],
            [['name', 'last_name', 'address_line_1', 'address_line_2', 'phone', 'email', 'avatar'], 'string', 'max' => 255],
        ];
    }

    public function beforeValidate()
    {
        if(parent::beforeValidate())
        {
            $this->date_of_birth = strtotime($this->date_of_birth);
            return true;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'address_line_1' => 'Адрес 1',
            'address_line_2' => 'Адрес 2',
            'date_of_birth' => 'Дата родждения',
            'phone' => 'Тел.',
            'email' => 'Эл. Почта',
            'params' => 'Доп. информация',
            'avatar' => 'Фото',
        ];
    }
}
