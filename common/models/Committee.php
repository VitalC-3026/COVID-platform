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
        if(User::find()->where(['account' => $account])->one()->type === 2) {
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

    public static function updatePriority($account) {
        $user = User::findOne($account);
        $user->type = 2;
        $user->update();
        $committee = static::findOne($account);
        $committee->is_admin = 1;
        $committee->update();
        $priority = PriorityType::findAll($account);
        foreach ($priority as $p) {
            $priorityList = new PriorityList();
            $priorityList->account = $account;
            $priorityList->priority = $p->priority;
            if(!$priorityList->isExists()) {
                $priorityList->save();
            }
        }
    }

    public static function deleteCommittee($account) {
        $committees = PriorityList::find()->where(['priority' => 3])->joinWith('committee')->orderBy(['in_date' => SORT_DESC])->all();
        foreach ($committees as $c) {
            if($c->account !== $account) {
                $newsList = News::find()->where(['account'=>$account])->all();
                if($newsList === null || !isset($newsList)) break;
                foreach ($newsList as $n) {
                    $n->account = $c->account;
                    $n->Com_id = $c->id;
                    $n->update();
                }
                break;
            }
        }
        $committee = Committee::find()->where(['account' => $account])->one();
        $committee->delete();
        $user = User::findOne($account);
        $user->type = 3;
        $user->update();
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