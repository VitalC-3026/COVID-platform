<?php
$tmp = \common\models\Team::findAll(['id' => 1]);
if (sizeof($tmp) != 0)
    $tmp = $tmp[0];
else $tmp = null;
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
                        <img src="assets/frontend/images/person_man_1.jpg" alt="Image" class="img-fluid">
                    </figure>
                </div>

                <div class="col-md-6 pl-md-5">
                    <h3 class="section-heading line-primary mb-4  ">What is NoCoV?</h3>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>

                    <p class="mb-4">It is a paradisematic country, in which roasted parts of sentences fly into your
                        mouth.</p>

                    <blockquote class="blockquote-19210">

                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            It is a paradisematic country, in which roasted parts of sentences fly into your mouth. It
                            is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p class="mb-0 d-flex align-items-center">
                            <img class="img-fluid mr-3" src="assets/frontend/images/person_man_1.jpg" alt="Image">
                            <cite>
                                &mdash; John Doe, Mayor of Local Gov.
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
                                <strong class="block-counter-78529" data-number="<?= $tmp == null ? 0 : $tmp->gitCnt ?>">0</strong>
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
                                <strong class="block-counter-78529" data-number="<?= $tmp == null ? 0 : $tmp->days ?>">0</strong>
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
                    <h2 class="section-heading line-primary mb-4 mb-md-4 mb-lg-5">专业团队</h2>
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
                                        <img src="assets/frontend/images/left_2.png" alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2>James Stewart</h2>
                                    <span class="d-block position">CEO &amp; Co-Founder</span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="assets/frontend/images/left_1.png" alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2>Hudson Davies</h2>
                                    <span class="d-block position">VP &amp; Co-Founder</span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="assets/frontend/images/center.png" alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2>Keira Pitts</h2>
                                    <span class="d-block position">VP &amp; Co-Founder</span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->


                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="assets/frontend/images/right_1.png" alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2>Joseph Dalton</h2>
                                    <span class="d-block position">Manager</span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <div class="item">
                            <div class="media-29191">
                                <a href="#">
                                    <figure>
                                        <img src="assets/frontend/images/right_2.png" alt="Image" class="img-fluid">
                                    </figure>
                                </a>
                                <div class="media-29191-body">
                                    <h2>Becky Kenny</h2>
                                    <span class="d-block position">VP &amp; Co-Founder</span>
                                </div>
                            </div>
                        </div>
                        <!-- END: .item -->

                        <!-- BEGIN: .item -->
                        <!--            <div class="i-->
                        <!-- END: tem">-->
                        <!--              <div class="media-29191">-->
                        <!--                <a href="#">-->
                        <!--                  <figure>-->
                        <!--                    <img src="assets/frontend/images/person_woman_1.jpg" alt="Image" class="img-fluid">-->
                        <!--                  </figure> -->
                        <!--                </a>-->
                        <!--                <div class="media-29191-body">-->
                        <!--                  <h2>Joann Byers</h2>-->
                        <!--                  <span class="d-block position">VP &amp; Co-Founder</span>-->
                        <!--                </div>-->
                        <!--              </div>-->
                        <!--            </div>.item -->

                    </div>
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
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">

                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_1.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>

                        <div class="widget-inner">
                            <h3>Community Guidelines</h3>
                        </div>


                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="#">Executive Order from the Mayor</a></li>
                                <li><a href="#">Business &amp; Industry Advice</a></li>
                                <li><a href="#">Home Quarantine</a></li>
                                <li><a href="#">Community Food Supply</a></li>
                                <li><a href="#">Community Lockdown</a></li>
                                <li><a href="#">Skeletal Work Force Arrangement</a></li>
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

                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_2.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <h3>City Guidelines</h3>
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="#">Executive Order from the Mayor</a></li>
                                <li><a href="#">Business &amp; Industry Advice</a></li>
                                <li><a href="#">Home Quarantine</a></li>
                                <li><a href="#">Community Food Supply</a></li>
                                <li><a href="#">Community Lockdown</a></li>
                                <li><a href="#">Skeletal Work Force Arrangement</a></li>
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
                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_3.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <h3>Lockdown Guidelines</h3>
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="#">Executive Order from the Mayor</a></li>
                                <li><a href="#">Business &amp; Industry Advice</a></li>
                                <li><a href="#">Home Quarantine</a></li>
                                <li><a href="#">Community Food Supply</a></li>
                                <li><a href="#">Community Lockdown</a></li>
                                <li><a href="#">Skeletal Work Force Arrangement</a></li>
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
                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_4.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <h3>Home Quarantine Guidelines</h3>
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="#">Executive Order from the Mayor</a></li>
                                <li><a href="#">Business &amp; Industry Advice</a></li>
                                <li><a href="#">Home Quarantine</a></li>
                                <li><a href="#">Community Food Supply</a></li>
                                <li><a href="#">Community Lockdown</a></li>
                                <li><a href="#">Skeletal Work Force Arrangement</a></li>
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