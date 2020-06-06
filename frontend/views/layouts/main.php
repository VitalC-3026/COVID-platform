<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

    <!doctype html>
    <html lang="cn">

    <head>
        <!-- BEGIN: Title -->
        <title>让我们的社区远离病毒</title>
        <!-- END: Title -->

        <!-- BEGIN: Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- END: Meta -->

        <!-- BEGIN: Favicon -->
        <link rel="shortcut icon" href="assets/frontend/images/favicon.png">
        <!-- END: Favicon -->

        <!-- BEGIN: Stylesheets -->
        <link rel="stylesheet" href="assets/frontend/css/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="assets/frontend/css/tiny-slider.css">
        <link rel="stylesheet" href="assets/frontend/fonts/lineicons/LineIcons.min.css">
        <link rel="stylesheet" href="assets/frontend/fonts/icomoon/style.css">
        <link rel="stylesheet" href="assets/frontend/css/animate.min.css">
        <link rel="stylesheet" href="assets/frontend/css/jquery.lavalamp.css">
        <link rel="stylesheet" href="assets/frontend/css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="assets/frontend/css/style.css">
        <!--        <link rel="stylesheet" href="css/site.css">-->
        <!-- END: Stylesheets -->

    </head>

    <body>
    <?php $this->beginBody() ?>

    <!--     BEGIN: .site-wrap -->


    <div class="site-wrap">

        <header id="site-header" class="position-relative">
            <!-- Add '.navbar_dark' class if you want the color of the text to -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">

                    <!--  导航栏左侧logo BEGIN: .navbar-brand -->
                    <a class="navbar-brand" href="<?php echo Yii::$app->getHomeUrl(); ?>">
                        <img src="assets/frontend/images/logo.png" alt="Covid" id="logo_dark">
                    </a>
                    <!-- END: .navbar-brand -->

                    <!-- 不清楚有什么效果 BEGIN: .navbar-toggler -->
                    <a href="#" class="burger-toggle-menu js-burger-toggle-menu ml-auto py-4" data-toggle="collapse"
                       data-target="#main-nav" aria-controls="main-nav" aria-expanded="false"
                       aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <!-- END: .navbar-toggler -->

                    <!-- 导航栏 BEGIN: #main-nav  TODO 导航栏调转-->
                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="navbar-nav ml-auto">
                            <?php

                            $menuItems = [
                                ['label' => '主页', 'url' => ['/site/index']],
                                ['label' => '关于', 'url' => ['/site/about']],
                                ['label' => '联系我们', 'url' => ['/site/contact']],
                            ];

                            if (Yii::$app->user->isGuest) {
                                $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
                                $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
                            } else {
                                $menuItems[] = ['label' => '修改信息', 'url' => ['/site/modify']];

                                $menuItems[] = ['label' => '后台管理', 'url' => ['/backend/site/index']];
                                $menuItems[] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><span>"
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . "<button class='btn btn-outline-secondary'>登出("
                                    . Yii::$app->user->identity->username . ')'
                                    . "</button>"
                                    . Html::endForm()
                                    . '</span></li>';

                            }

                            echo Nav::widget([
                                'options' => ['class' => 'nav-item'],
                                'items' => $menuItems
                            ]);
                            ?>
                        </ul>
                    </div>
                    <!-- END: #main-nav -->

                </div>
            </nav>
        </header>
        <!-- END: #site-header -->


        <!--      这里是页面显示的部分-->
        <div>
            <?= $content ?>
        </div>


        <!-- BEGIN: .cover -->

        <!-- END: .cover -->


        <!-- BEGIN: #main -->

        <!-- END: #main -->

        <!-- BEGIN: #footer -->
        <footer id="footer">
            <div class="container">

                <!--       页脚  BEGIN: .footer-subscribe -->
                <div class="row footer-subscribe">
                    <div class="col-md-9">
                        <h3 class="mt-2">生命重于泰山，疫情就是命令，防控就是责任。</h3>
                    </div>
                    <!--                    这段注释掉的是一个邮件注册，由于没有用，就注册掉了-->
                    <!--                    <div class="col-md-6">-->
                    <!--                        <form action="#" id="mc-form" class="form-subscribe">-->
                    <!--                            <div class="d-flex align-items-stretch w-100">-->
                    <!--                                <input type="email" id="mc-email" placeholder="Email address" class="form-control">-->
                    <!--                                <input type="submit" value="Sign up" class="btn btn-outline-white-reverse">-->
                    <!--                            </div>-->
                    <!--                            <div class="form-group">-->
                    <!--                                <label for="mc-email"></label>-->
                    <!--                            </div>-->
                    <!--                        </form>-->
                    <!--                    </div>-->
                </div>
                <!-- END: .footer-subscribe -->

                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">

                        <!-- 导航栏BEGIN: .widget -->
                        <div class="widget">
                            <h3>功能</h3>
                            <ul class="nav-link">
                                <li><a href="#">主页</a></li>
                                <li><a href="#">关于</a></li>
                                <li><a href="#">联系我们</a></li>
                                <li><a href="#">注册</a></li>
                                <li><a href="#">登录</a></li>
                            </ul>
                        </div>
                        <!-- END: .widget -->


                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <!-- BEGIN: .widget -->

                        <div class="widget">
                            <h3>相关网站</h3>
                            <ul class="nav-link">
                                <li><a href="http://www.nhc.gov.cn/">国家卫健委</a></li>
                                <li><a href="https://ncov.dxy.cn/ncovh5/view/pneumonia?from=timeline">丁香医生实时疫情数据</a>
                                </li>
                                <li><a href="http://www.piyao.org.cn/2020yqpy/">辟谣专区</a></li>
                                <li><a href="http://www.nhc.gov.cn/xcs/kpzs/list_gzbd.shtml">防疫小知识</a></li>
                                <li><a href="https://www.chinavolunteer.cn/app/user/login.php">报名志愿者</a></li>
                            </ul>
                        </div>


                        <!-- END: .widget -->
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <!-- BEGIN: .widget -->
                        <div class="widget">
                            <h3>防疫小贴士</h3>
                            <ul class="nav-link">
                                <li><a href="#">勤洗手</a></li>
                                <li><a href="#">戴口罩</a></li>
                                <li><a href="#">宅家中</a></li>
                                <li><a href="#">量体温</a></li>
                                <li><a href="#">护家人</a></li>
                            </ul>
                        </div>
                        <!-- END: .widget -->
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <div class="d-block">
                            <ul class="list-unstyled d-flex social-29021">
                                <li><a href="#"><span class="icon-qq"></span></a></li>
                                <li><a href="#"><span class="icon-weixin"></span></a></li>
                                <li><a href="#"><span class="icon-weibo"></span></a></li>
                                <li><a href="#"><span class="icon-television"></span></a></li>
                            </ul>
                        </div>

                        <div class="d-block mb-4">
                            <a href="#" class="d-flex call align-items-center">
                                <span class="lni lni-mobile wrap-icon"></span>
                                <span class="number">110 120 119</span>
                            </a>
                        </div>
                        <div class="d-block">
                            <p>有任何问题请联系管理员</p>
                            <p><a href="#"
                                  class="link-underline text-primary">这是个邮箱@南开.com</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BEGIN: .copyright -->
                <div class="row copyright">
                    <div class="col-md-6 order-2 text-center text-md-right"><a href="#" class="js-top"><span
                                    class="icon-long-arrow-up mr-2"></span> 返回顶部</a></div>
                    <div class="col-md-6 text-center text-md-left">
                        <p>&copy; 2020. All Rights Reserved. Design by <a href="http://www.bootstrapmb.com"
                                                                          target="_blank"
                                                                          class="link-underline text-primary">Unslate.co</a>
                        </p>
                    </div>
                </div>
                <!-- END: .copyright -->
            </div>
        </footer>
        <!-- END: #footer -->

    </div>
    <!-- END: .site-wrap -->

    <!-- Loader -->

    <!--    <div id="site-overlayer"></div>-->
    <!--    <div class="site-loader-wrap">-->
    <!--        <div class="site-loader"></div>-->
    <!--    </div>-->

    <!-- BEGIN: JavaScripts -->
    <script src="assets/frontend/js/jquery-3.4.1.min.js"></script>
    <script src="assets/frontend/js/popper.min.js"></script>
    <script src="assets/frontend/js/bootstrap.min.js"></script>
    <script src="assets/frontend/js/jquery.waypoints.min.js"></script>
    <script src="assets/frontend/js/jquery.animateNumber.min.js"></script>
    <script src="assets/frontend/js/tiny-slider.js"></script>
    <script src="assets/frontend/js/jquery.fancybox.min.js"></script>
    <script src="assets/frontend/js/jquery.lavalamp.min.js"></script>
    <script src="assets/frontend/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/frontend/js/jquery.validate.min.js"></script>
    <script src="assets/frontend/js/jquery.easing.1.3.js"></script>
    <script src="assets/frontend/js/main.js"></script>
    <!-- END: JavaScripts -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>