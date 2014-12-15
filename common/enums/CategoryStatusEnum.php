<?php
namespace common\enums;

class CategoryStatusEnum extends StatusEnum
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DELETED = 'deleted';

    public static function getValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_DELETED,
        ];
    }

    public static function getClientValues()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_DELETED => 'Удален',
        ];
    }

    public static function getHtmlClass($key)
    {
        $classes = [
            self::STATUS_ACTIVE => 'label-success',
            self::STATUS_DELETED => 'label-danger',
        ];

        return isset($classes[$key]) ? $classes[$key] : '';
    }
}
