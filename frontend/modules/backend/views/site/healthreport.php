<?php 
use frontend\assets\AppAsset_b;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

AppAsset_b::addScript($this, 'web/assets/plugins/nanoScroller/jquery.nanoscroller.min.js"');
?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="#">首页</a>
                </li>
                <li>同心协力战疫情</li>
                <li class="active">健康信息填报</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">健康信息填报</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong align="center">细心填报，大家安心！</strong>
                <p><?php echo $this->params['info']?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">健康日报</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div align="center">
                        <?php $form = ActiveForm::begin(['id' => 'health-form',
                                 'method' => 'post',
                                 'options' => [
                                     'class'=>'form-horizontal'],
                                 'fieldConfig' => [
                                     'template' => "<div>{label}</div><div>{input}</div><div class='col-lg-12' align='center'>{error}</div>",
                                     'labelOptions' => ['class'=>'col-lg-3 control-label' ],
                                     'inputOptions' => ['class'=>'col-lg-6'],
                                 ],
                                ]); ?>

                                <?= $form->field($model, 'account')->textInput(['autofocus' => true])->label('身份证号'); ?>
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('姓名'); ?>
                                <?= $form->field($model, 'age')->textInput(['autofocus'=>true],['class'=>'col-sm-2'])->label('年龄'); ?>
                                <?= $form->field($model, 'sex')->radioList(['1'=>'男','2'=>'女'],['class'=>'control-label col-sm-1'])->label('性别'); ?>
                                <?= $form->field($model, 'tel')->textInput(['autofocus' => true])->label('联系方式'); ?>
                                <?= $form->field($model, 'temperature')->textInput(['autofocus' => true])->label('今日体温'); ?>
                                <?= Html::activeHiddenInput($model,'createTime',array('value'=> $this->params['time'])) ?>
                                <div class="row">
                                    <div class="col-sm-6" align="right">
                                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                    </div>
                                </div>                                                         
                                    <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="panel-footer"><?php echo $this->params['time'];?></div>
            </div>
        </div>
</section>