<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use common\models\PriorityType;
use common\models\PriorityList;
use common\models\User;

/**
 * Search form
 */
class SearchForm extends Model
{
    public $account;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['account', 'trim'],
            ['account', 'string', 'min' => 18, 'max' => 18,'tooShort'=> '查询编号应为18位','tooLong' => '身份证号应为18位']];
    }

    public function searchByAccount() {
        if(!$this->validate()) {
            return false;
        }
        $priority = PriorityType::find()->where(['name' => '分配权限']);
        if (Yii::$app->user->identity->type !== 2 && PriorityList::find()->where(['priority' => $priority, 'account' => Yii::$app->user->identity->account])->all() === null) {
            return false;
        }
        $user = User::find()->where(['account' =>$this->account])->one();
        if (!empty($user) && ($user->type === 1 || $uesr->type === 2)) {
            return $user->account;
        }
        return false;
    }
}
