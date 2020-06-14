<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/site.css'
       // 'assets/frontend/css/bootstrap/bootstrap.css',
       // 'assets/frontend/css/tiny-slider.css',
       // 'assets/frontend/fonts/lineicons/LineIcons.min.css',
       // 'assets/fonts/icomoon/style.css',
       // 'assets/frontend/css/animate.min.css',
       // 'assets/frontend/css/jquery.lavalamp.css',
       // 'assets/frontend/css/jquery.fancybox.min.css',
       // 'assets/frontend/css/style.css'

    ];
    public $js = [
       // 'assets/frontend/js/jquery-3.4.1.min.js',
       // 'assets/frontend/js/popper.min.js',
       // 'assets/frontend/js/bootstrap.min.js',
       // 'assets/frontend/js/jquery.waypoints.min.js',
       // 'assets/frontend/js/jquery.animateNumber.min.js',
       // 'assets/frontend/js/tiny-slider.js',
       // 'assets/frontend/js/jquery.fancybox.min.js',
       // 'assets/frontend/js/jquery.lavalamp.min.js',
       // 'assets/frontend/js/jquery.ajaxchimp.min.js',
       // 'assets/frontend/js/jquery.validate.min.js',
       // 'assets/frontend/js/jquery.easing.1.3.js',
       // 'assets/frontend/js/main.js',
        'assets/js/echarts.min.js',
        'assets/js/china.js',
        'assets/js/world.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset'
    ];
}


