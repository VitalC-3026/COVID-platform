<?php
// @var $provider
/**
 * Team: NoCov
 * Coding by: 文静静
 * 温度异常人员数据库视图 view
*/

use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use common\widgets\Alert;

AppAsset_b::addCss($this, 'web/assets/plugins/dataTables/css/dataTables.css');
AppAsset_b::addScript($this, 'web/assets/plugins/nanoScroller/jquery.nanoscroller.min.js');
AppAsset_b::addScript($this, 'web/assets/plugins/dataTables/js/jquery.dataTables.js');
AppAsset_b::addScript($this, 'web/assets/plugins/dataTables/js/dataTables.bootstrap.js');
?>
<?= Html::csrfMetaTags() ?>
<?= Alert::widget() ?>
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li>同心协力战疫情</li>
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
                                            'label' => '姓名',
                                            'attribute' => 'username',
                                            'format' => 'raw',
                                            'headerOptions' => [
                                                'style' => 'width:180px;',
                                            ],
                                        ],
                                        [
                                            'label' => '年龄',
                                            'attribute' => 'age',
                                            'format' => 'raw',
                                            'headerOptions' => [
                                                'style' => 'width:180px;',
                                            ],
                                        ],
                                        [
                                            'label' => '性别',
                                            //设置筛选选项
                                            'filter' => [1 => '男', 0 => '女'],
                                            'attribute' => 'sex',
                                            'format' => 'raw',
                                            'value' => function ($data) {
                                                return ($data->sex === 1) ? '男' : '女';
                                            },
                                            'headerOptions' => [
                                                'style' => 'width:180px;',
                                            ],
                                        ],
                                        [
                                            'label' => '联系方式',
                                            'attribute' => 'tel',
                                            'format' => 'raw',
                                            'headerOptions' => [
                                                'style' => 'width:180px;',
                                            ],
                                        ],
                                        [
                                            'label' => '填报日期',
                                            'attribute' => 'health.last_date',
                                            'format' => 'raw',
                                            'headerOptions' => [
                                                'style' => 'width:180px;',
                                            ],
                                        ],
                                        [
                                            'label' => '体温',
                                            'attribute' => 'health.temperature',
                                            'format' => 'raw',
                                            'headerOptions' => [
                                                'style' => 'width:180px;',
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
