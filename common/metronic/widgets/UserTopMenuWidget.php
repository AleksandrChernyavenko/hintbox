<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 02.01.2015
 * Time: 20:55
 */
namespace common\metronic\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class UserTopMenuWidget extends Widget{
    public $elements = [];

    public $template = <<< HTML
<li class="dropdown dropdown-user dropdown-dark">
    <a href="{profileLink}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        <img alt="" class="img-circle" src="{src}">
        <span class="username username-hide-mobile">{username}</span>
    </a>
						<ul class="dropdown-menu dropdown-menu-default">
						    {elements}
						</ul>
</li>
HTML;

    public $liElement = <<< HTML
<li>
    <a href="{link}">
    <i class="{icon}"></i>{label}</a>
</li>
HTML;

    public $dividerTemplate = <<< HTML
<li class="divider">
HTML;



    public function run()
    {
        return strtr($this->template,
            [
                '{src}'=> $this->getSrc(),
                '{profileLink}'=> $this->getProfileLink(),
                '{username}'=> $this->getDisplayName(),
                '{elements}'=> $this->getElements(),
            ]
        );
    }

    public function getProfileLink()
    {
        return 'javascript:;';
    }

    public function getSrc()
    {
        return 'http://www.gravatar.com/avatar/44eee1acb1fee37b24abb79b9ae45fe3?d=mm&s=96';
    }

    public function getDisplayName()
    {
        return $this->getUserModel()->getDisplayName();
    }

    public function getElements()
    {
        $html = '';

        foreach($this->elements as $element)
        {

            if(is_string($element))
            {
                $html .= $this->dividerTemplate;
            }
            else {
                $html .= strtr($this->liElement,
                    [
                        '{link}'=>ArrayHelper::getValue($element,'link','javascript:;'),
                        '{icon}'=>ArrayHelper::getValue($element,'icon','icon-user'),
                        '{label}'=>ArrayHelper::getValue($element,'label','-'),
                    ]
                );
            }
        }

        return $html;
    }

    /** @var \backend\modules\user\models\User $_userModel */
    private $_userModel;
    private function getUserModel()
    {
        if(!$this->_userModel) {
            $this->_userModel =  \Yii::$app->getUser()->getIdentity();
        }
        return $this->_userModel;
    }

}