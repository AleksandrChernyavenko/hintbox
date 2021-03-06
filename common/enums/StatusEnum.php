<?php
namespace common\enums;
use yii\helpers\Html;

class StatusEnum extends AbstractEnum
{
    const STATUS_ACTIVE = 'active';
    const STATUS_PENDING = 'pending';
    const STATUS_DELETED = 'deleted';
    const STATUS_PAUSED = 'paused';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ALLOWED = 'allowed';
    const STATUS_BLOCKED = 'blocked';
    const STATUS_DISABLED = 'disabled';
    const STATUS_SUCCESS = 'success';
    const STATUS_VISIBLE = 'visible';
    const STATUS_INVISIBLE = 'invisible';
    const STATUS_MODERATED = 'moderate';
    const STATUS_ARCHIVED= 'archived';
    const STATUS_IN_PROGRESS= 'in_progress';

    public static function getValues()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_PENDING,
            self::STATUS_DELETED,
            self::STATUS_PAUSED,
            self::STATUS_APPROVED,
            self::STATUS_REJECTED,
            self::STATUS_BLOCKED,
            self::STATUS_DISABLED,
            self::STATUS_SUCCESS,
            self::STATUS_VISIBLE,
            self::STATUS_INVISIBLE,
            self::STATUS_MODERATED,
        ];
    }

    public static function getClientValues()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_PENDING => 'Ожидает подтверждения',
            self::STATUS_DELETED => 'Удален',
            self::STATUS_PAUSED => 'На паузе',
            self::STATUS_APPROVED => 'Подтвержден',
            self::STATUS_REJECTED => 'Отклонен',
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_DISABLED => 'Заблокирован',
            self::STATUS_ALLOWED => 'Разрешен',
            self::STATUS_SUCCESS => 'Успешно',
            self::STATUS_VISIBLE => 'Виден',
            self::STATUS_INVISIBLE => 'Не виден',
            self::STATUS_MODERATED => 'На модерации',
            self::STATUS_ARCHIVED => 'В архиве',
            self::STATUS_IN_PROGRESS => 'В работе',
        ];
    }

    public static function getHtmlClass($key)
    {
        $classes = [
            self::STATUS_ACTIVE => 'label-success',
            self::STATUS_PENDING => 'label-warning',
            self::STATUS_DELETED => 'label-danger',
            self::STATUS_PAUSED => 'label-paused',
            self::STATUS_APPROVED => 'label-success',
            self::STATUS_REJECTED => 'label-rejected',
            self::STATUS_BLOCKED => 'label-blocker',
            self::STATUS_DISABLED => 'label-blocker',
            self::STATUS_ALLOWED => 'label-success',
            self::STATUS_VISIBLE => 'label-warning',
            self::STATUS_INVISIBLE => 'label-danger',
            self::STATUS_MODERATED => 'label-warning',
            self::STATUS_ARCHIVED => 'label-warning',
            self::STATUS_IN_PROGRESS => 'label-success',
        ];

        return isset($classes[$key]) ? $classes[$key] : '';
    }

    public static function getLabel($value)
    {
        return Html::tag('span',self::getClientValue($value),['class'=>'label label-sm '.self::getHtmlClass($value)]);
    }

    public static function getClientLabelValues()
    {
        return [
            self::STATUS_ACTIVE => self::getLabel( self::STATUS_ACTIVE),
            self::STATUS_DELETED => self::getLabel( self::STATUS_DELETED),
            self::STATUS_ARCHIVED => self::getLabel( self::STATUS_ARCHIVED),
            self::STATUS_IN_PROGRESS => self::getLabel( self::STATUS_IN_PROGRESS),
        ];
    }
}
