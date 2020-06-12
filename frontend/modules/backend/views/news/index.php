<?php 
use frontend\assets\AppAsset_b;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

AppAsset_b::register($this);
AppAsset_b::addCss($this, 'web/assets/plugins/icheck/css/_all.css');
?>
<?= Html::csrfMetaTags() ?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="#">首页</a>
                </li>
                <li>信息发布</li>
                <li class="active">信息审核</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">信息审核</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12" id="inbox-wrapper">

            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h3 class="gen-case">待审核消息
                    </h3>
                </header>
                <div class="panel-body minimal">
                    <hr style="width: 100%">
                    <div>
                        <?php echo ListView::widget([
                            'dataProvider' => $provider,
                            'itemView' => 'newsList',
                            'viewParams' => [
                            ],
                            'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
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
            </section>

        </div>
        <div class="col-md-6 col-sm-12" id="view-mail-wrapper">
            <div class="panel">
                <div class="panel-body">
                    <header>
                        <h2 class="gen-case" style="color: #484848">新闻公告</h2>
                        <p class="pull-right"><?php echo $this->params['time'];  ?></p>
                    </header>
                    <div class="row view-mail-header">
                        <div class="col-md-8 ">
                            <img src="assets/img/avatar4.gif" alt="" class="img-circle">
                            <strong><?= Yii::$app->user->identity->username ?></strong>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="view-mail-reply pull-right">
                                <?= Html::a('<span class="glyphicon glyphicon-check"></span>', ['publish', 'id' => $id], ['title' => '通过']) ?>

                                <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $id], [
                                    'title' => '删除',
                                    'data' => [
                                        'confirm' => '您确定要删除吗？',
                                        'method' => 'post',
                                    ] 
                                ]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel view-mail-body">
                                <div class="panel-body">
                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [                                           
                                            ['attribute' => 'title',
                                            'label' => '标题'],                                           
                                            ['attribute' => 'abstract',
                                            'label' => '摘要',],
                                            ['attribute' => 'content',
                                            'label' => '正文内容'],
                                            ['attribute' => 'date',
                                            'label' => '修改时间',
                                            'value' => $model->getDateTime(), 
                                            ],
                                        ],
                                        'template' => '<tr style = "border: 10px; width: 100%"><th style="height: 50px; width: 100px"><strong>{label}</strong></th><td style = "height: 50px; width: 80%"" text-align="center"><div align="center">{value}</div></td></tr>', 
                                        'options' => ['class1' => 'table table-striped table-bordered',
                                            'style' => 'border: 2px'
                                        ],

                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    <!--mail wrapper end-->
</section>