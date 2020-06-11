<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="item" style="width: 100%">
  <h4 style="font-weight:bold"><?= Html::encode($model->title ? $model->title : '（无题）') ?></h4>
    
  <p style="font-size:13px">
    
    <span style="color:#999">摘要：<?= $model->abstract ?></span>
  </p>
    
  <p class="info" style="margin: 15px 0">
    发布时间：<?= $model->date?> <?= $model->time?>
  </p>
    
  <div style="text-align:right">
    <p>
      <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => '查看']) ?>
      <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
        'title' => '删除',
        'data' => [
          'confirm' => '您确定要删除吗？',
          'method' => 'post',
          'params' => [
            'id' => $model->id,
            'action' => 'delete'
          ]
        ]
      ]) ?>
      
    </p>
  </div>
</div>
<hr style="width: 100%">