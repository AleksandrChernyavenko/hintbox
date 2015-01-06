<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 26.11.2014
 * Time: 12:52
 */
namespace frontend\widgets;



use common\enums\CategoryEnum;
use frontend\models\Category;

class CategoryNavBar extends \yii\base\Widget
{
    public $countElement = 6;

    public function run()
    {
        return $this->render('_topNavBar', [
                'category'=>$this->getActiveCategory(),
                'countElement'=>$this->countElement,
            ]);
    }

    private function getActiveCategory()
    {
        $category =  Category::find()->andWhere('status = :status',[':status'=>CategoryEnum::STATUS_ACTIVE])->all();
        return $category;
    }


}