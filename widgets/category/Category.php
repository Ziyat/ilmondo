<?php

namespace app\widgets\category;

use yii\bootstrap\Widget;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class Category
 * @package app\widgets
 * @property \madetec\crm\entities\Category $categories;
 */
class Category extends Widget
{
    public $categories;
    public $type = null;
    public $language = 'ru';

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->categories = new \madetec\crm\entities\Category();
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function run()
    {
        $regex = $this->language != 'ru' ? '[a-zA-Z0-9]' : '[а-яА-Я0-9]';
        try{
            $categories = $this->categories::find()->where(['REGEXP', 'name',$regex])->all();
        }catch (\Exception $e){
            $categories = [];
        }

        return $this->render('category', [
            'categories' => $categories,
            'type' => $this->type
        ]);
    }
}
