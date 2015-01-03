<?php
namespace common\enums;


class ArticleEnum extends StatusEnum
{

    public static function getValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_DELETED,
            self::STATUS_ARCHIVED,
            self::STATUS_IN_PROGRESS,
        ];
    }

    public static function getClientValues()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_DELETED => 'Удален',
            self::STATUS_ARCHIVED => 'В архиве',
            self::STATUS_IN_PROGRESS => 'В работе',
        ];
    }


}
