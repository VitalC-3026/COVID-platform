<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 健康模型
 *
 * @property string $id         编号
 * @property string $link       作业链接
 * @property string $info       个人简介
 * @property bool   $is_Leader  是否队长
 * @property string $account    挂靠的用户
 */
class TeamMember extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Teammember}}';
    }

    /**
     * set 方法整合
     *
     * @param {$value} - 要设置的参数
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }
    public function setIs_Leader($is_Leader)
    {
        $this->is_Leader = $is_Leader;
    }
    /**
     * get 方法整合
     */
    public function getAccount()
    {
        return $this->account;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getIs_Leader()
    {
        return $this->is_Leader;
    }

    // 联表查询 User x TeamMember
    public function getUser() {
        return $this->hasOne(User::className(), ['account' => 'account']);
    }
}