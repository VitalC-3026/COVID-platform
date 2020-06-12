<?php 
use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\helpers\BaseArrayHelpers;
use common\widgets\Alert;

AppAsset_b::addCss($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/css/dataTables.css');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/nanoScroller/jquery.nanoscroller.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/js/jquery.dataTables.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/js/dataTables.bootstrap.js');
?>
<?= Html::csrfMetaTags() ?>
<?= Alert::widget() ?>
<?php if(\Yii::$app->getSession()->hasFlash('success')):?>
        <script>
            alert("<?php echo \Yii::$app->getSession()->getFlash('success')?>");
        </script>
<?php endif?>
 
<?php if(\Yii::$app->getSession()->hasFlash('error')):?>
    <script>
        alert("<?php echo \Yii::$app->getSession()->getFlash('error')?>");
    </script>
<?php endif?>
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <!-- TODO: 通过路由跳转地址 -->
                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li>社区数据库</li>
                <li class="active">分配职员权限</li>
            </ul>
            <!--breadcrumbs end -->
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h1">分配职员权限</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">分配职员权限</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div role="grid" id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
                    
                        <div class="row" margin="10px">
                            <?php $form = ActiveForm::begin(); ?>
                                <div style="margin-left: 20px; margin-bottom: 10px">
                                    <?= $form->field($searchForm, 'account')->textInput(['autofocus' => true, 'placeholder' => '请输入职员编号'])->label('') ?>
                                    <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div role="grid" id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
                            <div class="row">
                              <div class="col-lg-6">
                                <?php echo GridView::widget([
                                  //设置GridView的ID
                                  'id' => 'committeeRightsGridView',
                                  //设置数据提供器
                                  'dataProvider' => $provider,
                                  /*//设置筛选模型
                                  'filterModel' => $model,*/
                                  'emptyText' => '数据库中无数据',
                                  'showOnEmpty' => true,
                                  'summary' => '',
                                  'columns' => [
                                    [
                                      'label' => '姓名',
                                      'attribute' => 'name',
                                      'format' => 'raw',
                                    ],
                                    [
                                      'label' => '性别',
                                      //设置筛选选项
                                      'filter' => [1 => '男', 0 => '女'],
                                      'attribute' => 'sex',
                                      'format' => 'raw',
                                      'value' => function($data){
                                        return ($data->sex === 1) ? '男' : '女';
                                      },
                                    ],
                                    [
                                      'label' => '年龄',
                                      'attribute' => 'age',
                                      'format' => 'raw',
                                      'headerOptions' => [
                                        'style' => 'width:60px;',
                                      ],
                                    ],
                                    [
                                      'label' => '联系方式',
                                      'attribute' => 'tel',
                                      'format' => 'raw',
                                    ],

                                  ],
                                ]); ?>
                              </div>
                              <div class="col-lg-4-offset-2 col-md-6">
                                  <?php $form = ActiveForm::begin([
                                        'id' => 'rights-form',
                                        
                                        'fieldConfig' => [
                                            'template' => '<div class="row"><div class="col-md-4">{label}</div><div class="col-md-6-offset-2">{error}</div></div><hr>{input}',
                                            'options' => ['class' => 'form-horizontal'],
                                        ]
                                    ]); ?>
                                    
                                    <?= $form->field($rightsForm, 'rights[]')->checkboxList($rightsArray, ['value' => $oldRights])->label('权限分配'); ?>

                                    <div class="form-group" text-align="right">
                                        
                                        <?= Html::submitButton('确认提交', ['class' => 'btn btn-primary']) ?>
                                        
                                    </div>
                                    <?= Html::activeHiddenInput($rightsForm,'account',['value' => $id]) ?>
                                <?php ActiveForm::end(); ?>
                              </div>
                            </div>
                        </div>

                        <div class="panel panel-default" margin-top="50px">
                            <div class="panel-heading">
                                <h3 class="panel-title">职权简介</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                
                                <?php echo ListView::widget([
                                    'dataProvider' => $priorityProvider,
                                    'itemView' => 'priorityList',
                                    'viewParams' => [
                                    ],
                                    'layout' => '{items}',
                                    'itemOptions' => [
                                        'tag' => 'div',
                                        'class' => 'col-lg-12'
                                    ],
                                    'pager' => [
                                        'firstPageLabel' => '首页',
                                        'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>',
                                        'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>',
                                        'lastPageLabel' => '尾页'
                                    ]
                                ]); ?>                                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
