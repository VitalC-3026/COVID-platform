<?php
/* @var $content string */

use frontend\assets\AppAsset_b;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\heplers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\TeamMember;

AppAsset_b::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>COVID-Platform</title>
        <style>
            /*背景层*/
            #popLayer {
                display: none;
                background-color: #B3B3B3;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 10;
                -moz-opacity: 0.8;
                opacity:.80;
                filter: alpha(opacity=80);/* 只支持IE6、7、8、9 */
            }

            /*弹出层*/
            #popBox {
                display: none;
                z-index: 11;
                position:fixed;
                top:0;
                right:0;
                left:0;
                bottom:0;
                margin:auto;
                width: 360px;
                height: 360px;
                float: left;
                padding: 1em;
                border: 1em solid transparent;
                background: linear-gradient(white, white) padding-box,
                repeating-linear-gradient(-45deg,
                        red 0, red 12.5%,
                        transparent 0, transparent 25%,
                        #58a 0, #58a 37.5%,
                        transparent 0, transparent 50%)
                0 / 5em 5em;
            }

            #popBox .close{
                width: 20px;
                height: 20px;
                line-height: 20px;
                display: block;
                position: absolute;
                right:10px;
                top:10px;
                font-size: 18px;
                border-radius: 20px;
                background: #999;
                color: #FFF;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
                -moz-transition: linear .06s;
                -webkit-transition: linear .06s;
                transition: linear .06s;
                padding: 0;
                text-align: center;
                text-decoration: none;
                outline: none;
                cursor: pointer;
            }
            /*关闭按钮*/
            #popBox .close a {
                width: 24px;
                height: 24px;
                line-height: 24px;
                left:8px;
                top:8px;
                color: #FFF;
                box-shadow: 0 1px 3px rgba(209, 40, 42, .5);
                background: #d1282a;
                border-radius: 24px;
                transition: all 0.2s ease-out;
                opacity: 0.8;
            }

        </style>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <!-- Favicon -->
        <!-- <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"> -->
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <!-- Fonts from Font Awsome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- CSS Animate -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- Custom styles for this theme -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- Vector Map  -->
        <link rel="stylesheet" href="assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css">
        <!-- ToDos  -->
        <link rel="stylesheet" href="assets/plugins/todo/css/todos.css">
        <!-- Morris  -->
        <link rel="stylesheet" href="assets/plugins/morris/css/morris.css">
        <!-- Fonts -->
        <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
        <!-- Feature detection -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    <?php $this->beginBody() ?>
    <section id="container">
        <header id="header">
            <!--logo start-->
            <div class="brand" style="background-color: #2fcbce">
                <a href="<?php echo Yii::$app->getHomeUrl(); ?>" class="logo">
                    <span>平安</span>社区</a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip"
                        data-placement="right" title="Toggle Navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div class="user-nav">
                <ul>
                    <li class="dropdown messages">
                        <span class="badge badge-danager animated bounceIn" id="new-messages">5</span>
                        <button type="button" class="btn btn-default dropdown-toggle options" id="toggle-mail"
                                onclick="popBox()">
                            <i class="fa fa-envelope"></i>
                        </button>
                        <ul class="dropdown-menu alert animated fadeInDown">
                            <li>
                                <h1>You have
                                    <strong>5</strong>new messages</h1>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="profile-photo">
                                        <img src="assets/img/avatar.gif" alt="" class="img-circle">
                                    </div>
                                    <div class="message-info">
                                        <span class="sender">James Bagian</span>
                                        <span class="time">30 mins</span>
                                        <div class="message-content">Lorem ipsum dolor sit amet, elit rutrum felis sed
                                            erat augue fusce...
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="profile-photo">
                                        <img src="assets/img/avatar1.gif" alt="" class="img-circle">
                                    </div>
                                    <div class="message-info">
                                        <span class="sender">Jeffrey Ashby</span>
                                        <span class="time">2 hour</span>
                                        <div class="message-content">hendrerit pellentesque, iure tincidunt, faucibus
                                            vitae dolor aliquam...
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="profile-photo">
                                        <img src="assets/img/avatar2.gif" alt="" class="img-circle">
                                    </div>
                                    <div class="message-info">
                                        <span class="sender">John Douey</span>
                                        <span class="time">3 hours</span>
                                        <div class="message-content">Penatibus suspendisse sit pellentesque eu accumsan
                                            condimentum nec...
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="profile-photo">
                                        <img src="assets/img/avatar3.gif" alt="" class="img-circle">
                                    </div>
                                    <div class="message-info">
                                        <span class="sender">Ellen Baker</span>
                                        <span class="time">7 hours</span>
                                        <div class="message-content">Sem dapibus in, orci bibendum faucibus tellus,
                                            justo arcu...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="profile-photo">
                                        <img src="assets/img/avatar4.gif" alt="" class="img-circle">
                                    </div>
                                    <div class="message-info">
                                        <span class="sender">Ivan Bella</span>
                                        <span class="time">6 hours</span>
                                        <div class="message-content">Curabitur metus faucibus sapien elit, ante molestie
                                            sapien...
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><a href="#">Check all messages <i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>

                    </li>
                    <li class="profile-photo">
                        <img src="assets/img/avatar.png" alt="" class="img-circle">
                    </li>
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?= Yii::$app->user->identity->username ?> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li>
                                <?php if(TeamMember::findOne(Yii::$app->user->identity->account) !== null):  ?>
                                    
                                    <a href="<?= \yii\helpers\Url::to(['/backend/site/profile']); ?>"><i class="fa fa-user"></i> 个人信息</a>
                                    
                                <?php endif ?>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="javascript:logout();"><i class="fa fa-power-off"></i> 登出</a>
                                <script type="text/javascript">
                                    function logout(){
                                         window.location.href="<?php echo Yii::$app->getHomeUrl(); ?>";
                                    }
                                </script>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div >
                            <button type="button" class="btn btn-default"  onclick="javascript:logout();">
                                <i class="fa fa-reply-all" style="color: #797979"></i>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>


        </header>

        <div id="popLayer"></div>
        <div id="popBox">
            <div class="close">
                <a href="javascript:void(0)" onclick="closeBox()">关闭</a>
            </div>
            <div class="content" id="con">

                <table class="table" id="tabl">
                    <tr>
                        <th>信件</th>
                        <th>发送者</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>麦子</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>天鸟老师</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>凯凯王</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>李华</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>王皮鞋</td>
                    </tr>
                </table>
            </div>
        </div>
        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">
                <ul class="nano-content">
                    <?php //TODO: 路由跳转?>
                    <li class="active">
                        <a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>"><i class="fa fa-dashboard"></i><span>首页</span></a>
                    </li>

                    <li class="active">
                        <a href="javascript:void(0);"><i class="fa fa-sitemap"></i><span>社区数据库</span></a>
                        <ul>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/resident/index']); ?>">居民数据库</a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/committee/index']); ?>">职员数据库</a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/site/rights']); ?>">职员权限分配</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);"><i class="fa fa-chain"></i><span>信息发布</span></a>
                        <ul>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/news/edit']); ?>">新闻公告编辑</a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/news/index']); ?>">新闻公告审核</a>
                            </li>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/news/comments']); ?>">评论审核</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);"><i class="fa fa-heart"></i><span>同心协力战疫情</span></a>
                        <ul>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['/backend/site/requestlist']); ?>">体温异常人员信息</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </aside>
        <!--sidebar left end-->
        <!--main content start-->
        <section class="main-content-wrapper">
            <?= $content ?>
        </section>
        <!--main content end-->
        
    </section>
    <!--Global JS-->
    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/waypoints/waypoints.min.js"></script>
    <script src="assets/js/application.js"></script>
    <!--Page Level JS-->
    <script src="assets/plugins/countTo/jquery.countTo.js"></script>
    <script src="assets/plugins/weather/js/skycons.js"></script>
    <!-- FlotCharts  -->
    <script src="assets/plugins/flot/js/jquery.flot.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.resize.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.canvas.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.image.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.categories.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.crosshair.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.errorbars.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.fillbetween.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.navigate.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.pie.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.selection.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.stack.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.symbol.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.threshold.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.colorhelpers.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.time.min.js"></script>
    <script src="assets/plugins/flot/js/jquery.flot.example.js"></script>
    <!-- Morris  -->
    <script src="assets/plugins/morris/js/morris.min.js"></script>
    <script src="assets/plugins/morris/js/raphael.2.1.0.min.js"></script>
    <!-- Vector Map  -->
    <script src="assets/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <!-- ToDo List  -->
    <script src="assets/plugins/todo/js/todos.js"></script>
    <!--Load these page level functions-->
    <script>
        $(document).ready(function () {
            app.timer();
            app.map();
            app.weather();
            app.morrisPie();
        });
        function popBox() {
            var popBox = document.getElementById("popBox");
            var popLayer = document.getElementById("popLayer");
            popBox.style.display = "block";
            popLayer.style.display = "block";
        }

        /*点击关闭按钮*/
        function closeBox() {
            var popBox = document.getElementById("popBox");
            var popLayer = document.getElementById("popLayer");
            document.getElementById("con").innerHTML ="";
            popBox.style.display = "none";
            popLayer.style.display = "none";
        }
        //document.getElementById("tran").style.display = "block"

    </script>
    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>