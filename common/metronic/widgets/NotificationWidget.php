<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 31.12.2014
 * Time: 17:27
 */

namespace common\metronic\widgets;

use yii\base\Widget;
use yii\helpers\VarDumper;

class NotificationWidget extends Widget{

    public $limitMsg = 10;

    public function init()
    {
        /** @var \backend\modules\user\models\User $user */
        $user = $this->getUserModel();

        parent::init();
    }

    public $badgeTemplate = ' <span class="badge badge-default">{count}</span>';

    public $template = <<< HTML
<li class="dropdown dropdown-extended dropdown-dark dropdown-notification" id="header_notification_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
        <i class="icon-bell"></i>
        {badge}
    </a>
    {dropdown-menu}
</li>
HTML;

    public $dropdownTemplate = <<< HTML
<ul class="dropdown-menu">
							<li class="external">
								<h3>У вас <strong>{count} непрочитанных</strong> сообщений</h3>
								<a href="javascript:;">Посмотреть все</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								{list}
								</ul>
							</li>
                        </li>
                </ul>
HTML;

    public $liTemplate = <<< HTML
<li>
    <a href="{href}">
        <span class="time">{time}</span>
        <span class="details">
            <span class="label label-sm label-icon label-success">
                <i class="fa fa-plus"></i>
            </span>
            {text}
        </span>
    </a>
</li>
HTML;




    public function run()
    {
        return strtr($this->template,
            [
                '{badge}'=> $this->getBadge(),
                '{dropdown-menu}'=> $this->getDropdown(),
            ]
        );
    }

    public function getBadge()
    {
        $countUnread = $this->getUnreadNotificationsCount();
        if($countUnread)
        {
            return strtr($this->badgeTemplate,
                [
                    '{count}'=>$countUnread
                ]
            );
        }
        else {
            return '';
        }
    }

    public function getDropdown()
    {
        return strtr($this->dropdownTemplate,
            [
                '{count}'=>$this->getUnreadNotificationsCount(),
                '{list}'=>$this->getNotifications(10),
            ]
        );
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

    private function getNotifications($limit)
    {
        $html = '';
        $models = [$limit];
        foreach($models as $model) {
            $html.=strtr($this->liTemplate,
                [
                    '{href}'=>'{href}',
                    '{time}'=>'{time}',
                    '{text}'=>'{text}',
                ]
            );
        }

        return $html;

    }

    private function getUnreadNotificationsCount()
    {
        return rand(1,1000);
    }


}