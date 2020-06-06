<?php

namespace common\models;

use Yii;

/**
 * 社区工作者模型
 *
 * @property string $inDate         入职时间
 * @property bool   $isAdmin        是否为超管
 */
class Committee extends User
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
        if (!$this->isAdmin)
        {
            echo 'Access failed.';
            return false;
        }
        $user = self::findOne($account);
        $user->setType($type);
        return true;
    }

    // basic setters
    public function setInDate($inDate) { $this->inDate = $inDate; }
    public function setIsAdmin($isAdmin) { $this->isAdmin = $isAdmin; }

    // basic getters
    public function getInDate() { return $this->inDate; }
    public function getIsAdmin() { return $this->isAdmin; }
}