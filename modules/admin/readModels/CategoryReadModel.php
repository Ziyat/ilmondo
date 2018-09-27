<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\readModels;


use app\modules\admin\entities\Category;
use yii\web\NotFoundHttpException;

class CategoryReadModel
{
    /**
     * @param $id
     * @return Category
     * @throws NotFoundHttpException
     */
    public function find($id): Category
    {
        if(!$category = Category::findOne($id))
        {
            throw new NotFoundHttpException('Client not found');
        }
        return $category;
    }
}