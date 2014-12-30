<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 29.12.2014
 * Time: 15:06
 */

namespace common\metronic\widgets;

use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\Menu;

class TopNavMenu extends Menu
{
    const TYPE_DROPDOWN = 'dropdown';
    const TYPE_CONTENT = 'content';
    const TYPE_CONTENT_FULL = 'content_full';

    public $activateParents = true;

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
    public $linkDropdownTemplate = '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">{icon}{label}</a>';

    public $submenuTemplate = "\n<ul class='dropdown-menu'>\n{items}\n</ul>\n";

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

    public $itemOptionsByTypes = [
        self::TYPE_CONTENT => ['class'=>'menu-dropdown mega-menu-dropdown'],
        self::TYPE_CONTENT_FULL => ['class'=>'menu-dropdown mega-menu-dropdown mega-menu-full'],
        self::TYPE_DROPDOWN => ['class'=>'menu-dropdown classic-menu-dropdown'],
    ];

    protected function renderItems($items,&$level)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $itemType = ArrayHelper::getValue($item, 'type', self::TYPE_DROPDOWN);
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', $this->itemOptionsByTypes[$itemType]));


            if(!empty($item['items']) && $itemType == self::TYPE_DROPDOWN && $level>0){
                $options = array_merge($options, ['class'=>'dropdown-submenu']);
            }


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

            $menu = '';
            if($itemType == self::TYPE_DROPDOWN)
            {

                $menu = $this->renderItemDropdown($item,$level);
                $level++;

                if(!empty($item['items']))
                {
                    $menu .= strtr($this->submenuTemplate, [
                        '{items}' => $this->renderItems($item['items'],$level),
                    ]);
                }
            }
            else
            {
                $menu = $this->renderItemContent($item,$level);

            }


            $lines[] = Html::tag($tag, $menu, $options);
        }
        return implode("\n", $lines);
    }


    public $firstLevelArrowIcon = '<i class="fa fa-angle-down"></i>';

    protected function renderItemDropdown($item,$level)
    {
        if(!empty($item['items']) && $level == 0) {
            $template = strtr( ArrayHelper::getValue($item, 'template', $this->linkDropdownTemplate), [
                '{label}' => '{label}'.$this->firstLevelArrowIcon,
            ]);
        }
        elseif(!empty($item['items']) && $level > 0) {
            $template = strtr( '<a href="javascript:;">{icon}{label}</a>', [
                '{label}' => '{label}',
            ]);
        }
        else {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
        }



        return strtr($template, [
            '{url}' => isset($item['url']) ? Url::to($item['url']) : 'javascript:;',
            '{icon}' => isset($item['iconClass']) ? Html::tag('i','',['class'=>$item['iconClass']]) : '',
            '{label}' => $item['label'],
        ]);

    }


    public $linkTemplateContent = '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="{url}" class="dropdown-toggle{fullClass}">{label}{icon}</a>';


    public $rowTemplate = <<< HTML
<ul class="dropdown-menu"">
    <li>
        <div class="mega-menu-content">
            <div class="row">
                {content}
            </div>
        </div>
    </li>
</ul>
HTML;
    public $colTemplate = '<div class="col-md-{index}">{content}</div>';

    protected function renderItemContent($item,$level=0)
    {
        if(!empty($item['items'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplateContent);
            $icon = isset($item['iconClass']) ? Html::tag('i','',['class'=>$item['iconClass']]) : $this->firstLevelArrowIcon;
        }
        else {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            $icon = isset($item['iconClass']) ? Html::tag('i','',['class'=>$item['iconClass']]) : '';
        }


        $html = strtr($template, [
            '{fullClass}' =>   self::TYPE_CONTENT_FULL ? 'mega-menu-full' : '',
            '{label}' =>  $item['label'],
            '{icon}' => $icon,
            '{url}' => isset($item['url']) ? Url::to($item['url']) : 'javascript:;',
        ]);

        if(!empty($item['items'])) {
            $items = $item['items'];
            $countColum =  12 /  count($items);
            if(!is_int($countColum))
            {
                throw new Exception('Число 12 должно делится на количество ячеек');
            }

            $col = '';
            foreach ($items as $el) {
                $col .= strtr($this->colTemplate,
                    [
                        '{index}'=>$countColum,
                        '{content}'=>Html::tag('ul', $this->renderColList($el), ['class'=>'mega-menu-submenu']),
                    ]
                );
            }

            $html .= strtr($this->rowTemplate, [
                '{content}' =>  $col,
            ]);


        }




        return $html;

    }

    public function renderColList($item) {

        $template = '<li>
													<a href="{url}" class="iconify">
													    <i class="{iconClass}"></i>
													{label} </a>
												</li>';

        $label = $item['label'];
        $html = "<li><h3>{$label}</h3></li>";
        foreach ($item['items'] as $index=>$el) {

            $html.= strtr($template,
                [
                    '{url}' =>   Url::to($el['url']),
                    '{label}' =>  $el['label'],
                    '{iconClass}' =>  isset($el['iconClass']) ? $el['iconClass'] : 'fa fa-angle-right',
                ]

            );

        }

        return $html;

    }

    protected function isItemActive($item)
    {
        if(isset($item['url']) && !is_array($item['url'])) {
            $item['url'] = [
                0=>$item['url'],
            ];
        }
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];


            if ($route[0] !== '/' && \Yii::$app->controller) {
                $route = \Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            if (ltrim($route, '/') !== $this->route) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }

            return true;
        }
        return false;
    }

}