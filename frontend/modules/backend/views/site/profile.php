<?php

use frontend\assets\AppAsset_b;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li class="active">个人主页</li>
            </ul>
            <!--breadcrumbs end -->
            <div class="row">
                <h1 class="h1">Blank Page</h1>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-body" style="background: #B0E0E6">
                            <h3 class="h3">修改挂靠用户</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div style=" width:100px; height:100px; background-color:#00000000; border-radius:50px; border: 2px solid black">
                                        <img src="assets/img/background.jpg">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <?php $form = ActiveForm::begin(['id' => 'profile-form',
                                    'method' => 'post',
                                    'options' => [
                                        'class'=>'form-horizontal'],
                                    'fieldConfig' => [
                                            'template' => "<div>{label}</div><div>{input}</div><div class='col-lg-10 col-lg-offset-2'>{error}</div>",
                                            'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                            'inputOptions' => ['class'=>'col-lg-6'],
                                         ],]); ?>
                                    <?= $form->field($model, 'account')->textInput(['autofocus' => true])->label('用户账号'); ?>
                                    <?= $form->field($model, 'password')->passwordInput()->label('密码')->hint('请输入密码进行验证，以改变挂靠账户'); ?>
                                    <div class="form-group">
                                        <div class="col-sm-6" align="right">
                                            <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                            <?= Html::resetButton('重置', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
                                        </div>
                                        
                                    </div>
                                <?php ActiveForm::end(); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">个人信息</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php $form = ActiveForm::begin(['id' => 'profile-form',
                                    'options' => [
                                        'class'=>'form-horizontal'],
                                    'fieldConfig' => [
                                            'template' => "<div>{label}</div><div>{input}</div><div class='col-lg-10 col-lg-offset-2'>{error}</div>",
                                            'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                            'inputOptions' => ['class'=>'col-lg-6'],
                                         ],]); ?>
                                    <?= $form->field($model, 'account')->textInput(['autofocus' => true, 'readonly' => true])->label('用户账号'); ?>
                                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'readonly' => true])->label('姓名')->hint('修改用户信息可在前台页面完成'); ?>
                                    <?= $form->field($model, 'id')->textInput(['autofocus' => true])->label('编号'); ?>
                                    <?= $form->field($model, 'link')->textInput(['autofocus' => true])->label('作业链接'); ?>
                                    <?= $form->field($model, 'info')->textArea(['autofocus' => true])->label('简介'); ?>
                                    <div class="form-group">
                                        <div class="col-sm-6" align="right">
                                            <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                            <?= Html::resetButton('重置', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
                                        </div>
                                        
                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
