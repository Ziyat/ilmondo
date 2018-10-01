<?php
namespace app\modules\admin\widgets\product;

use app\modules\admin\readModels\CategoryReadModel;
use app\modules\admin\readModels\ProductReadModel;
use Yii;
use yii\bootstrap\Widget;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class Category
 * @package app\widgets
 * @property ProductReadModel $products;
 */
class PopularProducts extends Widget
{
    public $products;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->products = new ProductReadModel();
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function run()
    {
        return $this->render('popularProducts',[
            'products' => $this->products->findAllActiveForWidget()
        ]);
    }
}
