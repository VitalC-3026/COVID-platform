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
                <li>同心协力站疫情</li>
                <li class="active">体温异常人员信息</li>
            </ul>
            <!--breadcrumbs end -->
            <div class="row">
                <div class="col-xs-6">
                    <h1 class="h1">体温异常人员信息</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">体温异常人员信息</h3>
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
                                    'id' => 'healthGridView',
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
                                            'label' => '今日体温',
                                            'attribute' => '℃',
                                            'format' => 'raw',
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
