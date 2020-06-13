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
            
            <div class="row"><h1 class="h1">个人主页</h1></div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">和你一起007的筒子</h3>
                        </div>                        
                        <div class="panel-body">
                            <div class="row" style="width: 95%; margin-left: 10px">
                                <div class="tab-wrapper tab-left" >
                                    <ul class="nav nav-tabs" margin-left="20px">
                                        <li class="active">
                                                <a href="#profile0" data-toggle="tab">
                                                    <?= sizeof($team) > 0 ? $team[0]['name'] : '无人' ?></a>
                                        </li>
                                        <li>
                                            <?php for($i = 1; $i < sizeof($team); $i++): ?>
                                            
                                                <a href="<?php echo '#profile'.$i ?>" data-toggle="tab">
                                                    <?= $team[$i]['name'] ?></a>
                                            
                                            <?php endfor ?>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile0">
                                            <div style="font-size: 20px"><i class="fa fa-comment">    看看Ta想说什么？</i></div>
                                            <p style="font-size: 15px"><?= sizeof($team) > 0 ? $team[0]['info'] : '无结果'; ?>
                                            </p>
                                        </div>
                                        <?php for($i = 1; $i < sizeof($team); $i++): ?>
                                            <div class="tab-pane" id="<?php echo 'profile'.$i ?>">
                                                <div style="font-size: 20px"><strong><i class="fa fa-comment">    看看Ta想说什么？</i></strong></div>
                                                <p style="font-size: 15px"><?= $team[$i]['info']; ?>
                                                </p>
                                            </div>
                                        <?php endfor ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                      
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">团队信息</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-body">
                                    <div class="row">
                                        <?php if($isLeader): ?>
                                            <?php $form = ActiveForm::begin(['id' => 'profile-form',
                                                'method' => 'post',
                                                'options' => [
                                                    'class'=>'form-horizontal'],
                                                'fieldConfig' => [
                                                    'template' => '<div>{label}</div><div>{input}</div><div class="col-lg-10">{error}</div><div class="col-lg-10">{hint}</div>',
                                                    'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                                    'inputOptions' => ['class'=>'form-control col-lg-6', 'align'=>'center', 'style'=>'width: 60%; max-width: 70%'],
                                            ],]); ?>
                                                <?= $form->field($teamForm, 'id')->textInput(['autofocus' => true, 'readonly' => true])->label('团队编号'); ?>
                                                <?= $form->field($teamForm, 'name')->textInput(['autofocus' => true])->label('团队名称'); ?>
                                                <?= $form->field($teamForm, 'abstract')->textArea()->label('团队简介'); ?>
                                                <?= $form->field($teamForm, 'gitCnt')->textInput()->label('git提交次数'); ?>
                                                <?= $form->field($teamForm, 'memCnt')->textInput()->label('成员总数'); ?>
                                                <?= $form->field($teamForm, 'days')->textInput()->label('开发天数'); ?>
                                                <?= $form->field($teamForm, 'files')->textInput()->label('文档总数'); ?>
                                                <div class="form-group">
                                                    <div class="col-sm-6" align="right">
                                                        <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                                        <?= Html::resetButton('重置', ['class' => 'btn btn-primary', 'name' => 'reset-button']) ?>
                                                    </div>
                                                    
                                                </div>
                                            <?php ActiveForm::end(); ?>
                                        <?php else: ?>
                                            <div class="row" style="width: 95%; margin-left: 10px">
                                                <div class="tab-wrapper tab-left" >
                                                    <ul class="nav nav-tabs" margin-left="20px">
                                                        <li class="active">
                                                                <a href="#description" data-toggle="tab">
                                                                    团队简介</a>
                                                        </li>
                                                        <li>                                
                                                            <a href="#experience" data-toggle="tab">
                                                                开发记录</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="description">
                                                            <div class="row" style="margin-left: 5px">
                                                                <div style="font-size: 20px">
                                                                    <i class="fa fa-bullhorn">    <?php echo $teamForm->name?></i>
                                                                </div>
                                                                <br>
                                                                <div style="font-size: 20px">
                                                                    <i class="fa fa-fire">    团队简介</i>
                                                                </div>
                                                                <div>
                                                                    <?php echo $teamForm->abstract?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="experience">
                                                            <div class="row" style="margin-left: 5px">
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <div style="font-size: 20px">
                                                                            <i class="fa fa-github">    git提交次数</i>
                                                                        </div>
                                                                        <div>
                                                                            算算你git的时候闯了几次祸?
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="wrapper">
                                                                            <div class="z">
                                                                            <?php echo $teamForm->gitCnt?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <div style="font-size: 20px">
                                                                            <i class="fa fa-group">    团队人数</i>
                                                                        </div>
                                                                        <div>
                                                                            我们总共有几个人?
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="wrapper">
                                                                            <div class="z">
                                                                            <?php echo $teamForm->memCnt?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <div style="font-size: 20px">
                                                                            <i class="fa fa-flag-o">    开发天数</i>
                                                                        </div>
                                                                        <div>
                                                                            想想你拖了ddl多少天?
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="wrapper">
                                                                            <div class="z">
                                                                            <?php echo $teamForm->days?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-7">
                                                                        <div style="font-size: 20px">
                                                                            <i class="fa fa-file-text">    文档总数</i>
                                                                        </div>
                                                                        <div>
                                                                            算算代码多还是文档多?
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="wrapper">
                                                                            <div class="z">
                                                                            <?php echo $teamForm->files?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <style>
                                                                    .wrapper{
                                                                        width: 60px;
                                                                        height:60px;
                                                                        background: #00000000;
                                                                        display: flex;
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                    }
                                                                     
                                                                    .z{
                                                                        display: inline-block;
                                                                        height: 40px;
                                                                        width: 40px;
                                                                        text-align: center;
                                                                        size: 20px;
                                                                        background: #F8F8F8;
                                                                        color: #000000;
                                                                        border-radius: 100%;
                                                                        margin: 6px;
                                                                        border: 2px solid #2fcbce;
                                                                        border-bottom-color: transparent;
                                                                        vertical-align: middle;
                                                                        -webkit-animation: rotate 1.5s linear infinite;
                                                                        animation: rotate 1.5s linear infinite;
                                                                    }
                                                                    @-webkit-keyframes rotate {
                                                                        0% {
                                                                            -webkit-transform: rotate(0deg);
                                                                        }
                                                                        50% {
                                                                            -webkit-transform: rotate(180deg);
                                                                        }
                                                                        100% {
                                                                            -webkit-transform: rotate(360deg);
                                                                        }
                                                                    }
                                                                    @keyframes rotate {
                                                                        0% {
                                                                            transform: rotate(0deg);
                                                                        }
                                                                        50% {
                                                                            transform: rotate(180deg);
                                                                        }
                                                                        100% {
                                                                            transform: rotate(360deg);
                                                                        }
                                                                    }
                                                                </style>

                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">个人信息</h3>
                        </div>
                        <div class="panel-body" align="center">
                            <div class="row" text-align="center">
                                <?php $form = ActiveForm::begin(['id' => 'profile-form',
                                    'options' => [
                                        'class'=>'form-horizontal',
                                        'align' => 'center',    
                                    ],
                                    'fieldConfig' => [
                                            'template' => '<div>{label}</div><div>{input}</div><div class="col-lg-10">{error}</div><div class="col-lg-10">{hint}</div>',
                                            'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                            'inputOptions' => ['class'=>'form-control col-lg-6', 'align'=>'center', 'style'=>'width: 60%; max-width: 70%'],
                                         ],]); ?>
                                    <?= $form->field($model, 'account')->textInput(['autofocus' => true, 'readonly' => true])->label('用户账号'); ?>
                                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'readonly' => true])->label('姓名')->hint('修改用户信息可在前台页面完成'); ?>
                                    <?= $form->field($model, 'id')->textInput(['autofocus' => true])->label('编号'); ?>
                                    <?= $form->field($model, 'link')->textInput(['autofocus' => true])->label('作业链接'); ?>
                                    <?= $form->field($model, 'info')->textArea(['autofocus' => true, 'style'=>'width: 60%; max-width: 70%'])->label('简介'); ?>
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
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">修改挂靠用户</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php $form = ActiveForm::begin(['id' => 'profile-form',
                                    'method' => 'post',
                                    'options' => [
                                        'class'=>'form-horizontal'],
                                    'fieldConfig' => [
                                            'template' => '<div>{label}</div><div>{input}</div><div class="col-lg-10">{error}</div><div class="col-lg-10 col-lg-offset-2">{hint}</div>',
                                            'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                            'inputOptions' => ['class'=>'form-control col-lg-6', 'align'=>'center', 'style'=>'width: 60%; max-width: 70%'],
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
            </div>
                       
        </div>
    </div>

</section>
