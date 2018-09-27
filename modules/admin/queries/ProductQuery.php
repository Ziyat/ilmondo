<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\queries;


use app\modules\admin\entities\Product;
use yii\db\ActiveQuery;

class ProductQuery extends ActiveQuery
{
    /**
     * @param null $alias
     * @return $this
     */
    public function active($alias = null)
    {
        return $this->andWhere([
            ($alias ? $alias . '.' : '') . 'status' => Product::STATUS_ACTIVE,
        ]);
    }
}