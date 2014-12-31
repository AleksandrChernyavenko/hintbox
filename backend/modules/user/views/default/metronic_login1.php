<?

use \yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?= $pageTitle ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="http://www.keenthemes.com/preview/metronic/theme/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>

<body class="login">

<div class="logo">
	<a href="index.html">
		<img src="http://www.keenthemes.com/preview/metronic/theme/assets/admin/layout3/img/logo-big.png" alt="">
	</a>
</div>

<div class="content">

	<?php $form = ActiveForm::begin([
		'id' => 'login-form',
		'options' => ['class' => 'login-form'],
		'fieldConfig' => [
			'labelOptions' => ['class' => 'control-label visible-ie8 visible-ie9'],
			'inputOptions' => ['class' => 'form-control form-control-solid placeholder-no-fix'],
		],

	]); ?>

		<h3 class="form-title">Sign In</h3>

		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>


			<?= $form->field($model, 'username',['inputOptions'=>['placeholder'=>$model->getAttributeLabel('username')]]) ?>
		<div class="form-group">
			<?= $form->field($model, 'password',['inputOptions'=>['placeholder'=>$model->getAttributeLabel('password')]])->passwordInput() ?>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>

			<?= $form->field($model, 'rememberMe')->checkbox(
				[
					'labelOptions'=>['class'=>'rememberme check']
				]
			);
			?>

			<?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"], ['class'=>'forget-password']) ?>
		</div>

	<?php ActiveForm::end(); ?>
</div>
<div class="copyright">
	<?= Yii::$app->name; ?>
</div>

</body></html>