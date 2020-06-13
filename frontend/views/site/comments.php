<?php

use frontend\controllers\NewsController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

if (sizeof($news) != 0)
    $news = $news[0];
?>

<!-- BEGIN: .cover -->
<div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h1 class="mb-0 heading text-white"><?=Html::encode("{$news->title}")?></h1>
                <p class="mb-0 text-white">
                    <?=Html::encode("日期: {$news->date}  {$news->time}") ?>
                    <br>
                    <?=Html::encode("浏览人数： {$news->cnt}") ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns-23195 border-bottom">
    <div class="container">
        <a href="index.php">主页</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="<?=Url::to(['site/news'])?>">新闻</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">评论</span>
    </div>
</div>
<!-- END: .cover -->


<!-- BEGIN: #main -->
<div id="main">

    <!-- BEGIN: .site-section -->
    <div class="site-section section-29101 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
                    <!-- BEGIN: .post-entry-big-22796 -->
                    <div class="post-entry-big-22796">
                        <a href="#" class="img-link"><img src="assets/frontend/images/img_<?= 1 + $news->id % 6 ?>.jpg" alt="Image" class="img-fluid"></a></div>
                    <!-- END: .post-entry-big-22796 -->
                </div>
                <div style="width: 100px"></div>
                <div class="h1" style="color: #2e86c1">
                    摘要
                    <br><br>
                    <div class="h5" style="color: #000000;"><?=Html::encode("{$news->abstract}")?></div>
                </div>
            </div>
            <div class="row">
                <div style="width: 20px"></div>
                <div class="h1" style="color: #2e86c1">
                    正文
                    <br><br>
                    <div class="h5" style="color: #000000;"><?=Html::encode("{$news->content}")?></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div style="width: 20px"></div>
                <div class="h1">
                    评论区
                </div>
            </div>
            <?php
                function getColor() {
                    $colors = ['#2e86c1', '#2e741d', '#aa00ff', '#d41020', '#00ad35', '#4e79cc', '#dcd400', '#ece312'];
                    $p = rand(0, 7);
                    return $colors[$p];
                }
            ?>
            <!-- START: comments -->
            <?php foreach ($comments as $comment):
                if (!$comment->visible) continue; ?>
                <div class="row" style="height: 50px">
                    <div style="width: 50px;"></div>
                    <div class="h3" style="color: <?=getColor();?>">
                        <?=Html::encode("{$comment->author}")?></div>
                    <div style="width: <?=200 - 10 * strlen($comment->author)?>px"></div>
                    <div class="h5" style="color: #000000;">
                        <?=Html::encode("{$comment->content}")?>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- END: comments -->

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'content')->label("我要评论")?>
            <div class="form-group" style="display: none">
                <?= $form->field($model, 'New_id')->textInput(['value' => $news->id])?>
                <?= $form->field($model, 'author')->textInput([
                        'value' => Yii::$app->user->getIsGuest() ? "anonymous" : Yii::$app->user->getIdentity()->name])?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary'])?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <!-- END: .site-section -->

</div>
<!-- END: #main -->