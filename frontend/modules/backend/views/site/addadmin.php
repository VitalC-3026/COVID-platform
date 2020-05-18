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
                    <div class="row">
                        <div class="col-sm-3">
                            <h2 class="title">基本信息</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $form = ActiveForm::begin(['id' => 'admin-form',
                            'method' => 'post',
                            'options' => [
                                'class'=>'form-horizontal'],
                            'fieldConfig' => [
                                    'template' => "<div>{label}</div><div>{input}</div><div class='col-lg-10 col-lg-offset-2'>{error}</div>",
                                    'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                    'inputOptions' => ['class'=>'col-lg-6'],
                                 ],
                            ]); ?>
                                <?= $form->field($model, 'account')->textInput(['autofocus' => true])->label('身份证号'); ?>
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('职员姓名'); ?>
                                <?= $form->field($model, 'sex')->radioList(['1'=>'男','2'=>'女'],['class'=>'control-label col-sm-1'])->label('性别'); ?>
                                <?= $form->field($model, 'tel')->textInput(['autofocus' => true])->label('联系方式'); ?>
                                <?= $form->field($model, 'enterdate')->textInput(['autofocus' => true])->label('入职时间'); ?>
                                <?= $form->field($model, 'priority')->radioList(['1'=>'超级管理员','2'=>'职员'],['class'=>'control-label col-sm-2'])->label('权限分配'); ?>
                                <?= $form->field($model, 'rights')->checkBoxList(['1'=>'填写健康报表','2'=>'发布公告新闻','3' => '查看数据库'],['class'=>'control-label col-sm-2'])->label('职权分配'); ?>
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
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Modal</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </div>
</div>