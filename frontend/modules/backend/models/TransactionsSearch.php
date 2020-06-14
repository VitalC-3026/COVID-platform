<?php

/**
 * Team: NoCov
 * Coding by: 肖中遥
 * 待办事务提交表格 model
*/

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\DateTime;
use common\models\News;

class TransactionsForm extends Model
{
    public $info;
    public $createTime;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [['info','required']];
    }

    
}