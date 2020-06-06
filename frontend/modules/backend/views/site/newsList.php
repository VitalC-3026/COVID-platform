<?php
use yii\helpers\Html;
?>
<div class="item" style="width: 100%">
  <h4 style="font-weight:bold"><?= Html::encode($model->title ? $model->title : '（无题）') ?></h4>
    
  <p style="font-size:13px">
    
    <span style="color:#999">摘要：<?= $model->abstract ?></span>
  </p>
    
  <div style="margin:15px 0">
         
    <?= $model->date?><?= $model->time?>
  </div>
    
  <p class="info">
    发布时间：
  </p>
    
  <div style="text-align:right">
    <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => '查看']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['upcreate', 'id' => $model->id], ['title' => '修改']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
      'title' => '删除',
      'data' => [
        'confirm' => '您确定真的要删除吗？',
        'method' => 'post',
      ]
    ]) ?>
  </div>
</div>
<hr style="width: 100%">