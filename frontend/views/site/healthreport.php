<?php

use frontend\assets\AppAsset_b;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="site-modify">
    <!-- BEGIN: .cover -->
    <div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h1 class="mb-0 heading text-white">健康日报</h1>
                    <p class="mb-0 text-white">请每天按时填写您的健康状况，方便我们实时统计小区的疫情状况，如有身体不适请尽快联系医生。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <?php
                if (isset($message))
                    echo "<h5 class=\"text-danger\">" . $message . "</h5>";
                ?>
            </div>
        </div>
    </div>
    <div class="custom-breadcrumns-23195 border-bottom">
        <div class="container">
            <a href="<?php echo Yii::$app->getHomeUrl(); ?>">主页</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">健康日报</span>
        </div>
    </div>
    <!-- END: .cover -->
    <div class="container">

        <div class="row">
            <div class="col">
                <h3 class="section-heading line-primary">细心填报，大家安心！</h3>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-lg-6 mb-4 mb-lg-0">


                <?php $form = ActiveForm::begin(['id' => 'modify-form',
                    'fieldConfig' => [
                        'errorOptions' => ['class' => 'text-danger']
                    ]
                ]); ?>


                <div class="form-group">
                    <?= $form->field($model, 'account')->textInput(['autofocus' => true, 'value' => Yii::$app->user->getIdentity()->account, 'readOnly' => true])->label('身份证号'); ?>

                </div>
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'value' => Yii::$app->user->getIdentity()->name, 'readOnly' => true])->label('真实姓名'); ?>

                </div>

                <div class="form-group">
                    <?= $form->field($model, 'age')->textInput(['autofocus' => true, 'value' => Yii::$app->user->getIdentity()->age, 'readOnly' => true])->label('年龄'); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'tel')->textInput(['autofocus' => true, 'value' => Yii::$app->user->getIdentity()->tel, 'readOnly' => true])->label('联系方式'); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'temperature')->textInput(['autofocus' => true])->label('今日体温'); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'createTime')->textInput(['autofocus' => true, 'value' => $this->params['time'], 'readOnly' => true])->label('填写时间'); ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('提交修改', ['class' => 'btn btn-primary', 'name' => 'modify-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>


            <div class="col-lg-6 pl-lg-5">
                <!-- BEGIN: .quick-contact-info-91921 -->
                <div class="quick-contact-info-91921 mb-5">

                    <h3 class="section-heading heading-xs mb-4 line-primary">社区信息</h3>

                    <ul class="list-unstyled">
                        <li class="d-flex w-100">
                            <div class="wrap-icon">
                                <span class="icon-room"></span>
                            </div>
                            <div>
                                <span class="d-block">社区地址：</span>
                                <strong>平安市 平安路 平安胡同 平安小区</strong>
                            </div>
                        </li>

                        <li class="d-flex w-100">
                            <div class="wrap-icon">
                                <span class="icon-phone"></span>
                            </div>
                            <div>
                                <span class="d-block">电话联系：</span>
                                <a href="tel://01123456214">110 120 119</a>
                            </div>
                        </li>

                        <li class="d-flex w-100">
                            <div class="wrap-icon">
                                <span class="icon-envelope"></span>
                            </div>
                            <div>
                                <span class="d-block">邮件联系：</span>
                                <a href="mailto:email@mydomain.com">这是个邮箱@南开.com</a>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- END: .quick-contact-info-91921 -->

                <div class="d-block mb-5">
                    <h3 class="section-heading heading-xs mb-4 line-primary">社区医务室开放时间</h3>
                    <p>
                        周一 ~ 周日 <br>
                        7:00 ~ 21:00
                    </p>

                </div>

                <!-- END: .social-wrap -->
                <div class="d-block social-wrap">
                    <h3 class="section-heading heading-xs mb-4 line-primary">关注我们</h3>
                    <ul class="list-unstyled d-flex social-29021 primary">
                        <li><a href="#"><span class="icon-qq"></span></a></li>
                        <li><a href="#"><span class="icon-weixin"></span></a></li>
                        <li><a href="#"><span class="icon-weibo"></span></a></li>
                        <li><a href="#"><span class="icon-television"></span></a></li>
                    </ul>
                </div>
                <!-- END: .social-wrap -->

            </div>
        </div>
    </div>
</div>