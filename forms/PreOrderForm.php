<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\forms;


use yii\base\Model;

/**
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $quantity
 */

class PreOrderForm extends Model
{
    public $name;
    public $address;
    public $phone;
    public $email;

    public $quantity;

    public $verifyCode;

    public function rules()
    {
        return [
            [['name','phone'], 'required'],
            ['email', 'email'],
            [['address', 'name'], 'string'],
            ['quantity', 'integer'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Ф.И.О.',
            'phone' => 'Телефон',
            'email' => 'Эл. почта',
            'address' => 'Адрес',
            'verifyCode' => 'Код безопасности',
            'quantity' => 'Количество',
        ];
    }
}