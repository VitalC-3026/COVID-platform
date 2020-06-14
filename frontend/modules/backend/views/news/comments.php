<?php
// @var $provider
/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 评论审核视图 view
*/

use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use common\widgets\Alert;

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
              <li>信息发布</li>
              <li class="active">评论审核</li>
          </ul>
          <!--breadcrumbs end -->
          <div class="row">
              <div class="col-xs-6">
                  <h1 class="h1">评论列表</h1>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">待审核评论</h3>
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
                                  'label' => '新闻编号',
                                  //字段名
                                  'attribute' => 'New_id',
                                  //格式化
                                  'format' => 'raw',
                                ],
                                [
                                  //设置字段显示标题
                                  'label' => '新闻标题',
                                  //字段名
                                  'attribute' => 'news.title',
                                  //格式化
                                  'format' => 'raw',
                                ],
                                [
                                  //设置字段显示标题
                                  'label' => '新闻摘要',
                                  //字段名
                                  'attribute' => 'news.abstract',
                                  //格式化
                                  'format' => 'raw',
                                ],
                                [
                                  'label' => '评论内容',
                                  'attribute' => 'content',
                                  'format' => 'raw',
                                ],
                                [
                                  'label' => '评论人',
                                  'attribute' => 'author',
                                  'format' => 'raw',
                                  'headerOptions' => [
                                    'style' => 'width:180px;',
                                  ],
                                ],
                                [
                                  'header' => '操作',
                                  'class' => 'yii\grid\ActionColumn',
                                  //设置显示模板
                                  'template' => '{update}',
                                  //下面的按钮设置，与上面的模板设置相关联
                                  'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                        return Html::a('<i class="fa fa-check"></i>', ['check', 'id' => $model->id]
                                      );
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
