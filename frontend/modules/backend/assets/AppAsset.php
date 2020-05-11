<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/backend';
    public $css = [
        //'css/site.css',
        'assets/plugins/bootstrap/css/bootstrap.min.css',
        'assets/css/font-awesome.min.css',
        'assets/css/animate.css',
        'assets/css/main.css',
        'assets/css/font-awesome.min.css',
        'assets/css/main.css',
        'assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css',
        'assets/plugins/todo/css/todos.css',
        'assets/plugins/morris/css/morris.css'
        'assets/js/modernizr-2.6.2.min.js'
    ];
    public $js = [
        //'vendor/bootstrap/js/bootstrap.min.js',
        //'vendor/jquery/jquery-1.11.1.min.js',
        'assets/js/jquery-1.10.2.min.js',
        'assets/plugins/bootstrap/js/bootstrap.min.js',
        'assets/plugins/waypoints/waypoints.min.js',
        'assets/js/application.js',
    ];
    public $depends = [
        /* bootstrap.js ������
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        */
        /*'yii\bootstrap\BootstrapAsset',
        'yii\web\YiiAsset',*/
     
    ];
    public static function addScript($view, $jsfile)
    {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    
    }
    
    public static function addCss($view, $cssfile)
    {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }
    
   
}