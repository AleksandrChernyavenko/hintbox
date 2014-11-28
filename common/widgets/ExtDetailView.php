<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 28.11.2014
 * Time: 10:02
 */

namespace common\widgets;

class ExtDetailView extends \yii\widgets\DetailView
{
    /**
     * переопределе метод для поддержки Closure as value
     * Renders a single attribute.
     * @param array $attribute the specification of the attribute to be rendered.
     * @param integer $index the zero-based index of the attribute in the [[attributes]] array
     * @return string the rendering result
     */
    protected function renderAttribute($attribute, $index)
    {
        if (!empty($attribute['value']) && $attribute['value'] instanceof \Closure) {
            $attribute['value'] = call_user_func($attribute['value'], $this->model, $index);
        }

        if (is_string($this->template)) {



            return strtr($this->template, [
                    '{label}' => $attribute['label'],
                    '{value}' => $this->formatter->format($attribute['value'], $attribute['format']),
                ]);
        } else {
            return call_user_func($this->template, $attribute, $index, $this);
        }
    }
}