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
                <div class="col-md-7">
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
                                                <p><?= sizeof($team) > 0 ? $team[0]['info'] : '无结果'; ?>
                                                </p>
                                            </div>
                                        <?php for($i = 1; $i < sizeof($team); $i++): ?>
                                            <div class="tab-pane" id="<?php echo 'profile'.$i ?>">
                                                <p><?= $team[$i]['info']; ?>
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

                                            <table border="1" cellspacing="30px" cellpadding="30px" align="center" style="border: 5px; " class="altrowstable control-label" id="alternatecolor">
                                                <tr>
                                                  <td class="control-label">团队名称</td>
                                                  <td><?php echo $teamForm->name ?></td>
                                                </tr>
                                                <tr>
                                                  <td>团队简介</td>
                                                  <td><?php echo $teamForm->id ?></td>
                                                </tr>
                                                <tr>
                                                  <td>git提交次数</td>
                                                  <td><?php echo $teamForm->gitCnt ?></td>
                                                </tr>
                                                <tr>
                                                  <td>成员数</td>
                                                  <td><?php echo $teamForm->memCnt ?></td>
                                                </tr>
                                                <tr>
                                                  <td>开发天数</td>
                                                  <td><?php echo $teamForm->days ?></td>
                                                </tr>
                                                <tr>
                                                  <td>文档总数</td>
                                                  <td><?php echo $teamForm->files ?></td>
                                                </tr>
                                            </table>
                                            <style type="text/css">
                                                table.altrowstable {
                                                    font-family: verdana,arial,sans-serif;
                                                    font-size:11px;
                                                    color:#333333;
                                                    border-width: 1px;
                                                    border-color: #a9c6c9;
                                                    border-collapse: collapse;
                                                }
                                                table.altrowstable th {
                                                    border-width: 1px;
                                                    padding: 8px;
                                                    border-style: solid;
                                                    border-color: #a9c6c9;
                                                }
                                                table.altrowstable td {
                                                    border-width: 1px;
                                                    padding: 8px;
                                                    border-style: solid;
                                                    border-color: #a9c6c9;
                                                }
                                                .oddrowcolor{
                                                    background-color:#d4e3e5;
                                                }
                                                .evenrowcolor{
                                                    background-color:#c3dde0;
                                                }
                                            </style>
                                            <script type="text/javascript">
                                                function altRows(id){
                                                    if(document.getElementsByTagName){ 
                                                         
                                                        var table = document.getElementById(id); 
                                                        var rows = table.getElementsByTagName("tr");
                                                          
                                                        for(i = 0; i < rows.length; i++){         
                                                            if(i % 2 == 0){
                                                                rows[i].className = "evenrowcolor";
                                                            }else{
                                                                rows[i].className = "oddrowcolor";
                                                            }     
                                                        }
                                                    }
                                                }
                                                 
                                                window.onload=function(){
                                                    altRows('alternatecolor');
                                                }
                                            </script>
                                        <?php endif ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
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
