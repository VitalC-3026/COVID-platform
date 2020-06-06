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
                    <div class="mail-option">
                        <div class="btn-group">
                            <a data-original-title="Refresh" data-placement="top" data-toggle="tooltip" href="#" class="btn btn-info btn-sm tooltips">
                                <i class=" fa fa-refresh"></i>
                            </a>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown">
                               批量通过
                            </button>
                        </div>

                    </div>
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
                    <!-- <div class="table-responsive">
                        <table class="table table-inbox table-hover">
                            <tbody>
                                <tr class="unread">
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Dribbble</span>
                                            [Dribbble] Work Inquiry from Google Inc.</a>
                                    </td>
                                    <td class="text-right">April 20 <i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr class="unread">
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">James Bagian</span>
                                            Development - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 20
                                        <span class="label label-danger pull-right">urgent</span>
                                    </td>
                                </tr>
                                <tr class="unread">
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Jeffrey Ashby</span>
                                            Progress - Sed ut perspiciatis unde omnis iste natus..</a>
                                    </td>
                                    <td class="text-right">April 20 <i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr class="unread">
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">John Douey</span>
                                            Touch Base - Reprehenderit qui in ea voluptate velit esse quam</a>
                                    </td>
                                    <td class="text-right">April 20</td>
                                </tr>
                                <tr class="unread">
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ellen Baker</span>
                                            Timeline - Nam libero tempore, cum soluta nobis</a>
                                    </td>
                                    <td class="text-right">April 20
                                        <span class="label label-info pull-right">save</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            New Follower - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19<i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">John Doue</span>
                                            UX Perspective - Reprehenderit qui in ea voluptate velit esse quam</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Mailchimp - Sed ut perspiciatis unde omnis iste natus..</a>
                                    </td>
                                    <td class="text-right">April 19<i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Design Work - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19
                                        <span class="label label-warning pull-right">social</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ellen Baker</span>
                                            Freelance - Sed ut perspiciatis unde omnis iste natus</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Timeline - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">James Bagian</span>
                                            Check it - Maiores alias consequatur aut perferendis doloribus</a>
                                    </td>
                                    <td class="text-right">April 19<i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Bookmark this - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19
                                        <span class="label label-danger pull-right">urgent</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Lunch? - Nam libero tempore, cum soluta nobis</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Coffee Break - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ellen Baker</span>
                                            Beta testing - Praesentium voluptatum deleniti atque corrupti quos</a>
                                    </td>
                                    <td class="text-right">April 19<i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Prod Servers - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Design Work - Omnis voluptas assumenda est, omnis dolor repellendus</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Authentic Goods - Culpa qui officia deserunt mollitia animi, id est laborum et</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">John Doue</span>
                                            SASS Work - Elit vitae ridiculus nonummy vestibulum</a>
                                    </td>
                                    <td class="text-right">April 19<i class="fa fa-paperclip"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="mail-checkbox">
                                    </td>
                                    <td><i class="fa fa-star-o"></i>
                                    </td>
                                    <td class="message">
                                        <a href="#">
                                            <span class="title">Ivan Bella</span>
                                            Almost there - Reiciendis voluptatibus maiores alias consequatur aut</a>
                                    </td>
                                    <td class="text-right">April 19</td>
                                </tr>

                            </tbody>
                        </table>
                    </div> -->
                </div>
            </section>

        </div>
        <div class="col-md-7 col-sm-12" id="view-mail-wrapper">
            <div class="panel">
                <div class="panel-body">
                    <header>
                        <h2 class="gen-case" style="color: #484848">图文消息</h2>
                        <p class="pull-right"><?php echo $this->params['time'];  ?></p>
                    </header>
                    <div class="row view-mail-header">
                        <div class="col-md-8 ">
                            <img src="assets/img/avatar4.gif" alt="" class="img-circle">
                            <strong>Ivan Bella</strong>
                            
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
                                    <p>Hello Mike,</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                    <p>Regards,
                                        <br>Ivan Bella</p>
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