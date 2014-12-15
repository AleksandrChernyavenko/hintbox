<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 15.12.2014
 * Time: 11:23
 */
namespace common\traits;

trait DateRangeTrait
{
    public $date_start;
    public $date_end;

    public static function traitRules()
    {
        return [
            [['date_start', 'date_end'], 'safe'],
        ];
    }

    public function getDateRangeFilter($dateAttr)
    {
        if($this->date_start && $this->date_end)
        {
            return ['BETWEEN', $dateAttr, $this->date_start, $this->date_end];
        }
        else {
            return [];
        }

    }

}
