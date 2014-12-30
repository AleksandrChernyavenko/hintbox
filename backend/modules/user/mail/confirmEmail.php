<?php

use yii\helpers\Url;

/**
 * @var string $subject
 * @var \backend\modules\user\models\User $user
 * @var \backend\modules\user\models\Profile $profile
 * @var \backend\modules\user\models\UserKey $userKey
 */
?>

<h3><?= $subject ?></h3>

<p><?= Yii::t("user", "Please confirm your email address by clicking the link below:") ?></p>

<p><?= Url::toRoute(["/user/confirm", "key" => $userKey->key], true); ?></p>