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
 * @property integer $dob
 * @property integer $cardNumber
 * @property integer $city
 */

class LoyaltyCardForm extends Model
{
    public $name;
    public $phone;
    public $email;
    public $dob;
    public $cardNumber;
    public $city;

    public $verifyCode;

    public function rules()
    {
        return [
            [['name','phone','email','phone'], 'required'],
            ['email', 'email'],
            [['name','cardNumber','city'], 'string'],
            [['dob'], 'date', 'format' => 'php:Y-m-d'],
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