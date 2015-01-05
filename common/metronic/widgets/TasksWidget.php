<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 31.12.2014
 * Time: 17:27
 */

namespace common\metronic\widgets;

use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class TasksWidget extends Widget{

    const TYPE_SUCCESS = 'success';
    const TYPE_DANGER = 'danger';
    const TYPE_WARNING = 'warning';
    const TYPE_INFO = 'info';
    const TYPE_IMPORTANT = 'important';

    public $tasks = [];

    public $badgeTemplate = ' <span class="badge badge-default">{count}</span>';

    public $template = <<< HTML
<li class="dropdown dropdown-extended dropdown-dark dropdown-tasks" id="header_task_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
        <i class="icon-calendar"></i>
        {badge}
    </a>
    {dropdown-menu}
</li>
HTML;

    public $dropdownTemplate = <<< HTML
<ul class="dropdown-menu extended tasks">
    <li class="external">
        <h3>Задачи</h3>
    </li>
    <li>
        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
        {list}
        </ul>
    </li>
</ul>
HTML;

    public $liTemplate = <<< HTML
<li>
    <a href="{href}">
        <span class="task">
            <span class="desc">{label}</span>
            <span class="percent">{percent}%</span>
        </span>
        <span class="progress">
            <span style="width: {percent}%;" class="progress-bar progress-bar-{type}" aria-valuenow="{percent}" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">{percent}% Завершенно</span></span>
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
        return !count($this->tasks) ? '' : strtr($this->badgeTemplate, ['{count}'=>count($this->tasks) ]);
    }

    public function getDropdown()
    {
        return strtr($this->dropdownTemplate,
            [
                '{list}'=>$this->getTasksList(10),
            ]
        );
    }


    private function getTasksList()
    {
        $html = '';

        foreach($this->tasks as $task) {

            $percent = $this->getPercent($task);
            $type = $this->getType($task,$percent);

            $html.=strtr($this->liTemplate,
                [
                    '{href}'=>ArrayHelper::getValue($task,'href','javascript:;'),
                    '{label}'=>ArrayHelper::getValue($task,'label','label'),
                    '{percent}'=>$percent,
                    '{type}'=>$type,
                ]
            );
        }

        return $html;

    }

    public function getPercent($task)
    {
        $key = 'percent';
        $defaultValue = 0;
        if(!empty($task[$key]) && $task[$key] instanceof \Closure)
        {
            return $task[$key]($task,$defaultValue,$this);
        }
        return ArrayHelper::getValue($task,$key,$defaultValue);
    }

    public function getType($task,$percent)
    {
        $key = 'type';
        $defaultValue = self::TYPE_DANGER;
        if(!empty($task[$key]) && $task[$key] instanceof \Closure)
        {
            return $task[$key]($task,$percent);
        }
        return ArrayHelper::getValue($task,$key,$defaultValue);
    }

}