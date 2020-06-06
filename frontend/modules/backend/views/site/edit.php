<?php
use frontend\assets\AppAsset_b;

AppAsset_b::addCss($this, 'web/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css');
AppAsset_b::addScript($this, 'web/assets/plugins/ckeditor/ckeditor.js');
AppAsset_b::addScript($this, 'web/assets/plugins/bootstrap-wysihtml5/js/bootstrap3-wysihtml5.js');
AppAsset_b::addScript($this, 'web/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.js');
AppAsset_b::addScript($this, 'web/assets/ckeditor/ckeditor.js');
?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="#">首页</a>
                </li>
                <li>信息发布</li>
                <li class="active">信息编辑</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">图文信息</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row" style="margin-left: 10px">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><i class="fa fa-save"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-copy"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-cut"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-paste"></i></button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-align-center"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-align-right"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-align-justify"></i></button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><i class="fa fa-bold"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-italic"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-underline"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-strikethrough"></i></button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><i class="fa fa-list"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-list-ul"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-list-ol"></i></button>
                            
                        </div>
                    </div>
                    <div class="row" style="margin: 10px">
                        <label class="control-label">标题：</label><input type="text" class="textarea form-control" rows="10" cols="80"  style="width: 100%">
                    </div>
                    <div class="row" style="margin: 10px">
                        <label class="control-label">正文内容：</label>
                        <textarea id="editor" class="textarea form-control ckeditor" rows="10" cols="80" placeholder="请输入文字 ..." style="width: 100%; height: 200px; max-width: 100%">
                            
                        </textarea>
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#editor' ) )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                    <div class="row" style="margin: 10px" align="right">
                        <button type="button" class="btn btn-primary">提交审核</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>