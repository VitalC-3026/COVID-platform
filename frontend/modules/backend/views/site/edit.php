<?php
use frontend\assets\AppAsset_b;

AppAsset_b::addCss($this, 'web/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css');
AppAsset_b::addScript($this, 'web/assets/plugins/ckeditor/ckeditor.js');
AppAsset_b::addScript($this, 'web/assets/plugins/bootstrap-wysihtml5/js/bootstrap3-wysihtml5.js');
AppAsset_b::addScript($this, 'web/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.js');
?>
<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="#">Dashboard</a>
                </li>
                <li>Forms</li>
                <li class="active">WYSIWYG Editor</li>
            </ul>
            <!--breadcrumbs end -->
            <h1 class="h1">WYSIWYG Editor</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">bootstrap wysihtml5</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <textarea class="textarea form-control" rows="10" cols="80" placeholder="Enter text ..." style="width: 100%; height: 200px"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CKEditor</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <textarea name="editor1" id="editor1" rows="10" cols="80">

                    </textarea>
                    <div id="cke_editor1" class="cke_1 cke cke_reset cke_chrome cke_editor_editor1 cke_ltr cke_browser_webkit" dir="ltr" lang="zh-cn" role="application" aria-labelledby="cke_editor1_arialbl">
                        <span id="cke_editor1_arialbl" class="cke_voice_label">所见即所得编辑器, editor1</span>
                        <div class="cke_inner cke_reset" role="presentation">
                            <span id="cke_1_top" class="cke_top cke_reset_all" role="presentation" style="height: auto; user-select: none;">
                                <span id="cke_7" class="cke_voice_label">工具栏</span>
                            <span id="cke_1_toolbox" class="cke_toolbox" role="group" aria-labelledby="cke_7" onmousedown="return false;">
                                <span id="cke_10" class="cke_toolbar" aria-labelledby="cke_10_label" role="toolbar">
                                    <span id="cke_10_label" class="cke_voice_label">剪贴板/撤销</span>
                                    <span class="cke_toolbar_start"></span>
                                    <span class="cke_toolgroup" role="presentation">
                                        <a id="cke_11" class="cke_button cke_button__cut cke_button_disabled " href="javascript:void('剪切')" title="剪切" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_11_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(2,event);" onfocus="return CKEDITOR.tools.callFunction(3,event);" onmousedown="return CKEDITOR.tools.callFunction(4,event);" onclick="CKEDITOR.tools.callFunction(5,this);return false;">
                                                <span class="cke_button_icon cke_button__cut_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -264px;background-size:auto;">&nbsp;</span>
                                                <span id="cke_11_label" class="cke_button_label cke_button__cut_label" aria-hidden="false">剪切</span>
                                        </a>
                                        <a id="cke_12" class="cke_button cke_button__copy cke_button_disabled " href="javascript:void('复制')" title="复制" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_12_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(6,event);" onfocus="return CKEDITOR.tools.callFunction(7,event);" onmousedown="return CKEDITOR.tools.callFunction(8,event);" onclick="CKEDITOR.tools.callFunction(9,this);return false;">
                                            <span class="cke_button_icon cke_button__copy_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -216px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_12_label" class="cke_button_label cke_button__copy_label" aria-hidden="false">复制
                                            </span>
                                        </a>
                                        <a id="cke_13" class="cke_button cke_button__paste  cke_button_off" href="javascript:void('粘贴')" title="粘贴" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_13_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(10,event);" onfocus="return CKEDITOR.tools.callFunction(11,event);" onmousedown="return CKEDITOR.tools.callFunction(12,event);" onclick="CKEDITOR.tools.callFunction(13,this);return false;">
                                            <span class="cke_button_icon cke_button__paste_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -312px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_13_label" class="cke_button_label cke_button__paste_label" aria-hidden="false">粘贴
                                            </span>
                                        </a>
                                        <a id="cke_14" class="cke_button cke_button__pastetext  cke_button_off" href="javascript:void('粘贴为无格式文本')" title="粘贴为无格式文本" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_14_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(14,event);" onfocus="return CKEDITOR.tools.callFunction(15,event);" onmousedown="return CKEDITOR.tools.callFunction(16,event);" onclick="CKEDITOR.tools.callFunction(17,this);return false;">
                                            <span class="cke_button_icon cke_button__pastetext_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -720px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_14_label" class="cke_button_label cke_button__pastetext_label" aria-hidden="false">粘贴为无格式文本
                                            </span>
                                        </a>
                                        <a id="cke_15" class="cke_button cke_button__pastefromword  cke_button_off" href="javascript:void('从 MS Word 粘贴')" title="从 MS Word 粘贴" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_15_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(18,event);" onfocus="return CKEDITOR.tools.callFunction(19,event);" onmousedown="return CKEDITOR.tools.callFunction(20,event);" onclick="CKEDITOR.tools.callFunction(21,this);return false;">
                                            <span class="cke_button_icon cke_button__pastefromword_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -768px;background-size:auto;">&nbsp;
                                            </span>
                                            <span id="cke_15_label" class="cke_button_label cke_button__pastefromword_label" aria-hidden="false">从 MS Word 粘贴</span>
                                        </a>
                                        <span class="cke_toolbar_separator" role="separator"></span>
                                        <a id="cke_16" class="cke_button cke_button__undo  cke_button_off" href="javascript:void('撤消')" title="撤消" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_16_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(22,event);" onfocus="return CKEDITOR.tools.callFunction(23,event);" onmousedown="return CKEDITOR.tools.callFunction(24,event);" onclick="CKEDITOR.tools.callFunction(25,this);return false;">
                                            <span class="cke_button_icon cke_button__undo_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -1008px;background-size:auto;">&nbsp;
                                            </span>
                                            <span id="cke_16_label" class="cke_button_label cke_button__undo_label" aria-hidden="false">撤消
                                            </span>
                                        </a>
                                        <a id="cke_17" class="cke_button cke_button__redo cke_button_disabled " href="javascript:void('重做')" title="重做" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_17_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onmousedown="return CKEDITOR.tools.callFunction(28,event);" onclick="CKEDITOR.tools.callFunction(29,this);return false;">
                                            <span class="cke_button_icon cke_button__redo_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -960px;background-size:auto;">&nbsp;</span>                                       
                                            <span id="cke_17_label" class="cke_button_label cke_button__redo_label" aria-hidden="false">重做
                                            </span>
                                        </a>
                                    </span>
                                    <span class="cke_toolbar_end"></span>
                                </span>
                                <span id="cke_18" class="cke_toolbar" aria-labelledby="cke_18_label" role="toolbar">
                                    <span id="cke_18_label" class="cke_voice_label">编辑</span><span class="cke_toolbar_start"></span>
                                    <span class="cke_toolgroup" role="presentation">
                                        <a id="cke_19" class="cke_button cke_button__scayt cke_button_off " href="javascript:void('即时拼写检查')" title="即时拼写检查" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(30,event);" onfocus="return CKEDITOR.tools.callFunction(31,event);" onmousedown="return CKEDITOR.tools.callFunction(32,event);" onclick="CKEDITOR.tools.callFunction(33,this);return false;">
                                            <span class="cke_button_icon cke_button__scayt_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -888px;background-size:auto;">&nbsp;
                                            </span>
                                            <span id="cke_19_label" class="cke_button_label cke_button__scayt_label" aria-hidden="false">即时拼写检查</span><span class="cke_button_arrow"></span></a></span><span class="cke_toolbar_end"></span></span><span id="cke_20" class="cke_toolbar" aria-labelledby="cke_20_label" role="toolbar">
                                                <span id="cke_20_label" class="cke_voice_label">链接</span>
                                                <span class="cke_toolbar_start"></span>
                                                <span class="cke_toolgroup" role="presentation"><a id="cke_21" class="cke_button cke_button__link  cke_button_off" href="javascript:void('插入/编辑超链接')" title="插入/编辑超链接" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_21_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(34,event);" onfocus="return CKEDITOR.tools.callFunction(35,event);" onmousedown="return CKEDITOR.tools.callFunction(36,event);" onclick="CKEDITOR.tools.callFunction(37,this);return false;">
                                                    <span class="cke_button_icon cke_button__link_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -528px;background-size:auto;">&nbsp;</span>
                                                    <span id="cke_21_label" class="cke_button_label cke_button__link_label" aria-hidden="false">插入/编辑超链接
                                                    </span>
                                                </a>
                                                <a id="cke_22" class="cke_button cke_button__unlink cke_button_disabled " href="javascript:void('取消超链接')" title="取消超链接" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(38,event);" onfocus="return CKEDITOR.tools.callFunction(39,event);" onmousedown="return CKEDITOR.tools.callFunction(40,event);" onclick="CKEDITOR.tools.callFunction(41,this);return false;">
                                                    <span class="cke_button_icon cke_button__unlink_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -552px;background-size:auto;">&nbsp;
                                                    </span>
                                                    <span id="cke_22_label" class="cke_button_label cke_button__unlink_label" aria-hidden="false">取消超链接
                                                    </span>
                                                </a>
                                                <a id="cke_23" class="cke_button cke_button__anchor  cke_button_off" href="javascript:void('插入/编辑锚点链接')" title="插入/编辑锚点链接" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_23_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(42,event);" onfocus="return CKEDITOR.tools.callFunction(43,event);" onmousedown="return CKEDITOR.tools.callFunction(44,event);" onclick="CKEDITOR.tools.callFunction(45,this);return false;">
                                                    <span class="cke_button_icon cke_button__anchor_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -504px;background-size:auto;">&nbsp;</span><span id="cke_23_label" class="cke_button_label cke_button__anchor_label" aria-hidden="false">插入/编辑锚点链接
                                                    </span>
                                                </a>
                                            </span>
                                            <span class="cke_toolbar_end">
                                            </span>
                                        </span>
                                        <span id="cke_24" class="cke_toolbar" aria-labelledby="cke_24_label" role="toolbar"><span id="cke_24_label" class="cke_voice_label">插入
                                        </span>
                                        <span class="cke_toolbar_start"></span>
                                        <span class="cke_toolgroup" role="presentation"><a id="cke_25" class="cke_button cke_button__image  cke_button_off" href="javascript:void('图像')" title="图像" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(46,event);" onfocus="return CKEDITOR.tools.callFunction(47,event);" onmousedown="return CKEDITOR.tools.callFunction(48,event);" onclick="CKEDITOR.tools.callFunction(49,this);return false;">
                                            <span class="cke_button_icon cke_button__image_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -360px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_25_label" class="cke_button_label cke_button__image_label" aria-hidden="false">图像
                                            </span>
                                        </a>
                                        <a id="cke_26" class="cke_button cke_button__table  cke_button_off" href="javascript:void('表格')" title="表格" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(50,event);" onfocus="return CKEDITOR.tools.callFunction(51,event);" onmousedown="return CKEDITOR.tools.callFunction(52,event);" onclick="CKEDITOR.tools.callFunction(53,this);return false;">
                                            <span class="cke_button_icon cke_button__table_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -912px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_26_label" class="cke_button_label cke_button__table_label" aria-hidden="false">表格</span>
                                        </a>
                                        <a id="cke_27" class="cke_button cke_button__horizontalrule  cke_button_off" href="javascript:void('插入水平线')" title="插入水平线" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(54,event);" onfocus="return CKEDITOR.tools.callFunction(55,event);" onmousedown="return CKEDITOR.tools.callFunction(56,event);" onclick="CKEDITOR.tools.callFunction(57,this);return false;">
                                            <span class="cke_button_icon cke_button__horizontalrule_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -336px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_27_label" class="cke_button_label cke_button__horizontalrule_label" aria-hidden="false">插入水平线</span>
                                        </a>
                                        <a id="cke_28" class="cke_button cke_button__specialchar  cke_button_off" href="javascript:void('插入特殊符号')" title="插入特殊符号" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(58,event);" onfocus="return CKEDITOR.tools.callFunction(59,event);" onmousedown="return CKEDITOR.tools.callFunction(60,event);" onclick="CKEDITOR.tools.callFunction(61,this);return false;">
                                            <span class="cke_button_icon cke_button__specialchar_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -864px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_28_label" class="cke_button_label cke_button__specialchar_label" aria-hidden="false">插入特殊符号</span>
                                        </a>
                                    </span>
                                    <span class="cke_toolbar_end"></span>
                                </span>
                                <span id="cke_29" class="cke_toolbar" aria-labelledby="cke_29_label" role="toolbar">
                                    <span id="cke_29_label" class="cke_voice_label">工具</span>
                                    <span class="cke_toolbar_start"></span>
                                    <span class="cke_toolgroup" role="presentation">
                                        <a id="cke_30" class="cke_button cke_button__maximize  cke_button_off" href="javascript:void('全屏')" title="全屏" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_30_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(62,event);" onfocus="return CKEDITOR.tools.callFunction(63,event);" onmousedown="return CKEDITOR.tools.callFunction(64,event);" onclick="CKEDITOR.tools.callFunction(65,this);return false;">
                                            <span class="cke_button_icon cke_button__maximize_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -672px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_30_label" class="cke_button_label cke_button__maximize_label" aria-hidden="false">全屏</span>
                                        </a>
                                    </span>
                                    <span class="cke_toolbar_end"></span>
                                </span>
                                <span id="cke_31" class="cke_toolbar" aria-labelledby="cke_31_label" role="toolbar">
                                    <span id="cke_31_label" class="cke_voice_label">文档</span>
                                    <span class="cke_toolbar_start"></span>
                                    <span class="cke_toolgroup" role="presentation">
                                        <a id="cke_32" class="cke_button cke_button__source  cke_button_off" href="javascript:void('源码')" title="源码" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_32_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(66,event);" onfocus="return CKEDITOR.tools.callFunction(67,event);" onmousedown="return CKEDITOR.tools.callFunction(68,event);" onclick="CKEDITOR.tools.callFunction(69,this);return false;">
                                            <span class="cke_button_icon cke_button__source_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -840px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_32_label" class="cke_button_label cke_button__source_label" aria-hidden="false">源码</span>
                                        </a>
                                    </span>
                                    <span class="cke_toolbar_end"></span>
                                </span>
                                <span class="cke_toolbar_break"></span>
                                <span id="cke_33" class="cke_toolbar" aria-labelledby="cke_33_label" role="toolbar">
                                    <span id="cke_33_label" class="cke_voice_label">基本格式</span>
                                    <span class="cke_toolbar_start"></span>
                                    <span class="cke_toolgroup" role="presentation">
                                        <a id="cke_34" class="cke_button cke_button__bold  cke_button_off" href="javascript:void('加粗')" title="加粗" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_34_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(70,event);" onfocus="return CKEDITOR.tools.callFunction(71,event);" onmousedown="return CKEDITOR.tools.callFunction(72,event);" onclick="CKEDITOR.tools.callFunction(73,this);return false;">
                                            <span class="cke_button_icon cke_button__bold_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -24px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_34_label" class="cke_button_label cke_button__bold_label" aria-hidden="false">加粗</span>
                                        </a>
                                        <a id="cke_35" class="cke_button cke_button__italic  cke_button_off" href="javascript:void('倾斜')" title="倾斜" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_35_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(74,event);" onfocus="return CKEDITOR.tools.callFunction(75,event);" onmousedown="return CKEDITOR.tools.callFunction(76,event);" onclick="CKEDITOR.tools.callFunction(77,this);return false;">
                                            <span class="cke_button_icon cke_button__italic_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -48px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_35_label" class="cke_button_label cke_button__italic_label" aria-hidden="false">倾斜</span>
                                        </a>
                                        <a id="cke_36" class="cke_button cke_button__strike  cke_button_off" href="javascript:void('删除线')" title="删除线" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(78,event);" onfocus="return CKEDITOR.tools.callFunction(79,event);" onmousedown="return CKEDITOR.tools.callFunction(80,event);" onclick="CKEDITOR.tools.callFunction(81,this);return false;">
                                            <span class="cke_button_icon cke_button__strike_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -72px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_36_label" class="cke_button_label cke_button__strike_label" aria-hidden="false">删除线</span>
                                        </a>
                                        <span class="cke_toolbar_separator" role="separator"></span>
                                        <a id="cke_37" class="cke_button cke_button__removeformat  cke_button_off" href="javascript:void('清除格式')" title="清除格式" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(82,event);" onfocus="return CKEDITOR.tools.callFunction(83,event);" onmousedown="return CKEDITOR.tools.callFunction(84,event);" onclick="CKEDITOR.tools.callFunction(85,this);return false;">
                                            <span class="cke_button_icon cke_button__removeformat_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -792px;background-size:auto;">&nbsp;</span>
                                            <span id="cke_37_label" class="cke_button_label cke_button__removeformat_label" aria-hidden="false">清除格式</span>
                                        </a>
                                    </span>
                                    <span class="cke_toolbar_end"></span>
                                </span>
                                <span id="cke_38" class="cke_toolbar" aria-labelledby="cke_38_label" role="toolbar">
                                    <span id="cke_38_label" class="cke_voice_label">段落</span>
                                    <span class="cke_toolbar_start"></span>
                                    <span class="cke_toolgroup" role="presentation"><a id="cke_39" class="cke_button cke_button__numberedlist  cke_button_off" href="javascript:void('编号列表')" title="编号列表" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_39_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(86,event);" onfocus="return CKEDITOR.tools.callFunction(87,event);" onmousedown="return CKEDITOR.tools.callFunction(88,event);" onclick="CKEDITOR.tools.callFunction(89,this);return false;">
                                        <span class="cke_button_icon cke_button__numberedlist_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -648px;background-size:auto;">&nbsp;</span>
                                        <span id="cke_39_label" class="cke_button_label cke_button__numberedlist_label" aria-hidden="false">编号列表</span>
                                    </a>
                                    <a id="cke_40" class="cke_button cke_button__bulletedlist  cke_button_off" href="javascript:void('项目列表')" title="项目列表" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_40_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(90,event);" onfocus="return CKEDITOR.tools.callFunction(91,event);" onmousedown="return CKEDITOR.tools.callFunction(92,event);" onclick="CKEDITOR.tools.callFunction(93,this);return false;">
                                        <span class="cke_button_icon cke_button__bulletedlist_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -600px;background-size:auto;">&nbsp;</span>
                                        <span id="cke_40_label" class="cke_button_label cke_button__bulletedlist_label" aria-hidden="false">项目列表</span>
                                    </a>
                                    <span class="cke_toolbar_separator" role="separator"></span>
                                    <a id="cke_41" class="cke_button cke_button__outdent cke_button_disabled " href="javascript:void('减少缩进量')" title="减少缩进量" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" aria-haspopup="false" aria-disabled="true" onkeydown="return CKEDITOR.tools.callFunction(94,event);" onfocus="return CKEDITOR.tools.callFunction(95,event);" onmousedown="return CKEDITOR.tools.callFunction(96,event);" onclick="CKEDITOR.tools.callFunction(97,this);return false;">
                                        <span class="cke_button_icon cke_button__outdent_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -456px;background-size:auto;">&nbsp;</span>
                                        <span id="cke_41_label" class="cke_button_label cke_button__outdent_label" aria-hidden="false">减少缩进量</span>
                                    </a>
                                    <a id="cke_42" class="cke_button cke_button__indent cke_button_disabled" href="javascript:void('增加缩进量')" title="增加缩进量" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_42_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(98,event);" onfocus="return CKEDITOR.tools.callFunction(99,event);" onmousedown="return CKEDITOR.tools.callFunction(100,event);" onclick="CKEDITOR.tools.callFunction(101,this);return false;" aria-disabled="true">
                                        <span class="cke_button_icon cke_button__indent_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -408px;background-size:auto;">&nbsp;</span>
                                        <span id="cke_42_label" class="cke_button_label cke_button__indent_label" aria-hidden="false">增加缩进量</span>
                                    </a>
                                    <span class="cke_toolbar_separator" role="separator"></span>
                                    <a id="cke_43" class="cke_button cke_button__blockquote  cke_button_off" href="javascript:void('块引用')" title="块引用" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(102,event);" onfocus="return CKEDITOR.tools.callFunction(103,event);" onmousedown="return CKEDITOR.tools.callFunction(104,event);" onclick="CKEDITOR.tools.callFunction(105,this);return false;">
                                        <span class="cke_button_icon cke_button__blockquote_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 -168px;background-size:auto;">&nbsp;</span>
                                        <span id="cke_43_label" class="cke_button_label cke_button__blockquote_label" aria-hidden="false">块引用</span>
                                    </a>
                                </span>
                                <span class="cke_toolbar_end"></span>
                            </span>
                            <span id="cke_44" class="cke_toolbar" aria-labelledby="cke_44_label" role="toolbar"><span id="cke_44_label" class="cke_voice_label">样式</span>
                            <span class="cke_toolbar_start"></span>
                            <span id="cke_8" class="cke_combo cke_combo__styles cke_combo_off" role="presentation">
                                <span id="cke_8_label" class="cke_combo_label">样式</span>
                                <a class="cke_combo_button" hidefocus="true" title="样式" tabindex="-1" "="" href="javascript:void('样式')" role="button" aria-labelledby="cke_8_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(107,event,this);" onmousedown="return CKEDITOR.tools.callFunction(109,event);" onfocus="return CKEDITOR.tools.callFunction(108,event);" onclick="CKEDITOR.tools.callFunction(106,this);return false;">
                                    <span id="cke_8_text" class="cke_combo_text">Italic Title</span><span class="cke_combo_open"><span class="cke_combo_arrow"></span>
                                </span>
                            </a>
                        </span>
                        <span id="cke_9" class="cke_combo cke_combo__format cke_combo_off" role="presentation">
                            <span id="cke_9_label" class="cke_combo_label">格式</span>
                            <a class="cke_combo_button" hidefocus="true" title="格式" tabindex="-1" "="" href="javascript:void('格式')" role="button" aria-labelledby="cke_9_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(111,event,this);" onmousedown="return CKEDITOR.tools.callFunction(113,event);" onfocus="return CKEDITOR.tools.callFunction(112,event);" onclick="CKEDITOR.tools.callFunction(110,this);return false;">
                                <span id="cke_9_text" class="cke_combo_text">标题 2</span>
                                <span class="cke_combo_open"><span class="cke_combo_arrow"></span>
                            </span>
                        </a>
                    </span>
                    <span class="cke_toolbar_end"></span>
                </span>
                <span id="cke_45" class="cke_toolbar" aria-labelledby="cke_45_label" role="toolbar">
                    <span id="cke_45_label" class="cke_voice_label">about</span>
                    <span class="cke_toolbar_start"></span>
                    <span class="cke_toolgroup" role="presentation">
                        <a id="cke_46" class="cke_button cke_button__about  cke_button_off" href="javascript:void('关于 CKEditor')" title="关于 CKEditor" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_46_label" aria-haspopup="false" onkeydown="return CKEDITOR.tools.callFunction(114,event);" onfocus="return CKEDITOR.tools.callFunction(115,event);" onmousedown="return CKEDITOR.tools.callFunction(116,event);" onclick="CKEDITOR.tools.callFunction(117,this);return false;">
                            <span class="cke_button_icon cke_button__about_icon" style="background-image:url(file:///E:/Web/SpaceLab/assets/plugins/ckeditor/plugins/icons.png?t=E0LB);background-position:0 0px;background-size:auto;">&nbsp;</span>
                            <span id="cke_46_label" class="cke_button_label cke_button__about_label" aria-hidden="false">关于 CKEditor</span>
                        </a>
                    </span>
                    <span class="cke_toolbar_end"></span>
                </span>
            </span>
        </span>
        <div id="cke_1_contents" class="cke_contents cke_reset" role="presentation" style="height: 200px;">
            <span id="cke_50" class="cke_voice_label">按 ALT+0 获得帮助</span>
            <iframe src="" frameborder="0" class="cke_wysiwyg_frame cke_reset" style="width: 437px; height: 100%;" title="所见即所得编辑器, editor1" aria-describedby="cke_50" tabindex="0" allowtransparency="true"></iframe>
        </div>
        <span id="cke_1_bottom" class="cke_bottom cke_reset_all" role="presentation" style="user-select: none;">
            <span id="cke_1_resizer" class="cke_resizer cke_resizer_vertical cke_resizer_ltr" title="拖拽以改变大小" onmousedown="CKEDITOR.tools.callFunction(0, event)">◢</span>
            <span id="cke_1_path_label" class="cke_voice_label">元素路径</span>
            <span id="cke_1_path" class="cke_path" role="group" aria-labelledby="cke_1_path_label">
                <a id="cke_elementspath_6_1" href="javascript:void('body')" tabindex="-1" class="cke_path_item" title="body 元素" hidefocus="true" onkeydown="return CKEDITOR.tools.callFunction(119,1, event );" onclick="CKEDITOR.tools.callFunction(118,1); return false;" role="button" aria-label="body 元素">body</a>
                <a id="cke_elementspath_6_0" href="javascript:void('h2')" tabindex="-1" class="cke_path_item" title="h2 元素" hidefocus="true" onkeydown="return CKEDITOR.tools.callFunction(119,0, event );" onclick="CKEDITOR.tools.callFunction(118,0); return false;" role="button" aria-label="h2 元素">h2</a>
                <span class="cke_path_empty">&nbsp;</span>
            </span>
        </span>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>


</section>