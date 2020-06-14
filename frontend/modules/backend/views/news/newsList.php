<?php

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 新闻列表小视图 view 用于ListView
*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="item" style="width: 100%">
  
  <h4 style="font-weight:bold"><?= Html::encode($model->title ? $model->title : '（无题）') ?></h4>
    
  <p style="font-size:13px">
    <?php if($model->visible) { ?>
      <i class="fa fa-check" style="color: green"></i>
    <?php } else { ?>
      <i class="fa fa-times" style="color: red"></i>
    <?php }?>
    <span style="color:#999">摘要：<?= $model->abstract ?></span>
  </p>
    
  <p class="info" style="margin: 15px 0">
    新闻链接：<?= $model->link === null ? '' : $model->link ?><br>
    发布时间：<?= $model->date?> <?= $model->time?>
  </p>
    
  <div style="text-align:right">
    <p>
      <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => '查看',]) ?>
      <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id],[
          'title' => '删除',
          /*'onclick' => 'if(confirm("删除后将无法恢复数据 确认删除？") === true) {window.location.href("<?= \yii\helpers\Url::to(["/backend/committee/create"]); ?>");}'*/
          'onclick' => 'return confirm("删除后将无法恢复数据 确认删除？");'
        ])
      ?>
    </p>
  </div>
</div>
<hr style="width: 100%">
