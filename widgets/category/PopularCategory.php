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
class PopularCategory extends Widget
{
    public $categories;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->categories = new \madetec\crm\entities\Category();
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function run()
    {
        try{
            $categories = $this->categories::find()->where(['REGEXP', 'name', '[а-яА-Я0-9]'])->orderBy(['views' => SORT_DESC])->all();
        }catch (\Exception $e){
            $categories = [];
        }
        return $this->render('popular',[
            'categories' => $categories
        ]);
    }
}
