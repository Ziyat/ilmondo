<?php

namespace app\modules\admin\entities;

/**
 * @property integer $product_id;
 * @property integer $category_id;
 */

class CategoryAssignment extends \yii\db\ActiveRecord
{

    public static function create($categoryId): self
    {
        $assignment = new static();
        $assignment->category_id = $categoryId;
        return $assignment;
    }

    public function isForCategory($id): bool
    {
        return $this->category_id == $id;
    }

    public static function tableName(): string
    {
        return '{{%category_assignments}}';
    }
}
