<?php
use frontend\assets\AppAsset_b;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

AppAsset_b::addCss($this, 'yii/COVID-platform/frontend/web/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css');
/*AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/ckeditor/ckeditor.js');*/
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/bootstrap-wysihtml5/js/bootstrap3-wysihtml5.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/ckeditor/ckeditor.js');
?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li>信息发布</li>
                <li class="active">信息编辑</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">图文信息</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'news-edit',
                        'fieldConfig' =>[
                            'errorOptions' => ['class' => 'text-danger']
                        ]
                    ]); ?>
                    <div class="form-group">
                        <?= $form->field($model, 'title',['labelOptions' => ['label' => '标题']])->textInput(['class' => 'textarea form-control', 'autofocus' => true]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'abstract',['labelOptions' => ['label' => '摘要']])->textArea(['class' => ' form-control', 'autofocus' => true, 'sytle' => 'max-width: 100%']) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'content',['labelOptions' => ['label' => '正文内容']])->textArea(['class' => 'form-control ckeditor', 'autofocus' => true, 'placeholder' => '请输入文字 ...', 'style' => 'max-width: 100%']) ?>
                    </div>
                    <div class="row" style="margin: 10px" align="right">
                        <?= Html::submitButton('提交审核', ['class' => 'btn btn-primary', 'name' => 'submitButton']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>