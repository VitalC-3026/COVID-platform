<?php 

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 更新居民信息视图 view
*/

use frontend\assets\AppAsset_b;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\widgets\Alert;
AppAsset_b::addScript($this, 'assets/plugins/wizard/js/loader.min.js');
?>
<?= Alert::widget(); ?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <!-- TODO: 通过路由跳转地址 -->
                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li>信息录入</li>
                <li class="active">修改用户信息</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">修改用户</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">修改社区居民</h3>
                    <div class="actions pull-right">
                        <a href="<?= \yii\helpers\Url::to(['/backend/resident/index']); ?>"><i class="fa fa-reply"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h2 class="title">基本信息修改</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $form = ActiveForm::begin(['id' => 'resident-uform',
                            'options' => [
                                'class'=>'form-horizontal',
                                'style'=>'width: 80%; margin-left: 90px'
                            ],
                            'fieldConfig' => [
                                    'template' => '<div style="margin-bottom:10px">{label}</div><div>{input}</div><div class="col-lg-10 col-lg-offset-2">{error}</div>',
                            ],]); ?>
                        <?= $form->field($model, 'account')->textInput(['autofocus' => true, 'value' => $model->account, 'readonly' => true])->label('身份证号'); ?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('居民姓名'); ?>
                        <?= $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女'],['class'=>'control-label col-sm-1'])->label('性别'); ?>
                        <?= $form->field($model, 'age')->textInput(['autofocus' => true])->label('年龄'); ?>
                        <?= $form->field($model, 'tel')->textInput(['autofocus' => true])->label('联系方式'); ?>
                        <?= $form->field($model, 'unit')->textInput(['autofocus' => true])->label('单元号'); ?>
                        <?= $form->field($model, 'building')->textInput(['autofocus' => true])->label('楼号'); ?>
                        <?= $form->field($model, 'room')->textInput(['autofocus' => true])->label('房间号') ?>
                    
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