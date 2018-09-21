<?php

namespace app\modules\admin\entities;

use Yii;
use yiidreamteam\upload\ImageUploadBehavior;

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
 *
 * @mixin ImageUploadBehavior
 */
class Client extends \yii\db\ActiveRecord
{

    public static function create($name, $last_name, $address_line_1, $address_line_2, $date_of_birth, $phone, $email, $params, $avatar): self
    {
        $client = new static();
        $client->name = $name;
        $client->last_name = $last_name;
        $client->address_line_1 = $address_line_1;
        $client->address_line_2 = $address_line_2;
        $client->date_of_birth = $date_of_birth;
        $client->phone = $phone;
        $client->email = $email;
        $client->params = $params;
        $client->avatar = $avatar;
        return $client;
    }

    public function edit($name, $last_name, $address_line_1, $address_line_2, $date_of_birth, $phone, $email, $params, $avatar): void
    {
        $this->name = $name;
        $this->last_name = $last_name;
        $this->address_line_1 = $address_line_1;
        $this->address_line_2 = $address_line_2;
        $this->date_of_birth = $date_of_birth;
        $this->phone = $phone;
        $this->email = $email;
        $this->params = $params;
        $this->avatar = $avatar;
    }

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

    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'avatar',
                'thumbs' => [
                    'admin' => ['width' => 50, 'height' => 50],
                    'thumb' => ['width' => 300, 'height' => 300],
                ],
                'filePath' => '@uploads/store/clients/[[id]]/[[pk]].[[extension]]',
                'fileUrl' => '@uploadsUrl/store/clients/[[id]]/[[pk]].[[extension]]',
                'thumbPath' => '@uploads/cache/clients/[[id]]/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '@uploadsUrl/cache/clients/[[id]]/[[profile]]_[[pk]].[[extension]]',
            ]
        ];
    }

    /**
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\base\InvalidConfigException
     */
    public
    function afterFind()
    {
        parent::afterFind();
        $this->date_of_birth = Yii::$app->formatter->asDate($this->date_of_birth, 'php:Y-m-d');
    }

    public
    function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_of_birth = strtotime($this->date_of_birth);
            return true;
        }
        return false;
    }
}
