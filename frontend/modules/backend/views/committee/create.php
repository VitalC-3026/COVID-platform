<?php 
use frontend\assets\AppAsset_b;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

AppAsset_b::addScript($this, 'assets/plugins/wizard/js/loader.min.js');
?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <!-- TODO: 通过路由跳转地址 -->

                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li>信息录入</li>
                <li class="active">新增职员信息</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">新增职员</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">新增社区职员</h3>
                    <div class="actions pull-right">
                        <a href="<?= \yii\helpers\Url::to(['/backend/committee/index']); ?>"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3" sytle="margin-bottom: 10px">
                            <h2 class="title">基本信息</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $form = ActiveForm::begin(['id' => 'admin-cform',
                            'method' => 'post',
                            'options' => [
                                'class'=>'form-horizontal',
                                'style'=>'width: 80%; margin-left: 90px'
                            ],
                            'fieldConfig' => [
                                'template' => '<div style="margin-bottom:10px">{label}</div><div>{input}</div><div class="col-lg-10 col-lg-offset-2">{error}</div>',
                                'inputOptions' => [
                                    'align'=>'left'
                                ]
                            ]
                        ]); ?>
                            <?= $form->field($model, 'account')->textInput(['autofocus' => true])->label('身份证号'); ?>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('职员姓名'); ?>
                            <?= $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女'],['class'=>'control-label col-sm-1'])->label('性别'); ?>
                            <?= $form->field($model, 'age')->textInput(['autofocus' => true])->label('年龄'); ?>
                            <?= $form->field($model, 'tel')->textInput(['autofocus' => true])->label('联系方式'); ?>
                            <?= $form->field($model, 'priority')->radioList(['2'=>'超级管理员','1'=>'普通职员'],['class'=>'control-label col-sm-6'])->label('权限分配'); ?>
                            <?= $form->field($model, 'rights')->checkBoxList($rightsArray,['class'=>'control-label col-sm-6', 'align' => 'left'])->label('职权分配'); ?>
                            <div class="form-group">
                                <div class="col-sm-6" align="right">
                                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                    <?= Html::resetButton('重置', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
                                </div>
                            </div>                   
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   