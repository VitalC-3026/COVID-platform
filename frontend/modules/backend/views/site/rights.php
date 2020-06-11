<?php 
use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;

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
                    
                        <div class="row" margin-top="10px">
                            <?php $form = ActiveForm::begin(); ?>
                                <?= $form->field($searchForm, 'account')->textInput(['autofocus' => true])->label('身份证号') ?>
                                <div class="form-group">
                                    <div class="col-sm-6" align="right">
                                        <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
                                    </div>
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
                              <div class="col-lg-6">
                                  <?php $form = ActiveForm::begin([
                                        'id' => 'rights-form',
                                        'options' => ['class' => 'form-horizontal'],
                                    ]); ?>
                                    <?= $form->field($rightsForm, 'rights')->checkboxList($rights, ['value' => $oldRights]); ?>
                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-11">
                                            <?= Html::submitButton('确认', ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </div>
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
                                <!-- <div class="panel-group accordion" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Collapsible Group Item #1</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Collapsible Group Item #2</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Collapsible Group Item #3</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
