<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\DateTime;
use common\models\News;

class CensorForm extends Model
{
    public $action;
    public $newsId;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    
}