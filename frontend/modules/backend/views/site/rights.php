<?php 
use frontend\assets\AppAsset_b;
use yii\helpers\Html;

AppAsset_b::addCss($this, 'assets/plugins/dataTables/css/dataTables.css');
AppAsset_b::addScript($this, 'assets/plugins/nanoScroller/jquery.nanoscroller.min.js');
AppAsset_b::addScript($this, 'assets/plugins/dataTables/js/jquery.dataTables.js');
AppAsset_b::addScript($this, 'assets/plugins/dataTables/js/dataTables.bootstrap.js');
?>
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <!-- TODO: 通过路由跳转地址 -->
                <li><a href="<?= \yii\helpers\Url::to(['/backend/site/index']); ?>">首页</a>
                </li>
                <li>社区数据库</li>
                <li class="active">分配职员权限</li>
            </ul>
            <!--breadcrumbs end -->
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h1">分配职员权限</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">分配职员权限</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    
                    <div role="grid" id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
                    
                        <div class="row" margin-top="10px">
                            <div class="col-xs-4">    
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input type="search" class=" form-control input-sm" aria-controls="example">
                                </div>     
                            </div>
                            <div class="col-xs-4">    
                                <button class="btn btn-primary">查找</button>   
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="183px">身份证号码</th>
                                    <th width="100px">姓名</th>
                                    <th width="50px">性别</th>
                                    <th width="120px">联系方式</th>
                                    <th width="100px">入职时间</th>
                                    <th width="100px">工作类型</th>
                                    <th>分配权限</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>440440199001011010</td>
                                    <td>李华</td>
                                    <td>男</td>
                                    <td>13000001111</td>
                                    <td>2020-1-10</td>
                                    <td>普通职员</td>
                                    <td>
                                        <div class="radio">

                                            <input class="icheck" type="checkbox" checked="" name="check1">
                                            <label><?php echo $this->params['rights'][0]?></label>
                                        </div>
                                        <div class="radio">

                                            <input class="icheck" type="checkbox" name="check2">
                                            <label><?php echo $this->params['rights'][1]?></label>
                                        </div>
                                        <div class="radio">

                                            <input class="icheck" type="checkbox" name="check3">
                                            <label><?php echo $this->params['rights'][2]?></label>
                                        </div>
                                         <div class="radio">

                                            <input class="icheck" type="checkbox" checked="" name="check1">
                                            <label>买菜</label>
                                        </div>
                                        <div class="radio">

                                            <input class="icheck" type="checkbox" name="check2">
                                            <label>送菜</label>
                                        </div>
                                        <div class="radio">

                                            <input class="icheck" type="checkbox" name="check3">
                                            <label>教居民如何买菜</label>
                                        </div>   
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <button class="btn btn-primary">确认</button>
                            </div>
                        </div>
                        <div class="panel panel-default" margin-top="50px">
                            <div class="panel-heading">
                                <h3 class="panel-title">职权简介</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                               <div class="panel-group accordion" id="accordion" margin-top="40px">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"><?php echo $this->params['rights'][0]?></a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p><?php echo $this->params['description'][0]?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?php echo $this->params['rights'][1]?></a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p><?php echo $this->params['description'][1]?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?php echo $this->params['rights'][2]?></a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p><?php echo $this->params['description'][2]?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
