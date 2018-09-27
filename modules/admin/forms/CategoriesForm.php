<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\forms;

use app\modules\admin\entities\Category;
use app\modules\admin\entities\CategoryAssignment;
use app\modules\admin\entities\Product;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * @package app\modules\admin\forms
 * @property $main
 * @property $others
 */
class CategoriesForm extends Model
{
    public $main;
    public $others = [];

    public function __construct(Product $product = null, $config = [])
    {
        /**
         * @var CategoryAssignment $product->categoryAssignments[]
         */
        if ($product) {
            $this->main = $product->category_id;
            $this->others = ArrayHelper::getColumn($product->categoryAssignments, 'category_id');
        }
        parent::__construct($config);
    }

    public function categoriesList(): array
    {
        return ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name');
    }

    public function rules(): array
    {
        return [
            ['main', 'required'],
            ['main', 'integer'],
            ['others', 'each', 'rule' => ['integer']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'image' => 'Image',
        ];
    }

    public function beforeValidate(): bool
    {
        $this->others = array_filter((array)$this->others);
        return parent::beforeValidate();
    }
}