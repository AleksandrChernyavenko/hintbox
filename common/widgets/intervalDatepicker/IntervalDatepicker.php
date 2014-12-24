<?php
/**
 * Created by PhpStorm.
 * User: Александр Чернявенко
 * Date: 24.12.2014
 * Time: 12:22
 */

namespace common\widgets\intervalDatepicker;

use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\InputWidget;

class IntervalDatepicker extends InputWidget
{

    public $type;
    public $pluginOptions;
    public $form;
    public $options;

    public $template = <<< HTML
<div style="max-width: 100%">
		<div class="input-prepend">
<span class="glyphicon glyphicon-calendar"></span>
			<a id="{id}" class="interval" href="#{id}">
			    {input_range}
			</a>
			 {button_apply}
             {input_timeZone}
			<input class="timezone" name="common_components_dataproviderconfigurator_web_models_ActiveFormModel[timeZone]" id="common_components_dataproviderconfigurator_web_models_ActiveFormModel_timeZone" type="hidden" value="Europe/Moscow">		</div>
	</div>

HTML;

    public $templateScript  = <<< HTML
<script id="{id}-template" type="text/template">
	<div class="daterangepicker dropdown-menu">
		<div class="pull-right">
			<div class="calendar left"></div>
			<div class="calendar right"></div>
			<div class="pull-left form-horizontal" style="clear:both;">
				<div class="control-group">
				    {label_1}
					<div class="controls">
					 {activeDropDownList}
					</div>
				</div>
			</div>
		</div>
		<div class="ranges">
			<div class="range_inputs">
			    <div style="display:none;">
                    <div class="daterangepicker_start_input" style="float: left">
                        <label for="daterangepicker_start">{{ locale.fromLabel }}</label>
                        <input class="input-mini" type="text" name="daterangepicker_start" disabled="disabled">
                    </div>
                    <div class="daterangepicker_end_input" style="float: left; padding-left: 11px">
                        <label for="daterangepicker_end">{{ locale.toLabel }}</label>
                        <input class="input-mini" type="text" name="daterangepicker_end" disabled="disabled">
                    </div>
				</div>
				<div class="btn-group">
					<button class="{{ applyClass }} applyBtn">{{ locale.applyLabel }}</button>
				</div>
			</div>
		</div>
	</div>
</script>
HTML;



    public function init()
    {

        if (empty($this->options['id'])) {
            $this->options['id'] = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
        }
        $this->options['readonly'] = 'readonly';
        $this->options['class'] = 'm-wrap m-ctrl-medium date-range';

        $this->registerAssets();

    }

    public function run()
    {
        $input_range =  $this->hasModel() ?
            Html::activeTextInput($this->model, $this->attribute, $this->options) :
            Html::textInput($this->name, $this->value, $this->options);

       $formName =  $this->model->formName();

        $button_apply = Html::submitButton('Применить',[
            'name'=>$formName.'[apply]',
            'class'=>'hidden',
            'value'=>'apply',
        ]);

        $input_timeZone = Html::textInput($formName.'[timeZone]', $this->value, $this->options);


        $html = strtr($this->template,
            [
                '{input_range}'=>$input_range,
                '{button_apply}'=> $button_apply,
                '{input_timeZone}'=> '{input_timeZone}',
                '{id}'=> $this->getId(),
            ]
        );

        $html .= strtr($this->templateScript,
            [
                '{id}'=> $this->getId(),
            ]
        );

        echo $html;

    }

    private function registerAssets()
    {
        $view = $this->getView();

        DatePickerAsset::register($view);

        $js = <<<'JS'
(function ($, moment, mustache) {
	if ($ && $.fn.daterangepicker && moment && mustache) {
		var now = moment(),
			$a = $('{id}'),
			$input = $a.find('input');
		moment.lang('ru');
		$a.click(function (e) {
			e.preventDefault();
			$a.parent().siblings('.active').find('a').click();
			$input.focus();
		});
		$input.daterangepicker(
			{
				ranges: {
					'За сегодня': [now, now],
					'За вчера': [now.clone().subtract('day', 1), now.clone().subtract('day', 1)],
					'За последние 7 дней': [now.clone().subtract('day', 6), now],
					'За последние 30 дней': [now.clone().subtract('day', 29), now],
					'За этот месяц': [now.clone().date(1), now],
					'За предыдущий месяц': [now.clone().subtract('months', 1).startOf('month'), now.clone().subtract('months', 1).endOf('month')]
				},
				template: $('{id}-template').html(),
				apply: function () {
					var $timezone = this.container.find('select.timezone');
					$a.siblings('input.timezone').val($timezone.val());
					$a.siblings('button[type="submit"]').click();
				}
			}
		);
	}
}(window.jQuery, window.moment, window.Mustache));
JS;


        $js = strtr($js,
            [
                '{id}'=> '#'.$this->getId(),
            ]
        );

        $view->registerJs($js);
    }
}