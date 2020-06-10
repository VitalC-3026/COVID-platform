<?php 
use frontend\assets\AppAsset_b;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

AppAsset_b::addCss($this, 'web/assets/plugins/icheck/css/_all.css');
?>
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
        <div class="col-md-5 col-sm-12" id="inbox-wrapper">

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
                                'maxButtonCount' => 5,
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
        <div class="col-md-7 col-sm-12" id="view-mail-wrapper">
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
                                <button class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> 发布</button>

                                <button class="btn btn-danger btn-sm tooltips" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title="Trash"><i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel view-mail-body">
                                <div class="panel-body">
                                    <p><?php echo $this->params['news']->content  ?></p>
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

<script>
    $(document).ready(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
        $('.tooltips').tooltip()
        $('.textarea').wysihtml5();
        $('.ccLink').click(function() {
            $(this).hide();
            $('#form-group-cc').slideDown();
        });
        $('.bccLink').click(function() {
            $(this).hide();
            $('#form-group-bcc').slideDown();
        });

    });
</script>