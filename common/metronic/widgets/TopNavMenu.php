<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 15:06
 */

namespace common\metronic\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\Menu;

class TopNavMenu extends Menu
{
    const TYPE_DEFAULT= '';
    const TYPE_CONTENT = 'menu-dropdown mega-menu-dropdown';
    const TYPE_CONTENT_FULL = 'menu-dropdown mega-menu-dropdown mega-menu-full';
    const TYPE_DROPDOWN = 'menu-dropdown classic-menu-dropdown';

    /**
     * @var array the HTML attributes for the menu's container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "ul", the tag name of the item container tags.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [
        'class'=>'nav navbar-nav'
    ];

    public $linkTemplate = '<a href="{url}">{icon}{label}</a>';
    public $linkDropdownTemplate = '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="hover-initialized">{icon}{label}</a>';

    /**
     * Renders the menu.
     */
    public function run()
    {
        if ($this->route === null && \Yii::$app->controller !== null) {
            $this->route = \Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = \Yii::$app->request->getQueryParams();
        }
        $items = $this->normalizeItems($this->items, $hasActiveChild);
        if (!empty($items)) {
            $options = $this->options;
            $tag = ArrayHelper::remove($options, 'tag', 'ul');
            echo Html::tag($tag, $this->renderItems($items,$level=0), $options);
        }
    }


    /**
     * Recursively renders the menu items (without the container tag).
     * @param array $items the menu items to be rendered recursively
     * @return string the rendering result
     */
    protected function renderItems($items,&$level)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }
            if (!empty($class)) {
                if (empty($options['class'])) {
                    $options['class'] = implode(' ', $class);
                } else {
                    $options['class'] .= ' ' . implode(' ', $class);
                }
            }



            $menu = $this->renderItem($item,$level);
            if (!empty($item['items'])) {
                $level++;
                $menu .= strtr($this->submenuTemplate, [
                    '{items}' => $this->renderItems($item['items'],$level),
                ]);
            }
            $level=0;

            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode("\n", $lines);
    }


    public $firstLevelArrowIcon = '<i class="fa fa-angle-down"></i>';

    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function renderItem($item,$level=0)
    {
        if(!empty($item['items'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkDropdownTemplate);
            if($level == 0)
            {
                $template = strtr($template, [
                    '{label}' => '{label}'.$this->firstLevelArrowIcon,
                ]);
            }
        }
        else {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
        }




        return strtr($template, [
            '{url}' => isset($item['url']) ? Url::to($item['url']) : '#',
            '{icon}' => isset($item['iconClass']) ? Html::tag('i','',['class'=>$item['iconClass']]) : '',
            '{label}' => $item['label'],
        ]);

    }


}