<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\controllers;

use app\modules\admin\readModels\CategoryReadModel;
use app\modules\admin\readModels\ProductReadModel;
use app\modules\admin\services\CategoryManageService;
use app\modules\admin\services\ProductManageService;

/**
 * @property ProductReadModel $products
 * @property CategoryReadModel $categories
 * @property ProductManageService $manageService
 * @property CategoryManageService $categoryManageService
 */
class ProductsController extends \yii\web\Controller
{
    public $products;
    public $categories;
    public $manageService;
    public $categoryManageService;

    public function __construct(
        string $id,
        $module,
        ProductReadModel $productReadModel,
        CategoryReadModel $categoryReadModel,
        ProductManageService $manageService,
        CategoryManageService $categoryManageService,
        array $config = []
    )
    {
        $this->categoryManageService = $categoryManageService;
        $this->manageService = $manageService;
        $this->products = $productReadModel;
        $this->categories = $categoryReadModel;
        parent::__construct($id, $module, $config);
    }

    /**
     * @throws \yii\base\InvalidArgumentException
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'products' => $this->products->findAllActive()
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws \DomainException
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $this->manageService->addView($id);
        return $this->render('view', [
            'product' => $this->products->find($id)
        ]);
    }

    /**
     * @param $slug
     * @return string
     * @throws \DomainException
     * @throws \yii\base\InvalidArgumentException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCategory($slug)
    {
        $category = $this->categories->findBySlug($slug);
        $this->categoryManageService->addView($category->id);
        $products = $this->products->findByCategoryId($category);
        return $this->render('category', [
            'category' => $category,
            'products' => $products,
        ]);
    }

}