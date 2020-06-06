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
        <title>NoCov &mdash; Coronavirus Social Awareness Template</title>
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
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/frontend/images/logo_light.png" alt="Covid" id="logo_light">
                        <img src="assets/frontend/images/logo_dark.png" alt="Covid" id="logo_dark">
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
                            $menuItems[] = '<li>'
                                . Html::beginForm(['/site/modify'], 'post')
                                . Html::submitButton(
                                    '修改信息',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>';
                            $menuItems[] = '<li>'
                                . Html::beginForm(['/backend/site/index'], 'post')
                                . Html::submitButton(
                                    '后台管理',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>';
                            $menuItems[] = '<li>'
                                . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm()
                                . '</li>';

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
                    <div class="col-md-6">
                        <h3 class="mt-2">Get our newsletter, join the community.</h3>
                    </div>
                    <div class="col-md-6">
                        <form action="#" id="mc-form" class="form-subscribe">
                            <div class="d-flex align-items-stretch w-100">
                                <input type="email" id="mc-email" placeholder="Email address" class="form-control">
                                <input type="submit" value="Sign up" class="btn btn-outline-white-reverse">
                            </div>
                            <div class="form-group">
                                <label for="mc-email"></label>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: .footer-subscribe -->

                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">

                        <!-- 导航栏BEGIN: .widget -->
                        <div class="widget">
                            <h3>About</h3>
                            <ul class="nav-link">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Situation</a></li>
                                <li><a href="#">Prevention</a></li>
                                <li><a href="#">Symptoms</a></li>
                                <li><a href="#">Community</a></li>
                            </ul>
                        </div>
                        <!-- END: .widget -->


                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <!-- BEGIN: .widget -->

                        <div class="widget">
                            <h3>Helpful Links</h3>
                            <ul class="nav-link">
                                <li><a href="#">Reduce The Spread</a></li>
                                <li><a href="#">Who Are At Risk</a></li>
                                <li><a href="#">Social Distancing</a></li>
                                <li><a href="#">Community Advice</a></li>
                                <li><a href="#">Technical Guidance</a></li>
                            </ul>
                        </div>


                        <!-- END: .widget -->
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <!-- BEGIN: .widget -->
                        <div class="widget">
                            <h3>Protect Yourself</h3>
                            <ul class="nav-link">
                                <li><a href="#">Wash Your Hands Often</a></li>
                                <li><a href="#">Wear a Face Mask</a></li>
                                <li><a href="#">Avoid Contact With Sick People</a></li>
                                <li><a href="#">Always Cover Your Cough or Sneeze</a></li>
                                <li><a href="#">Protect Your Family</a></li>
                            </ul>
                        </div>
                        <!-- END: .widget -->
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <div class="d-block">
                            <ul class="list-unstyled d-flex social-29021">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            </ul>
                        </div>

                        <div class="d-block mb-4">
                            <a href="#" class="d-flex call align-items-center">
                                <span class="lni lni-mobile wrap-icon"></span>
                                <span class="number">329 4902 392</span>
                            </a>
                        </div>
                        <div class="d-block">
                            <p>If you have any question, please contact us at <a href="#"
                                                                                 class="link-underline text-primary">info@unslate.co</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- BEGIN: .copyright -->
                <div class="row copyright">
                    <div class="col-md-6 order-2 text-center text-md-right"><a href="#" class="js-top"><span
                                    class="icon-long-arrow-up mr-2"></span> Go to Top</a></div>
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