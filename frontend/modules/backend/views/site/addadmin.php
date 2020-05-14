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
                <li><a href="http://localhost:8080/web/index.php?r=backend%2Fsite%2Findex">首页</a>
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
                    <h3 class="panel-title">新增社区职员</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <h2 class="title">基本信息</h2>
                            </div>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'resident-form',
                            'options' => [
                                'class'=>'form-horizontal'],
                            'fieldConfig' => [
                                    'template' => "<div>{label}</div><div>{input}</div><div class='col-lg-10 col-lg-offset-2'>{error}</div>",
                                    'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                    'inputOptions' => ['class'=>'col-lg-6'],
                                 ],]); ?>
                                <?= $form->field($model, 'account')->textInput(['autofocus' => true])->label('身份证号'); ?>
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('职员姓名'); ?>
                                <?= $form->field($model, 'sex')->radioList(['1'=>'男','2'=>'女'],['class'=>'control-label col-sm-1'])->label('性别'); ?>
                                <?= $form->field($model, 'tel')->textInput(['autofocus' => true])->label('联系方式'); ?>
                                <?= $form->field($model, 'enterdate')->textInput(['autofocus' => true])->label('入职时间'); ?>
                                <?= $form->field($model, 'priority')->radioList(['1'=>'超级管理员','2'=>'职员'],['class'=>'control-label col-sm-1'])->label('权限分配'); ?>
                                <?= $form->field($model, 'rights')->checkBoxList(['1'=>'填写健康报表','2'=>'发布公告新闻','3' => '查看数据库'],['class'=>'control-label col-sm-1'])->label('职权分配'); ?>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-6" align="right">
                                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                    </div>
                                </div>
                                                           
                        <?php ActiveForm::end(); ?>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>