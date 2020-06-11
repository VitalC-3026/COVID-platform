<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\DateTime;
use common\models\News;
use common\models\PriorityList;

class RightsForm extends Model
{
    public $rights = [];
    public $account;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [[['rights'], 'safe'], ];
    }

    public function setRights(){
        if (empty($this->rights)) {
            return 1;
        }
        if (is_array($this->rights)) {
            return 2;
        }
        foreach ($this->rights as $r) {
            $grantPriority = new PriorityList();
            if(!empty(PriorityList::find()->where([
                'account' => $this->account, 'priority' => $r]))) {
                continue;
            }
            $grantPriority->account = $this->account;
            $grantPriority->priority = $r;
            $grantPriority->save();
        }
        return 0;
    }

    
}