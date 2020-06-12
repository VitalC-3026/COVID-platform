<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 社区工作者模型
 * @property string $account        身份证号
 * @property string $in_date         入职时间
 * @property bool   $is_admin        是否为超管
 */
class Committee extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%Committee}}';
    }

    /**
     * 授权
     *
     * @param $account - 被授权的用户
     * @param $type - 被授予的权限
     *
     * @return bool - 授权成功返回true，否则false
     */
    public function givePriority($account, $type)
    {
        if (!$this->is_admin)
        {
            echo 'Access failed.';
            return false;
        }
        $user = self::findOne($account);
        $user->setType($type);
        return true;
    }

    public static function hasPriority($account, $priority) 
    {
        $priority = $priority->one();
        if($priority->name === '查看社区数据库' && 
            User::find()->where(['account' => $account])->one()->type === 2) {
            return true;
        }
        $rights = PriorityList::find()->where(['account' => $account])->all();
        $i = 0;
        foreach ($rights as $r) {
            $rightsList[$i++] = $r['priority'];
        }
        if(isset($rightsList) && in_array($priority->priority, $rightsList)) {
            return true;
        }
        return false;
    }

    // basic setters
    public function setInDate($inDate) { $this->in_date = $inDate; }
    public function setIsAdmin($isAdmin) { $this->is_admin = $isAdmin; }

    // basic getters
    public function getInDate() { return $this->in_date; }
    public function getIsAdmin() { return $this->is_admin; }

    public function getUser() {
        return $this->hasOne(User::className(), ['account' => 'account']);
    }

    public function getCommitteeByIdentity($account){
        return static::findOne(['account' => $account]);
    }
}