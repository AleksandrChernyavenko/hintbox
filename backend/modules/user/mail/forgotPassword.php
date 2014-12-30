<?php

use yii\helpers\Url;

/**
 * @var string $subject
 * @var \backend\modules\user\models\User $user
 * @var \backend\modules\user\models\UserKey $userKey
 */
?>

<h3><?= $subject ?></h3>

<p><?= Yii::t("user", "Please use this link to reset your password:") ?></p>

<p><?= Url::toRoute(["/user/reset", "key" => $userKey->key], true); ?></p>
