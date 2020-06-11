<?php
// @var $provider

use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

AppAsset_b::addCss($this, 'web/assets/plugins/dataTables/css/dataTables.css');
AppAsset_b::addScript($this, 'web/assets/plugins/nanoScroller/jquery.nanoscroller.min.js');
AppAsset_b::addScript($this, 'web/assets/plugins/dataTables/js/jquery.dataTables.js');
AppAsset_b::addScript($this, 'web/assets/plugins/dataTables/js/dataTables.bootstrap.js');
?>
<?= Html::csrfMetaTags() ?>
<div id="main-content">
  <div class="row">
      <div class="col-md-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb">
              <li><a href="#">首页</a>
              </li>
              <li>社区数据库</li>
              <li class="active">社区职员信息</li>
          </ul>
          <!--breadcrumbs end -->
          <div class="row">
              <div class="col-xs-6">
                  <h1 class="h1">社区职员信息</h1>
              </div>
              <div class="col-md-6" align="right">
                  <button id="addWorker" type="button" class="btn btn-primary" onclick="javascript:jump()">添加新职员</button>
                  <script type="text/javascript">
                      <?php //TODO: 通过路由跳转地址 ?>
                      function jump(){ window.location.href="<?= \yii\helpers\Url::to(['/backend/committee/create']); ?>"; }
                  </script>
              </div>
              
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">社区职员信息</h3>
                  <div class="actions pull-right">
                      <i class="fa fa-chevron-down"></i>
                      <i class="fa fa-times"></i>
                  </div>
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
                                  'headerOptions' => [
                                    'style' => 'width:60px;',
                                  ],
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
                                [
                                  'label' => '入职时间',
                                  'attribute' => 'committee.in_date',
                                  'format' => 'raw',
                                ],
                                [
                                  'label' => '等级',
                                  'attribute' => 'type',
                                  'format' => 'raw',
                                  'value' => function($data) {
                                      return ($data->type === 2) ? '超级管理员' : '普通管理员' ;
                                  }
                                ],
                                [
                                  'header' => '操作',
                                  'class' => 'yii\grid\ActionColumn',
                                  //设置显示模板
                                  'template' => '{update} {del}',
                                  //下面的按钮设置，与上面的模板设置相关联
                                  'buttons' => [
                                    'del' => function ($url, $model, $key) {
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->account], [
                                          'data' => [
                                              'confirm' => '您确定要删除这条信息?',
                                              'method' => 'post',
                                          ],
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
