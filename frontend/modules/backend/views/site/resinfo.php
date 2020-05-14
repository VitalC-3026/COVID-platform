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
                <li><a href="http://localhost:8080/web/index.php?r=backend%2Fsite%2Findex">首页</a>
                </li>
                <li>社区数据库</li>
                <li class="active">社区居民信息</li>
            </ul>
            <!--breadcrumbs end -->
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h1">社区居民信息</h1>
                </div>
                <div class="col-md-6" align="right">
                    <button id="addRes" type="button" class="btn btn-primary" name="addNewRes" onclick="javascript:jump()">添加新居民</button>
                    <script type="text/javascript">
                        <?php //TODO: 通过路由跳转地址 ?>
                        function jump(){ window.location.href="http://localhost:8080/web/index.php?r=backend%2Fsite%2Faddres"; }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">居民信息</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_length" id="example_length">
                            <label>
                                <select name="example_length" aria-controls="example" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="10">25</option>
                                    <option value="10">50</option>
                                    <option value="10">100</option>
                                </select>records per page
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="dataTables_filter" id="example_filter">
                            <label>Search:
                                <input type="search" class="form-control input-sm" aria-controls="example">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>身份证号码</th>
                                <th>姓名</th>
                                <th>用户名</th>
                                <th>性别</th>
                                <th>联系方式</th>
                                <th>单元楼</th>
                                <th>楼层</th>
                                <th>房间号</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>440440199001011010</td>
                                <td>李华</td>
                                <td>我的朋友</td>
                                <td>男</td>
                                <td>13000001111</td>
                                <td>12</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>39</td>
                                <td>2009/09/15</td>
                                <td>$205,500</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>23</td>
                                <td>2008/12/13</td>
                                <td>$103,600</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>30</td>
                                <td>2008/12/19</td>
                                <td>$90,560</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                                <td>2013/03/03</td>
                                <td>$342,000</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Charde Marshall</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>36</td>
                                <td>2008/10/16</td>
                                <td>$470,600</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Haley Kennedy</td>
                                <td>Senior Marketing Designer</td>
                                <td>London</td>
                                <td>43</td>
                                <td>2012/12/18</td>
                                <td>$313,500</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Tatyana Fitzpatrick</td>
                                <td>Regional Director</td>
                                <td>London</td>
                                <td>19</td>
                                <td>2010/03/17</td>
                                <td>$385,750</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Michael Silva</td>
                                <td>Marketing Designer</td>
                                <td>London</td>
                                <td>66</td>
                                <td>2012/11/27</td>
                                <td>$198,500</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Paul Byrd</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td>New York</td>
                                <td>64</td>
                                <td>2010/06/09</td>
                                <td>$725,000</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Olivia Liang</td>
                                <td>Support Engineer</td>
                                <td>Singapore</td>
                                <td>64</td>
                                <td>2011/02/03</td>
                                <td>$234,500</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Bruno Nash</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>38</td>
                                <td>2011/05/03</td>
                                <td>$163,500</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Sakura Yamamoto</td>
                                <td>Support Engineer</td>
                                <td>Tokyo</td>
                                <td>37</td>
                                <td>2009/08/19</td>
                                <td>$139,575</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Thor Walton</td>
                                <td>Developer</td>
                                <td>New York</td>
                                <td>61</td>
                                <td>2013/08/11</td>
                                <td>$98,540</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                            <tr>
                                <td>Finn Camacho</td>
                                <td>Support Engineer</td>
                                <td>San Francisco</td>
                                <td>47</td>
                                <td>2009/07/07</td>
                                <td>$87,500</td>
                                <td>9</td>
                                <td>902</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
