<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \..\models\ModifyForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Modify';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>填入想要修改的信息，并完成验证</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'modify-form']); ?>

            <?= $form->field($model, 'account')->textInput(['autofocus' => true, 'value' => Yii::$app->user->getIdentity()->account]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'newpassword')->passwordInput() ?>

            <?= $form->field($model, 'newusername')->textInput(['autofocus' => true, 'value' => Yii::$app->user->getIdentity()->username]) ?>


            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'modify-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
