<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\widgets\discounts;


use madetec\crm\readModels\DiscountReadModel;
use yii\base\Widget;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class DiscountWidget
 * @package widgets\discounts
 * @property DiscountReadModel $discounts;
 */
class DiscountWidget extends Widget
{
    public $discounts;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->discounts = new DiscountReadModel();
    }

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function run()
    {
        return $this->render('discount', [
            'discounts' => $this->discounts->findAll(),
        ]);
    }
}