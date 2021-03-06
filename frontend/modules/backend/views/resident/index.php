<?php

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 居民数据库视图 view
*/
// @var $provider
use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Resident;
use common\widgets\Alert;

AppAsset_b::addCss($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/css/dataTables.css');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/nanoScroller/jquery.nanoscroller.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/js/jquery.dataTables.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/js/dataTables.bootstrap.js');
?>
<?= Html::csrfMetaTags() ?>
<?= Alert::widget() ?>
<div id="main-content">
  <div class="row">
      <div class="col-md-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
              <!-- TODO: 通过路由跳转地址 -->

              <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
              </li>
              <li>社区数据库</li>
              <li class="active">社区居民信息</li>
          </ul>
          <!--breadcrumbs end -->
          <div class="row">
              <div class="col-md-6">
                  <h1 class="h1">社区居民信息</h1>
              </div>
              <div class="col-md-6" align="right">
                  <button id="addRes" type="button" class="btn btn-primary" name="addNewRes" onclick="javascript:jump()">添加新居民</button>
                  <script type="text/javascript">
                      <?php //TODO: 通过路由跳转地址 ?>
                      function jump(){ window.location.href="<?= \yii\helpers\Url::to(['/backend/resident/create']); ?>"; }
                  </script>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">居民信息</h3>
              </div>
              <div class="panel-body">
                  
                  <div role="grid" id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
                      <div class="row">
                          <div class="col-lg-12">
                            <?php echo GridView::widget([
                              //设置GridView的ID
                              'id' => 'residentGridView',
                              //设置数据提供器
                              'dataProvider' => $provider,
                              //设置筛选模型
                              'filterModel' => $model,
                              'emptyText' => '无结果',
                              'summary' => '第{page}页，共{pageCount}页，{totalCount}条数据',
                              'columns' => [
                                //显示序号列
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                  //设置字段显示标题
                                  'label' => '身份证号码',
                                  //字段名
                                  'attribute' => 'account',
                                  //格式化
                                  'format' => 'raw',
                                  //设置单元格样式
                                  'headerOptions' => [
                                    'style' => 'width:180px;',
                                  ],
                                ],
                                [
                                  'label' => '姓名',
                                  'attribute' => 'username',
                                  'format' => 'raw',
                                  'value' => function($data) {
                                      return ($data->username !== null) ? $data->username : '' ;
                                  },
                                  'headerOptions' => [
                                    'style' => 'width:100px;',
                                  ],
                                  'contentOptions' => [
                                      'width'=>'120px'
                                  ]
                                ],
                                [
                                  'label' => '性别',
                                  'attribute' => 'sex',
                                  'format' => 'raw',
                                  'value' => function($data){
                                    return ($data->sex === 1) ? '男' : '女';
                                  },
                                  'headerOptions' => [
                                    'style' => 'width:80px;',
                                  ],
                                ],
                                [
                                  'label' => '年龄',
                                  'attribute' => 'age',
                                  'format' => 'raw',
                                  'headerOptions' => [
                                    'style' => 'width:80px;',
                                  ],
                                  'contentOptions' => [
                                      'width'=>'80px'
                                  ],
                                  'value' => function($data) {
                                      return ($data->age !== null) ? $data->age : '' ;
                                  },
                                ],
                                [
                                  'label' => '联系方式',
                                  'attribute' => 'tel',
                                  'format' => 'raw',
                                  'value' => function($data) {
                                      return ($data->tel !== null) ? $data->tel : '' ;
                                  },
                                  'headerOptions' => [
                                    'style' => 'width:150px;',
                                  ],
                                ],

                                [
                                  'label' => '单元号',
                                  'attribute' => 'resident.unit',
                                  'format' => 'raw',
                                  'headerOptions' => [
                                    'style' => 'width:60px;',
                                  ],
                                  'contentOptions' => [
                                      'width'=>'80px'
                                  ]
                                ],
                                
                                [
                                  'label' => '楼',
                                  'attribute' => 'resident.building',
                                  'format' => 'raw',
                                  'headerOptions' => [
                                    'style' => 'width:80px;',
                                  ],
                                ],
                                [
                                  'label' => '房间号',
                                  'attribute' => 'resident.room',
                                  'format' => 'raw',
                                  'headerOptions' => [
                                    'style' => 'width:120px;',
                                  ],
                                ],
                                [
                                  'header' => '操作',
                                  'class' => 'yii\grid\ActionColumn',
                                  'headerOptions' => [
                                    'style' => 'width:60px;',],
                                  //设置显示模板
                                  'template' => '{update} {delete}',
                                  //下面的按钮设置，与上面的模板设置相关联
                                  'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                      return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->account], [
                                        'data' => [
                                            'method' => 'post',
                                        ]
                                      ]);
                                    },
                                    'delete' => function ($url, $model, $key) {
                                      return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->account], [
                                        'data' => [
                                            'confirm' => '删除将导致永久丢失信息，您确定要删除？',
                                            'method' => 'post',
                                        ]
                                      ]);
                                    },
                                  ],
                                ],
                              ],
                            ]); ?>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
