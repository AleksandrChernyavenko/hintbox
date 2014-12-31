<?

use \yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this \yii\web\View */
?>

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

</body>