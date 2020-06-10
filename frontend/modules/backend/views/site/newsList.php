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
    <form action="index.php?r=backend%2Fsite%2Fcensor" method="post">
      <input type="hidden" name="_csrf" value="<?=\Yii::$app->request->csrfToken?>">
      <input type="hidden" name="newsId" value="<?= $model->id ?>">
      <button class="btn btn-sm btn-danger" type="submitButton"><i class="fa fa-trash-o"></i></button>
    </form>
      <!-- <?= Html::a('<span class="glyphicon glyphicon-eye"></span>', ['read', 'id' => $model->id], ['title' => '查看']) ?>
      <div class="form" action="">
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
      ]) ?> -->
  </div>
</div>
<hr style="width: 100%">