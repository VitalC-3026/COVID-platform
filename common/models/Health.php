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
 * @property float  $temperature    体温
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
    public function setLastDate($date) { $this->lastDate = $date; }
    public function setLastTime($time) { $this->lastTime = $time; }
    public function setTemperature($temperature) { $this->temperature = $temperature; }

    /**
     * get 方法整合
     */
    public function getId() { return $this->id; }
    public function getLastDate() { return $this->lastDate; }
    public function getLastTime() { return $this->lastTime; }
    public function getTemperature() { return $this->temperature; }
}