<?php 
use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

AppAsset_b::addCss($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/css/dataTables.css');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/nanoScroller/jquery.nanoscroller.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/js/jquery.dataTables.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/dataTables/js/dataTables.bootstrap.js');
?>
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <!-- TODO: 通过路由跳转地址 -->
                <li><a href="http://localhost:80/yii2020/COVID-platform/frontend/web/index.php?r=backend%2Fsite%2Findex">首页</a>
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
                        function jump(){ window.location.href="http://localhost:8080/yii/COVID-platform/frontend/web/index.php?r=backend%2Fsite%2Faddres"; }
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
                                'columns' => [
                                  //复选框列
                                  ['class' => 'yii\grid\CheckboxColumn'],
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
                                    'label' => '单元号',
                                    'attribute' => 'resident.unit',
                                    'format' => 'raw',
                                  ],
                                  
                                  [
                                    'label' => '楼',
                                    'attribute' => 'resident.building',
                                    'format' => 'raw',
                                  ],
                                  [
                                    'label' => '房间号',
                                    'attribute' => 'resident.room',
                                    'format' => 'raw',
                                  ],
                                  [
                                    'header' => '操作',
                                    'class' => 'yii\grid\ActionColumn',
                                    //设置显示模板
                                    'template' => '{upd} {del}',
                                    //下面的按钮设置，与上面的模板设置相关联
                                    'buttons' => [
                                      'upd' => function ($model) {
                                        return '<a href="' . Url::toRoute(['test/upd']) . '" rel="external nofollow" class="btn btn-warning">修改</a>';
                                      },
                                      'del' => function ($model) {
                                        return '<a href="' . Url::toRoute(['test/del']) . '" rel="external nofollow" class="btn btn-danger">删除</a>';
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
