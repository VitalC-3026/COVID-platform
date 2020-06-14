<?php


namespace common\models;
use Yii;
use yii\db\ActiveRecord;

/**
 * 事务模型
 *
 * @property string $account          所属用户
 * @property string $start_time       开始时间
 * @property string $end_time         结束时间
 * @property float $info              任务描述
 * @property string $is_finished      是否完成
 */
class Transactions extends ActiveRecord
{
    public static function tableName(){
        return '{{%Transactions}}';
    }

    /**
     * @param string $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * @param string $start_time
     */
    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;
    }

    /**
     * @param string $end_time
     */
    public function setEndTime($end_time)
    {
        $this->end_time = $end_time;
    }

    /**
     * @param float $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @param string $is_finished
     */
    public function setIsFinished($is_finished)
    {
        $this->is_finished = $is_finished;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * @return float
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function getIsFinished()
    {
        return $this->is_finished;
    }
}