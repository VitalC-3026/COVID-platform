<?php

/**
 * Team: NoCov
 * Coding by: 肖中遥 文静静
 * 后台主页 view
*/

use frontend\assets\AppAsset_b;
use common\widgets\Alert;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?= Alert::widget() ?>
<div id="main-content">
    <!--tiles start-->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-purple">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="<?php echo $model[0]?>" data-speed="2500"></h1>
                    <p>访客总数</p>
                </div>
                <div class="icon"><i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-turquoise">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="<?php echo $model[1]?>" data-speed="2500"></h1>
                    <p>居民总数</p>
                </div>
                <div class="icon"><i class="fa fa-comments"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-blue">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="<?php echo $model[2]?>" data-speed="2500"></h1>
                    <p>员工总数</p>
                </div>
                <div class="icon"><i class="fa fa fa-envelope"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-red">
                <div class="content">
                    <h1 class="text-left timer" data-to="<?php echo $model[3]?>" data-speed="2500"></h1>
                    <p>体温异常人员总数</p>
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
                    <div id="donut"></div>

                    <script type="text/javascript">
                        $("#donut").({ element: 'graph', data: [ {value: 70, label: 'foo'}, {value: 15, label: 'bar'}, {value: 10, label: 'baz'}, {value: 5, label: 'A really really long label'} ], backgroundColor: '#ccc', labelColor: '#060', colors: [ '#0BA462', '#39B580', '#67C69D', '#95D7BB' ], formatter: function (x) { return x + "%"} });
                    </script>
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
                                <div class="progress-bar progress-bar-info" style="width: <?php echo $model[4]?>%"><?php echo $model[4]?>%</div>
                            </div>
                            <!-- progress -->

                            <span class="sublabel">体温(36.3℃~37.2℃)</span>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-default" style="width: <?php echo $model[5]?>%"><?php echo $model[5]?>%</div>
                            </div>
                            <!-- progress -->

                            <span class="sublabel">体温(>37.2℃)</span>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-primary" style="width: <?php echo $model[6]?>%"><?php echo $model[6]?>%</div>
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
                            <!-- <h6 class="text-center small-thin uppercase">Mon</h6> -->
                            <div class="text-center">
                                <canvas id="partly-cloudy-day" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <!-- <h6 class="text-center small-thin uppercase">Mon</h6> -->
                            <div class="text-center">
                                <canvas id="rain" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <!-- <h6 class="text-center small-thin uppercase">Tue</h6> -->
                            <div class="text-center">
                                <canvas id="sleet" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <!-- <h6 class="text-center small-thin uppercase">Wed</h6> -->
                            <div class="text-center">
                                <canvas id="snow" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <!-- <h6 class="text-center small-thin uppercase">Thu</h6> -->
                            <div class="text-center">
                                <canvas id="wind" width="32" height="32"></canvas>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <!-- <h6 class="text-center small-thin uppercase">Fri</h6> -->
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
                    <h3 class="panel-title">任务清单</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(sizeof($info) === 0): ?>
                                <span>暂无待办事务！</span>
                            <?php endif ?>
                            <?php for($t = 0; $t < sizeof($info); $t++):?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <span><?php $info[$t] ?></span>
                                    </div> 
                                    <div class="col-md-2">
                                        <span>|</span>
                                    </div>
                                    <div class="col-md-5">
                                        <span><?php $time[$t] ?></span>
                                    </div>
                                </div>
                                <hr>
                            <?php endfor ?>
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
                    <h3 class="panel-title">天津市各区疫情数据一览</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>

                    </div>
                </div>
                <table id="areaCondition" class="table" style="height: 650px">
                    <tr>
                        <th>区名</th>
                        <th>现存确诊</th>
                        <th>累计确诊</th>
                        <th>境外输入</th>
                        <th>治愈人数</th>
                        <th>死亡人数</th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">天津市各区定点发热门诊图</h3>
                </div>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
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
<script language="JavaScript">
    <?php $this->beginBlock('js_end') ?>
    function dataShowInTable(){
        var dataApi = "http://49.232.173.220:3001/data/getAreaStat/%E5%A4%A9%E6%B4%A5";
        $.getJSON(dataApi, function (data) {
            var newArr = [];
            for (var i = 0; i < data[0]["cities"].length; i++) {
                var json = {
                    name:data[0]["cities"][i]["cityName"],
                    now: data[0]["cities"][i]["currentConfirmedCount"],
                    total: data[0]["cities"][i]["confirmedCount"],
                    input:data[0]["cities"][i]["suspectedCount"],
                    cure:data[0]["cities"][i]["curedCount"],
                    death:data[0]["cities"][i]["deadCount"],
            };
                newArr.push(json);
            }
            var rows = newArr.length;
            for(var i = 0;i < rows; i ++){
                var x = document.getElementById("areaCondition").insertRow(i + 1);
                console.log(newArr[i]["name"]);
                x.insertCell(0).innerHTML = newArr[i]["name"];
                x.insertCell(1).innerHTML = newArr[i]["now"];
                x.insertCell(2).innerHTML = newArr[i]["total"];
                x.insertCell(3).innerHTML = newArr[i]["input"];
                x.insertCell(4).innerHTML = newArr[i]["cure"];
                x.insertCell(5).innerHTML = newArr[i]["death"];
            }

        });
    }
    dataShowInTable();
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['js_end'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>
