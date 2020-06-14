<?php

/**
 * Team: NoCov
 * Coding by: 戚晓睿
 * 权限列表 model
*/

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 权限类型模型
 *
 * @property string $account            身份证号
 * @property int    $priority           权限编号
 */
class PriorityList extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%PriorityList}}";
    }

    // basic setters
    public function setPriority($priority) { $this->priority = $priority; }
    public function setAccount($account) { $this->account = $account; }

    // basic getters
    public function getPriority() { return $this->priority; }
    public function getAccount() { return $this->account; }

    public function isExists(){
        if($this->account === null && $this->priority === null) {
            return false;
        }
        $p = PriorityList::find()->where(['account'=>'account', 'priority'=>'priority']);
        return $p !== null ? true : false;
    }

    public function getCommittee(){
        return $this->hasOne(Committee::className(), ['account' => 'account']);
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['account' => 'account']);
    }

}