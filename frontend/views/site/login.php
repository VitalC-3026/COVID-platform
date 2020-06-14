<?php

/**
 * Team: NoCov
 * Coding by: 冯杰康
 * 登录视图 view
*/

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <!-- BEGIN: .cover -->
    <div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h1 class="mb-0 heading text-white">登录</h1>
                    <p class="mb-0 text-white">使用你注册的账号进行登录，之后你可以进入后台发布信息或者修改自己的账户信息。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-breadcrumns-23195 border-bottom">
        <div class="container">
            <a href="<?php echo Yii::$app->getHomeUrl(); ?>">主页</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">登录</span>
        </div>
    </div>
    <!-- END: .cover -->
    <div class="container">
        <p></p>
        <div class="row justify-content-between">
            <div class="col-lg-6 mb-4 mb-lg-0">


                <?php $form = ActiveForm::begin(['id' => 'login-form',
                    'fieldConfig' =>[
                        'errorOptions' => ['class' => 'text-danger']
                    ]
                ]); ?>
                <div class="form-group">
                    <?= $form->field($model, 'account',['labelOptions' => ['label' => '账户']])->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'password',['labelOptions' => ['label' => '密码']])->passwordInput() ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'rememberMe',['labelOptions' => ['label' => '自动登录']])->checkbox() ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>


</div>