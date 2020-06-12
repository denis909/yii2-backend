<?php

/* @var $this yii\web\View */
/* @var $model \denis909\backend\LoginForm */

use backend\theme\Html;
use backend\theme\ActiveForm;

$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['id' => 'login-form']);?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]);?>

<?= $form->field($model, 'password')->passwordInput();?>

<?= $form->field($model, 'rememberMe')->checkbox();?>

<div class="text-center">

<?= Html::submitButton(Yii::t('backend', 'Login'));?>

</div>

<?php $form::end();?>