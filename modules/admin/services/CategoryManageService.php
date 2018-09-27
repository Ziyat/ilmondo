<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\services;


use app\modules\admin\entities\Category;
use app\modules\admin\forms\CategoryForm;
use app\modules\admin\repositories\CategoryRepository;
use yii\helpers\Inflector;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class CategoryManageService
 * @package app\modules\admin\services
 * @property CategoryRepository $categories
 */
class CategoryManageService
{
    private $categories;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categories = $categoryRepository;
    }

    /**
     * @param CategoryForm $form
     * @return Category
     * @throws \DomainException
     */
    public function create(CategoryForm $form): Category
    {
        $category = Category::create($form->name, Inflector::slug($form->name), $form->image);
        $this->categories->save($category);
        return $category;
    }

    /**
     * @param $id
     * @param CategoryForm $form
     * @throws \DomainException
     * @throws \yii\web\NotFoundHttpException
     */
    public function edit($id, CategoryForm $form): void
    {
        $category = $this->categories->find($id);
        $category->edit($form->name, Inflector::slug($form->name), $form->image);
        $this->categories->save($category);
    }

    public function remove($id): void
    {
    }
}