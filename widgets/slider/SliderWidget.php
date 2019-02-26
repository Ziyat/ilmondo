<?php
/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 */

namespace app\widgets\slider;

use yii\base\Widget;
use yii\helpers\ArrayHelper;

/**
 * Created by Madetec-Solution.
 * Developer: Mirkhanov Z.S.
 * Class SliderWidget
 */
class SliderWidget extends Widget
{
    public $count = 3;

    /**
     * @return string
     * @throws \yii\base\InvalidArgumentException
     */
    public function run()
    {
        $fileLink = '/images/slider';
        $files = scandir(dirname(__dir__, 2) . "/web/images/slider");
        $files = array_filter($files, function ($str) {
            return $str == '.' || $str == '..' ? false : true;
        });
        $files = ArrayHelper::getColumn($files, function ($str) use ($fileLink) {
            return $this->str_ends($str, 'jpg') || $this->str_ends($str, 'png') ? $fileLink . '/' . $str : false;
        });
        $files = array_filter($files);
        $files = array_values($files);
        shuffle($files);
        $files = array_slice($files, null,$this->count);
        return $this->render('slider', [
            'files' => $files
        ]);
    }

    private function str_ends($string, $end)
    {
        return (substr($string, -strlen($end), strlen($end)) === $end);
    }
}