<?php
use  \yii\helpers\Html;
/**
 * @var \shared\YiiMetronic\widgets\form\TbFileUpload $this
 */
$attr = $model->{$attribute};
?>
<div class="control-group <?= ($model->hasErrors($attribute)) ? 'error' : '' ?>">
    <label class="control-label"><?= $label ?></label>

    <div class="controls">
        <div class="fileupload <?= ($attr instanceof CUploadedFile) ? 'fileupload-exists' : 'fileupload-new'; ?>"
             data-provides="fileupload">
            <? if (!isset($showThumbnail) || $showThumbnail): ?>
                <div class="fileupload-new thumbnail">
                    <? $val = trim($model->{$attribute});
                    if (substr($val, -3) == 'swf') {
                        echo $this->object;
                    } else {
                        if (empty($val)): ?>
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                        <? else: ?>
                            <?=
                            Html::img($basePathLogo  . $val, '', array('style' => 'width: 100%;')); ?>
                        <? endif; ?>
                    <? } ?>
                </div>
            <? endif; ?>
            <div class="fileupload-preview fileupload-exists thumbnail"
                 style="max-width: 200px; max-height: 150px; line-height: 20px;">
                <? if ($attr instanceof CUploadedFile): ?>
                    <?= $attr->getName() ?>
                <? endif; ?>
            </div>
            <div>
                                       <span class="btn btn-file"><span
                                               class="fileupload-new"><?= isset($labelBtn) ? $labelBtn : 'Загрузить изображение' ?></span>
                                       <span class="fileupload-exists">Изменить</span>
                                           <?= $fileField; ?></span>
                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Удалить</a>
            </div>
        </div>
        <?= Html::error($model, $attribute, array('class' => 'help-block error')) ?>
    </div>
</div>
-----------
