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
                <li><a href="http://localhost:80/yii2020/COVID-platform/frontend/web/index.php?r=backend%2Fsite%2Findex">首页</a>
                </li>
                <li>信息录入</li>
                <li class="active">新增用户信息</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">新增用户</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">新增社区居民</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h2 class="title">基本信息</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $form = ActiveForm::begin(['id' => 'resident-form',
                            'options' => [
                                'class'=>'form-horizontal'],
                            'fieldConfig' => [
                                    'template' => "<div>{label}</div><div>{input}</div><div class='col-lg-10 col-lg-offset-2'>{error}</div>",
                                    'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                    'inputOptions' => ['class'=>'col-lg-6'],
                                 ],]); ?>
                        <?= $form->field($model, 'account')->textInput(['autofocus' => true])->label('身份证号'); ?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('居民姓名'); ?>
                        <?= $form->field($model, 'sex')->radioList(['1'=>'男','2'=>'女'],['class'=>'control-label col-sm-1'])->label('性别'); ?>
                        <?= $form->field($model, 'age')->textInput(['autofocus' => true])->label('年龄'); ?>
                        <?= $form->field($model, 'tel')->textInput(['autofocus' => true])->label('联系方式'); ?>
                        <?= $form->field($model, 'unit')->textInput(['autofocus' => true])->label('单元号'); ?>
                        <?= $form->field($model, 'building')->textInput(['autofocus' => true])->label('楼号'); ?>
                        <?= $form->field($model, 'room')->textInput(['autofocus' => true])->label('房间号') ?>
                    
                        <div class="form-group">
                            <div class="col-sm-6" align="right">
                                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                            </div>
                        </div>
                                                           
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>