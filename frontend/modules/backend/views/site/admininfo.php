<?php 
use frontend\assets\AppAsset_b;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

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
                <li><a href="#">首页</a>
                </li>
                <li>社区数据库</li>
                <li class="active">社区工作者信息</li>
            </ul>
            <!--breadcrumbs end -->
            <div class="row">
                <div class="col-xs-6">
                    <h1 class="h1">社区工作者信息</h1>
                </div>
                <div class="col-md-6" align="right">
                    <button id="addWorker" type="button" class="btn btn-primary" onclick="javascript:jump()">添加新工作人员</button>
                    <script type="text/javascript">
                        <?php //TODO: 通过路由跳转地址 ?>
                        function jump(){ window.location.href="http://localhost:8080/web/index.php?r=backend%2Fsite%2Faddadmin"; }
                    </script>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">社区工作者信息</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_length" id="example_length">
                                <label>
                                    <select name="example_length" aria-controls="example" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>records per page
                                </label>         
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="dataTables_filter" id="example_filter">
                                <label>
                                    Search: <input type="search" class="form-control input-sm" aria-controls="example">
                                </label>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>身份证号码</th>
                                <th>姓名</th>
                                <th>用户名</th>
                                <th>性别</th>
                                <th>联系方式</th>
                                <th>入职时间</th>
                                <th>工作类型</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>2019-10-12</td>
                                <td>超级管理员</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>39</td>
                                <td>2009/09/15</td>
                                <td>$205,500</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>23</td>
                                <td>2008/12/13</td>
                                <td>$103,600</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>30</td>
                                <td>2008/12/19</td>
                                <td>$90,560</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2013/03/03</td>
                                <td>$342,000</td>
                            </tr>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
