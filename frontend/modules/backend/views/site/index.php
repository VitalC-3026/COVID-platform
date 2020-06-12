<?php

use frontend\assets\AppAsset_b;
use common\widgets\Alert;
/*AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/countTo/jquery.countTo.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/weather/js/skycons.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.resize.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.canvas.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.image.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.categories.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.crosshair.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.errorbars.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.fillbetween.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.navigate.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.pie.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.selection.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.stack.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.symbol.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.threshold.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.colorhelpers.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.time.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/flot/js/jquery.flot.example.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/morris/js/morris.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/morris/js/raphael.2.1.0.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js');
AppAsset_b::addScript($this, 'yii/COVID-platform/frontend/web/assets/plugins/todo/js/todos.js');
AppAsset_b::addCss($this, 'yii/COVID-platform/web/frontend/assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css');
AppAsset_b::addCss($this, 'yii/COVID-platform/web/frontend/assets/plugins/todo/css/todos.css');
AppAsset_b::addCss($this, 'yii/COVID-platform/web/frontend/assets/plugins/morris/css/morris.css');*/
?>
<?= Alert::widget() ?>
<div id="main-content">
    <!--tiles start-->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-red">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="180" data-speed="2500"></h1>
                    <p>新增访客</p>
                </div>
                <div class="icon"><i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-turquoise">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="56" data-speed="2500"></h1>
                    <p>访客总数</p>
                </div>
                <div class="icon"><i class="fa fa-comments"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-blue">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="32" data-speed="2500"></h1>
                    <p>新增居民</p>
                </div>
                <div class="icon"><i class="fa fa fa-envelope"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-purple">
                <div class="content">
                    <h1 class="text-left timer" data-to="105" data-speed="2500"></h1>
                    <p>居民总数</p>
                </div>
                <div class="icon"><i class="fa fa-bar-chart-o"></i>
                </div>
            </div>
        </div>
    </div>
    <!--tiles end-->
    <!--ToDo start-->
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">社区待办</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="new-todo" type="text" class="form-control" placeholder="居民小任务？">
                                <section id='main'>
                                    <ul id='todo-list'></ul>
                                </section>
                            </div>
                            <div class="form-group">
                                <button id="todo-enter" class="btn btn-primary pull-right">提交</button>
                                <div id='todo-count'></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">体温分布</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">

                            <span class="sublabel">体温(<36.3℃)</span>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-info" style="width: 20%">20%</div>
                            </div>
                            <!-- progress -->

                            <span class="sublabel">体温(36.3℃~37.2℃)</span>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-default" style="width: 60%">60%</div>
                            </div>
                            <!-- progress -->

                            <span class="sublabel">体温(>37.2℃)</span>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-primary" style="width: 80%">80%</div>
                            </div>
                            <!-- progress -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-solid-info">
                <div class="panel-heading">
                    <br>
                    <h3 class="text-center">健康登记 在线管理</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-center small-thin uppercase">与阳光同在</h4>
                            <br>
                            <div class="text-center">
                                <canvas id="clear-day" width="110" height="110"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center small-thin uppercase">与夜晚同安</h4>
                            <br>
                            <div class="text-center">
                                <canvas id="partly-cloudy-night" width="110" height="110"></canvas>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-2">
                            <h6 class="text-center small-thin uppercase">Mon</h6>
                            <div class="text-center">
                                <canvas id="partly-cloudy-day" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <h6 class="text-center small-thin uppercase">Mon</h6>
                            <div class="text-center">
                                <canvas id="rain" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <h6 class="text-center small-thin uppercase">Tue</h6>
                            <div class="text-center">
                                <canvas id="sleet" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <h6 class="text-center small-thin uppercase">Wed</h6>
                            <div class="text-center">
                                <canvas id="snow" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <h6 class="text-center small-thin uppercase">Thu</h6>
                            <div class="text-center">
                                <canvas id="wind" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <h6 class="text-center small-thin uppercase">Fri</h6>
                            <div class="text-center">
                                <canvas id="fog" width="32" height="32"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">咨询信息</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 pl-lg-5 mb-5">

                            <!-- BEGIN: .custom-accordion -->
                            <div class="custom-accordion" id="accordion_1">
                                <div class="accordion-item">
                                    <h2 class="mb-0" id="headingOne">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                            健康日报的填写时间限制？
                                        </button>
                                    </h2>

                                </div> <!-- .accordion-item -->
                                <hr>
                                <div class="accordion-item">
                                    <h2 class="mb-0" id="headingTwo">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                            体温超出正常范围应该如何？
                                        </button>
                                    </h2>
                                </div> <!-- .accordion-item -->
                                <hr>
                                <div class="accordion-item">
                                    <h2 class="mb-0" id="headingThree">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            哪些医院是定点发热门诊？
                                        </button>
                                    </h2>
                                </div> <!-- .accordion-item -->
                                <hr>
                                <div class="accordion-item">
                                    <h2 class="mb-0" id="headingFour">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseFour" aria-expanded="false"
                                                aria-controls="collapseFour">
                                            如何快速判断是否患有新冠肺炎？
                                        </button>
                                    </h2>
                                </div> <!-- .accordion-item -->
                                <hr>
                                <div class="accordion-item">
                                    <h2 class="mb-0" id="headingFive">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseFive" aria-expanded="false"
                                                aria-controls="collapseFive">
                                            本小区是否有隔离患者？
                                        </button>
                                    </h2>

                                </div>
                                <!-- END: .custom-accordion -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--ToDo end-->

    <!--dashboard charts and map start-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">天津市现存确诊曲线</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="sales-chart" style="height: 260px;"></div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">天津市新增确诊曲线</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="buy-chart" style="height: 260px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">天津市各区定点发热门诊图</h3>
                </div>
                <div class="panel-body" style="height: 650px;">
                    <div class="img-wrap">
                        <img src="assets/frontend/images/hospital.png" alt="Image"
                             class="d-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--dashboard charts and map end-->
</div>