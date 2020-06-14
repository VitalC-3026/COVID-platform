<?php
/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 职权简介视图 view 用于ListView
*/
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#'.$model->priority?>" class="collapsed"><?= $model->name ?></a>
        </h4>
    </div>
    <div id="<?= $model->priority?>" class="panel-collapse collapse">
        <div class="panel-body">
            <p><?= $model->information ?></p>
        </div>
    </div>
</div>

