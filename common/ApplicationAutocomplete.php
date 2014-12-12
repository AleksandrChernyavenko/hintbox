<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 12.12.2014
 * Time: 14:04
 */

namespace common;

/**
 * Class ApplicationAutocomplete
 * @package common
 * @property \yii\image\ImageDriver $image The database connection. This property is read-only.
 */
class ApplicationAutocomplete extends \yii\web\Application
{

    /**
     * Returns Class ImageDriver
     * The main class to wrap Kohana Image Extensi
     * @return \yii\image\ImageDriver Class ImageDriver
     */
    public function getImage()
    {
        return $this->get('image');
    }

}