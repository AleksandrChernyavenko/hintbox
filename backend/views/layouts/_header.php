<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 13:56
 */

echo \common\metronic\widgets\PageHeaderMain::widget([
    'headerTop'=>\common\metronic\widgets\PageHeaderTop::widget(),
    'headerMenu'=>\common\metronic\widgets\PageHeaderMenu::widget(),
]);

?>
