<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 02.01.2015
 * Time: 20:41
 */
namespace common\metronic\widgets;

use yii\widgets\Breadcrumbs;

class MetronicBreadcrumbs extends Breadcrumbs{

    public $options = ['class' => 'page-breadcrumb breadcrumb'];

    public $itemTemplate = "<li>{link}<i class='fa fa-circle'></i></li>\n";
}