<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\readModels;


use app\modules\admin\entities\Category;
use app\modules\admin\entities\Product;
use yii\web\NotFoundHttpException;

class ProductReadModel
{
    /**
     * @param $id
     * @return Product
     * @throws NotFoundHttpException
     */
    public function find($id): Product
    {
        if(!$product = Product::findOne($id))
        {
            throw new NotFoundHttpException('Product not found');
        }
        return $product;
    }
}