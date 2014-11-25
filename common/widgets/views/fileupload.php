<?php
use  \yii\helpers\Html;
/**
 * @var \shared\YiiMetronic\widgets\form\TbFileUpload $this
 */
$attr = $model->{$attribute};
?>
начало

        <div class="fileupload <?= ($attr instanceof CUploadedFile) ? 'fileupload-exists' : 'fileupload-new'; ?>" data-provides="fileupload">
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
                            Html::img($src, '', array('style' => 'width: 100%;')); ?>
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
                                       <span class="btn btn-file btn-gray"><span
                                               class="fileupload-new"><?= isset($labelBtn) ? $labelBtn : 'Загрузить изображение' ?></span>
                                       <span class="fileupload-exists">Изменить</span>
                                           <?= $fileField; ?></span>
                <a href="#" class="btn fileupload-exists btn-gray" data-dismiss="fileupload">Удалить</a>
            </div>
        </div>
конец
