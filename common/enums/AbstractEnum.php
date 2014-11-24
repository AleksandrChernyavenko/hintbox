<?php
namespace common\enums;


use yii\helpers\Html;

abstract class AbstractEnum
{

    public static function getValues()
    {
        return [];
    }

    public static function getValue($key)
    {
        $aStatus = static::getValues();

        return isset($aStatus[$key]) ? $aStatus[$key] : $key;
    }

    public static function getClientValues()
    {
        return [];
    }

    public static function getQuoteValues()
    {
        return array_map(
            function ($item) {
                return "\"{$item}\"";
            },
            static::getValues()
        );
    }

    public static function getHtmlClass($key)
    {
        return [];
    }

    public static function getClientValue($key)
    {
        $aStatus = static::getClientValues();

        return isset($aStatus[$key]) ? $aStatus[$key] : $key;
    }

    public static function getLabelValue($key, $iconClass = null)
    {
        $text = static::getClientValue($key);
        $htmlClass = static::getHtmlClass($key);
        if (empty($htmlClass)) {
            return static::getClientValue($key);
        }
        $icon = \Html::tag('i', ['class' => $iconClass], '', true);
        if ($text) {
            return \Html::tag('span', ['class' => 'label ' . $htmlClass], $icon . ' ' . \Html::tag('strong', [], $text));
        }
    }

    public static function getLabelValues($iconClass = null)
    {

        $return = [];
        $icon = \Html::tag('i', ['class' => $iconClass]);
        foreach (static::getValues() as $key) {
            $text = static::getClientValue($key);
            $htmlClass = static::getHtmlClass($key);
            $return[$key] = \Html::tag('span', ['class' => 'label ' . $htmlClass], $icon . ' ' . \Html::tag('strong', [], $text));
        }

        return $return;
    }

    public static function getCurrentsClientValue(array $currents)
    {
        /** @var $that self */
        //$that = get_called_class();
        //return array_map(function ($item) use ($that) { return $that::getValue($item); }, $currents);
        $aData = [];
        foreach ($currents as $item) {
            $aData[$item] = static::getClientValue($item);
        }

        return $aData;

    }

    public static function getCurrentsLabelValue(array $currents, $iconClass = null)
    {
        /** @var $that self */
        //$that = get_called_class();
        //return array_map(function ($item) use ($that) { return $that::getValue($item); }, $currents);
        $aData = [];
        foreach ($currents as $item) {
            $aData[$item] = static::getLabelValue($item, $iconClass);
        }

        return $aData;

    }

    public static function getStatusesFilter($key = 'status')
    {
        $filterStatuses = [
            [
                'title' => 'Все',
                'condition' => '',
            ],
        ];
        foreach (static::getLabelValues() as $status => $title) {
            $filterStatuses[] = [
                'title' => $title,
                'condition' => sprintf('%s = "%s"', $key, $status),
            ];
        }

        return $filterStatuses;
    }
}
