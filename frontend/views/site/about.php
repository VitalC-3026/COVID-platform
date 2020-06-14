<?php

/**
 * Team: NoCov
 * Coding by: 冯杰康
 * 关于团队视图 view
*/

$tmp = \common\models\Team::findAll(['id' => 1]);
if (sizeof($tmp) != 0)
    $tmp = $tmp[0];
else $tmp = null;

$leader = \common\models\TeamMember::findOne(['is_Leader' => 1]);
$leader_user = null;
if ($leader != null)
    $leader_user = \common\models\User::findIdentity($leader->account);

$teamers = \common\models\TeamMember::findAll(['is_Leader' => 0]);
$teamers_user = [];
if (sizeof($teamers) != 4)
    $teamers = null;
else {
    for ($i = 0; $i < 4; $i++)
        $teamers_user[]=\common\models\User::findIdentity($teamers[$i]->account);
}
?>

<!-- BEGIN: .cover -->
<div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h1 class="mb-0 heading text-white">关于我们</h1>
                <p class="mb-0 text-white">本页面用来介绍我们的团队，下面也展示了我们团队的每个人的个人作业链接地址和团队的整体介绍。对于网站的任何问题都可以通过邮件联系我们。</p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns-23195 border-bottom">
    <div class="container">
        <a href="<?php echo Yii::$app->getHomeUrl(); ?>">主页</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">关于</span>
    </div>
</div>
<!-- END: .cover -->


