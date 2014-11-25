<?php

/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 25.11.2014
 * Time: 16:13
 */


class YesNo
{
    static protected $label = array(
        0 => 'Нет',
        1 => 'Да',
    );

    static public function getLabel($value, $labelNo = null, $secure = true)
    {
        if (empty($value) || !$value) {
            return '<span class="muted">' . ($labelNo ? $labelNo : self::$label[0]) . '</span>';
        } elseif ($value == '1') {
            return self::$label[1];
        } else {
            return $secure ? $value : CHtml::encode($value);
        }
    }

    static public function getLabelInt($value)
    {
        $value = (int)$value;
        if (empty($value) || !$value) {
            return '<span class="muted">0</span>';
        }

        return $value;
    }

    static public function bold($value)
    {
        if (is_string($value)) {
            $value = trim($value);
        }

        if ( !(empty($value) || !(int)$value)){
            return '<strong>' . $value . '</strong>';
        } else {
            return $value;
        }
    }
}