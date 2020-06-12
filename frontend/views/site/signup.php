<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <!-- BEGIN: .cover -->
    <div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h1 class="mb-0 heading text-white">注册</h1>
                    <p class="mb-0 text-white">成为社区人员时需要完成注册，这样你就可以使用自己的账号进行完成信息发布和信息获取工作。
                    账户使用自己的身份证号呦。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns-23195 border-bottom">
        <div class="container">
            <a href="<?php echo Yii::$app->getHomeUrl(); ?>">主页</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">注册</span>
        </div>
    </div>
    <!-- END: .cover -->
    <div class="container">
        <p></p>
        <div class="row">
            <div class="col">
                <h3 class="section-heading line-primary">快注册成为社区会员吧</h3>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-4 mb-lg-0">


                <?php $form = ActiveForm::begin(['id' => 'form-signup',
                    'fieldConfig' =>[
                    'errorOptions' => ['class' => 'text-danger']
                    ]

                ]); ?>
                <div class="form-group">
                    <?= $form->field($model, 'account',['labelOptions' => ['label' => '账户']])->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'username',['labelOptions' => ['label' => '用户名/昵称']])->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'tel',['labelOptions' => ['label' => '联系方式']])->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'name',['labelOptions' => ['label' => '真实姓名']])->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'age',['labelOptions' => ['label' => '年龄']])->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'sex',['labelOptions' => ['label' => '性别']])->radioList([1=>'男',0=>'女']) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'password',['labelOptions' => ['label' => '密码']])->passwordInput() ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>


</div>
