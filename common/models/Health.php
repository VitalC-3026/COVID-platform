<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 健康模型
 *
 * @property string $id             标号
 * @property string $lastDate       最后填报日期
 * @property string $lastTime       最后填报时间
 * @property float $temperature    体温
 * @property string $account         填写的用户
 */
class Health extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%Health}}';
    }

    /**
     * set 方法整合
     *
     * @param {$value} - 要设置的参数
     */
    public function setLastDate($date)
    {
        $this->last_date = $date;
    }

    public function setLastTime($time)
    {
        $this->last_time = $time;
    }

    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    public function setAccount($account)
    {
        $this->account = $account;
    }
    public function setId($id)
    {
        $this->id = $id;
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

    public function getLastDate()
    {
        return $this->lastDate;
    }

    public function getLastTime()
    {
        return $this->lastTime;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }
}