<!-- BEGIN: #main -->
<div id="main">
    <!-- BEGIN: .site-section -->
    <div class="site-section section-29101 overflow-hidden">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-md-6 mb-5 mb-lg-0 pb-3">
                    <figure class="figure-shadow mb-0">
                        <a href="https://vimeo.com/45830194" class="video-play-button bottom" data-fancybox=""
                           data-ratio="2">
                            <span class="icon icon-play"></span>
                        </a>
                        <div class="bg"></div>
                        <img src="<?= $leader == null ? 'assets/frontend/images/person_man_1.jpg' : $leader->icon ?>"
                             alt="Image" class="img-fluid">
                    </figure>
                </div>

                <div class="col-md-6 pl-md-5">
                    <h3 class="section-heading line-primary mb-4  ">团队简介</h3>
                    <p><?= $tmp == null ? "你的数据库没有团队简介" : $tmp->abstract ?></p>

                    <blockquote class="blockquote-19210">

                        <p>早发现、早报告、早诊断、早隔离、早治疗!</p>
                        <p class="mb-0 d-flex align-items-center">
                            <img class="img-fluid mr-3"
                                 src="<?= $leader == null ? 'assets/frontend/images/person_man_1.jpg' : $leader->icon ?>"
                                 alt="Image">
                            <cite>
                                &mdash; <?= $leader_user == null ? "你的数据库里面没有队长" : $leader_user->name ?>
                            </cite>
                        </p>
                    </blockquote>

                </div>
            </div>
        </div>
    </div>
    <!-- END: .site-section -->

    <div class="site-section">
        <!-- BEGIN: .section-counter-78529 -->
        <div class="section-counter-78529">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="counter-78529 d-flex align-items-start">
                            <div class="icon-wrap"><span class="flaticon-muscle text-primary icon-github"></span></div>
                            <div class="counter-text">
                                <strong class="block-counter-78529"
                                        data-number="<?= $tmp == null ? 0 : $tmp->gitCnt ?>">0</strong>
                                <span>git提交次数</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="counter-78529 d-flex align-items-start">
                            <div class="icon-wrap"><span
                                        class="flaticon-stationary-bike text-primary icon-person"></span></div>
                            <div class="counter-text">
                                <strong class="block-counter-78529"
                                        data-number="<?= $tmp == null ? 0 : $tmp->memCnt ?>">0</strong>
                                <span>团队成员数量</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3  mb-4 mb-lg-0">

                        <div class="counter-78529 d-flex align-items-star">
                            <div class="icon-wrap"><span class="flaticon-banana text-primary icon-sun-o"></span></div>
                            <div class="counter-text">
                                <strong class="block-counter-78529"
                                        data-number="<?= $tmp == null ? 0 : $tmp->days ?>">0</strong>
                                <span>开发项目所花的天数</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="counter-78529 d-flex align-items-start">
                            <div class="icon-wrap"><span class="flaticon-heart text-primary icon-file-text"></span>
                            </div>
                            <div class="counter-text">
                                <strong class="block-counter-78529" data-number="<?= $tmp == null ? 0 : $tmp->files ?>">0</strong>
                                <span>项目文件数</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: .section-counter-78529 -->
    </div>

    <!-- BEGIN: .site-section -->
    <div class="site-section bg-light">

        <!-- BEGIN: .container -->
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-8 col-lg-8">
                    <!-- Add '.heading-sm' to make heading smaller  -->
                    <h2 class="section-heading line-primary mb-4 mb-md-4 mb-lg-5"><?= $tmp == null ? "专业团队" : $tmp->name ?></h2>
                </div>
                <div class="col-md-4 text-md-right col-lg-4 mb-4">
                    <a href="#" class="slider-21934-prev" id="team-prev">
                        <span class="icon-keyboard_backspace"></span>
                    </a>
                    <a href="#" class="slider-21934-next" id="team-next">
                        <span class="icon-keyboard_backspace"></span>
                    </a>
                </div>
            </div>


            <div class="row mb-5 pb-3">
                <div class="col-12">
                    <!-- BEGIN: .slider-21934 -->
                    <div class="slider-21934" id="slider-21934">

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="<?= $teamers == null ? 'assets/frontend/images/left_2.png' : $teamers[0]->icon ?>"
                                             alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2><?= $teamers == null ? '关云长' : $teamers_user[0]->name ?></h2>
                                    <span class="d-block position"><?=$teamers==null?'抬棺三号':$teamers[0]->info?></span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="<?= $teamers == null ? 'assets/frontend/images/left_1.png' : $teamers[1]->icon ?>"
                                             alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2><?= $teamers == null ? '黄汉升' : $teamers_user[1]->name ?></h2>
                                    <span class="d-block position"><?=$teamers==null?'抬棺二号':$teamers[1]->info?></span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="<?= $leader==null?'assets/frontend/images/center.png':$leader->icon?>"
                                             alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2><?= $leader_user==null?'刘玄德':$leader_user->name?></h2>
                                    <span class="d-block position"><?=$leader==null?'抬棺一号':$leader->info?></span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->


                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="<?= $teamers == null ? 'assets/frontend/images/right1.png' : $teamers[2]->icon ?>"
                                             alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2><?= $teamers == null ? '赵子龙' : $teamers_user[2]->name ?></h2>
                                    <span class="d-block position"><?=$teamers==null?'抬棺四号':$teamers[2]->info?></span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="<?= $teamers == null ? 'assets/frontend/images/right_2.png' : $teamers[3]->icon ?>"
                                             alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2><?= $teamers == null ? '曹孟德' : $teamers_user[3]->name ?></h2>

                                    <span class="d-block position"><?=$teamers==null?'抬棺五号':$teamers[3]->info?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 align="center" >图片位于外网，可能无法加载...</h6>
                    <!-- END: .slider-21934 -->
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="https://github.com/VitalC-3026/COVID-platform"
                       class="btn btn-primary btn-block">为社区系统贡献代码</a>
                </div>
            </div>


        </div>
        <!-- END: .container -->

    </div>
    <!-- END: .site-section -->

    <!-- BEGIN: .site-section -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <h2 class="section-heading line-primary">组员作业展示</h2>
                </div>
                <div class="col-md-6">
                    <p>作业中主要包括3次个人作业和7份团队作业，部分作业在本页面均有github链接，下面为小组成员的个人作业展示。</p>
                </div>
            </div>
            <h5 align="center"><?= $teamers == null ? "你的团队人数不太合适，样式会乱的呀" : '' ?></h5>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">

                        <div class="widget-inner"><img src="assets/frontend/images/about_individual_01.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>

                        <div class="widget-inner">
                            <h3>Web前端初探</h3>
                        </div>


                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="https://github.com/fengjk12138/-/blob/master/%E4%B8%AA%E4%BA%BA%E4%BD%9C%E4%B8%9A/%E4%BD%9C%E4%B8%9A1(1813402_%E5%86%AF%E6%9D%B0%E5%BA%B7).zip"><?= $teamers == null ? '关云长' : $teamers_user[0]->name ?>-js真有意思</a></li>
                                <li><a href="https://github.com/NickSkyyy/Homework/blob/master/%E4%BD%9C%E4%B8%9A1%EF%BC%881811412_%E6%88%9A%E6%99%93%E7%9D%BF%EF%BC%89.zip"><?= $teamers == null ? '黄汉升' : $teamers_user[1]->name ?>-入门？入土？</a></li>
                                <li><a href="https://github.com/VitalC-3026/Internet"><?= $leader_user==null?'刘玄德':$leader_user->name?>-啊，大脑会了，手不会</a></li>
                                <li><a href="https://github.com/king-wk/homework_internet/tree/master/%E4%BD%9C%E4%B8%9A1%EF%BC%881811507_%E6%96%87%E9%9D%99%E9%9D%99%EF%BC%89"><?= $teamers == null ? '曹孟德' : $teamers_user[2]->name ?>-大脑都不会呀</a></li>
                                <li><a href="https://github.com/Pixie-King/homework_net/blob/master/%E4%BD%9C%E4%B8%9A1%EF%BC%881811444_%E8%82%96%E4%B8%AD%E9%81%A5%EF%BC%89.pdf"><?= $teamers == null ? '赵子龙' : $teamers_user[3]->name ?>-JavaScript？我会Java</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">

                        <div class="widget-inner"><img src="assets/frontend/images/about_individual_02.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <h3>Web前端设计</h3>
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="https://github.com/fengjk12138/-/blob/master/%E4%B8%AA%E4%BA%BA%E4%BD%9C%E4%B8%9A/%E4%BD%9C%E4%B8%9A2(1813402_%E5%86%AF%E6%9D%B0%E5%BA%B7).zip"><?= $teamers == null ? '关云长' : $teamers_user[0]->name ?>-灵魂画手</a></li>
                                <li><a href="https://github.com/NickSkyyy/Homework/blob/master/%E4%BD%9C%E4%B8%9A2%EF%BC%881811412_%E6%88%9A%E6%99%93%E7%9D%BF%EF%BC%89.zip"><?= $teamers == null ? '黄汉升' : $teamers_user[1]->name ?>-设计了一点好康的</a></li>
                                <li><a href="https://github.com/VitalC-3026/Internet"><?= $leader_user==null?'刘玄德':$leader_user->name?>-这就叫专业</a></li>
                                <li><a href="https://github.com/king-wk/homework_internet/tree/master/%E4%BD%9C%E4%B8%9A2%EF%BC%881811507_%E6%96%87%E9%9D%99%E9%9D%99%EF%BC%89"><?= $teamers == null ? '曹孟德' : $teamers_user[2]->name ?>-八手外包设计</a></li>
                                <li><a href="https://github.com/Pixie-King/homework_net/blob/master/%E4%BD%9C%E4%B8%9A2%EF%BC%881811444_%E8%82%96%E4%B8%AD%E9%81%A5%EF%BC%89.pdf"><?= $teamers == null ? '赵子龙' : $teamers_user[3]->name ?>-除了好看一无是处</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">
                        <div class="widget-inner"><img src="assets/frontend/images/about_individual_03.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <h3>开源建站工具初试</h3>
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="https://github.com/fengjk12138/-/blob/master/%E4%B8%AA%E4%BA%BA%E4%BD%9C%E4%B8%9A/%E4%BD%9C%E4%B8%9A3(1813402_%E5%86%AF%E6%9D%B0%E5%BA%B7).zip"><?= $teamers == null ? '关云长' : $teamers_user[0]->name ?>-这个wp下载好慢</a></li>
                                <li><a href="https://github.com/NickSkyyy/Homework/blob/master/%E4%BD%9C%E4%B8%9A3%EF%BC%881811412_%E6%88%9A%E6%99%93%E7%9D%BF%EF%BC%89.zip"><?= $teamers == null ? '黄汉升' : $teamers_user[1]->name ?>-删库，跑路</a></li>
                                <li><a href="https://github.com/VitalC-3026/Internet"><?= $leader_user==null?'刘玄德':$leader_user->name?>-插件拉满，看看效果</a></li>
                                <li><a href="https://github.com/king-wk/homework_internet/tree/master/%E4%BD%9C%E4%B8%9A3%EF%BC%881811507_%E6%96%87%E9%9D%99%E9%9D%99%EF%BC%89"><?= $teamers == null ? '曹孟德' : $teamers_user[2]->name ?>-竟然只用鼠标点点点就行</a></li>
                                <li><a href="https://github.com/Pixie-King/homework_net/blob/master/%E4%BD%9C%E4%B8%9A3%EF%BC%881811444_%E8%82%96%E4%B8%AD%E9%81%A5%EF%BC%89.pdf"><?= $teamers == null ? '赵子龙' : $teamers_user[3]->name ?>-啊，我们使用的是一个开源网站吗？</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">
                        <div class="widget-inner"><img src="assets/frontend/images/about_team.png" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <h3>团队作业开发文档</h3>
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="https://github.com/fengjk12138"><?= $teamers == null ? '关云长' : $teamers_user[0]->name ?>-才不要你来我github呢</a></li>
                                <li><a href="https://github.com/NickSkyyy"><?= $teamers == null ? '黄汉升' : $teamers_user[1]->name ?>-你看这个star竟然可以点</a></li>
                                <li><a href="https://github.com/VitalC-3026"><?= $leader_user==null?'刘玄德':$leader_user->name?>-不就是代码么，push就是了</a></li>
                                <li><a href="https://github.com/king-wk"><?= $teamers == null ? '曹孟德' : $teamers_user[2]->name ?>-码量发量反比例</a></li>
                                <li><a href="https://github.com/Pixie-King"><?= $teamers == null ? '赵子龙' : $teamers_user[3]->name ?>-两个字形容“码怪”</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>

            </div>
        </div>
    </div>
    <!-- END: .site-section -->
</div>
<!-- END: #main -->