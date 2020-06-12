<?php

use frontend\controllers\NewsController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$cnt = 1;
?>

<!-- BEGIN: .cover -->
<div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h1 class="mb-0 heading text-white">社区新闻</h1>
        <p class="mb-0 text-white">
            风声雨声读书声，声声入耳；家事国事天下事，事事顺心
        </p>
      </div>
    </div>
  </div>
</div>

<div class="custom-breadcrumns-23195 border-bottom">
  <div class="container">
    <a href="index.php">主页</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">新闻</span>
  </div>
</div>
<!-- END: .cover -->


<!-- BEGIN: #main -->
<div id="main">
  
  <!-- BEGIN: .site-section -->
  <div class="site-section section-29101 overflow-hidden">
    <div class="container">
      <div class="row">
          <?php foreach ($news as $news): ?>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_<?= 1 + $news->id % 6 ?>.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#"><?= Html::encode("{$news->date} ({$news->time})") ?></a>
                <span class="mx-1">/</span>
                <a href="#"><?= Html::encode("{$news->cnt}") ?></a>
              </div>
              <h3 class="post-heading"><a href="<?=Url::to(['site/comments', 'id' => $news->id])?>"><?= Html::encode("{$news->title}") ?></a></h3>
              <p><?= Html::encode("{$news->abstract}") ?></p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>
          <?php endforeach; ?>
      </div>

      <div class="row">
        <div class="col-12 text-center">
          <ul class="pagination-76993">
              <?= LinkPager::widget(['pagination' => $pagination]) ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- END: .site-section -->

</div>
<!-- END: #main -->