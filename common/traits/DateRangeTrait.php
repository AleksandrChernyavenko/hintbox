<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 15.12.2014
 * Time: 11:23
 */
namespace common\traits;

use yii\helpers\VarDumper;

trait DateRangeTrait
{
    public static function traitRules()
    {
        return [
        ];
    }

    public function getDateRangeFilter($dateAttr)
    {
        $date_range = explode(' - ',$this->$dateAttr);

        if(!empty($date_range[0]) && !empty($date_range[1]))
        {
            $format = 'd.m.Y';
            list($start, $end) = explode(' - ', $this->$dateAttr);
            $start = \DateTime::createFromFormat($format, $start);
            $end = \DateTime::createFromFormat($format, $end);
            return ['BETWEEN', $dateAttr, $start->format('Y-m-d 00:00:00'), $end->format('Y-m-d 23:59:59')];
        }
        else {
            return [];
        }

    }

}
