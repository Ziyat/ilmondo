<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\modules\admin\entities;


use yii\db\ActiveRecord;

class DealerAssignments extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%dealer_assignments}}';
    }
}