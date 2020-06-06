<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 新闻模型
 *
 * @property string $date           日期
 * @property string $time           时间
 * @property string $title          标题
 * @property string $abstract       摘要
 * @property string $link           链接
 */
class News extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%News}}';
    }

    /**
     * 检查日期、时间、链接是否符合格式
     *
     * @see News::check()
     * @see News::checkDate()
     * @see News::checkTime()
     * @see News::checkLink()
     */
    private function check()
    {
        if (!$this->checkDate($this->date)) return false;
        if (!$this->checkTime($this->time)) return false;
        if (!$this->checkLink($this->link)) return false;
        return true;
    }
    private function checkDate($date)
    {
        // check date
        $len = strlen($date);
        if ($len == 8)
        {
            // format like 20200210
            $year = number_format(substr($date, 0, 4));
            if ($date[4] != '0' || $date[4] != '1')
            {
                echo 'Wrong Month Format!';
                return false;
            }
            else
            {
                if ($date[4] == '0')
                    $month = number_format(substr($date, 5, 1));
                else
                    $month = number_format(substr($date, 4, 2));
            }
            if ($date[6] != '0' || $date[6] != '1' || $date[6] != '2' || $date[6] != '3')
            {
                echo 'Wrong Day Format!';
                return false;
            }
            else
            {
                if ($date[6] == '0')
                    $day = number_format(substr($date, 7, 1));
                else
                    $day = number_format(substr($date, 6, 2));
            }
        }
        else if ($len == 10)
        {
            // format like 2020-02-10
            if ($date[4] != '-' || $date[7] != '-')
            {
                echo 'Wrong Date Format!';
                return false;
            }
            $year = number_format(substr($date, 0, 4));
            if ($date[5] != '0' || $date[5] != '1')
            {
                echo 'Wrong Month Format!';
                return false;
            }
            else
            {
                if ($date[5] == '0')
                    $month = number_format(substr($date, 6, 1));
                else
                    $month = number_format(substr($date, 5, 2));
            }
            if ($date[8] != '0' || $date[8] != '1' || $date[8] != '2' || $date[8] != '3')
            {
                echo 'Wrong Day Format!';
                return false;
            }
            else
            {
                if ($date[8] == '0')
                    $day = number_format(substr($date, 9, 1));
                else
                    $day = number_format(substr($date, 8, 2));
            }
        }
        else
            return false;
        if (!checkdate($month, $day, $year))
        {
            echo 'Wrong Date Format!';
            return false;
        }
        else
            return true;
    }
    private function checkTime($time)
    {
        // check time

        return true;
    }
    private function checkLink($link)
    {
        // check link

        return true;
    }

    /**
     * set方法整合
     *
     * @param {$value} - 要设置的参数
     * @return bool - set成功返回true，否则false
     */
    public function setDate($date)
    {
        $f = $this->checkDate($date);
        if ($f) $this->date = $date;
        return $f;
    }
    public function setTime($time)
    {
        $f = checkTime($time);
        if ($f) $this->time = $time;
        return $f;
    }
    public function setTitle($title) { $this->title = $title; }
    public function setAbstract($abstract) { $this->abstract = $abstract; }
    public function setLink($link) { if ($this->checkLink($link)) $this->link = $link; }

    /**
     * get
     *
     * @return string
     */
    public function getDate() { return $this->date; }
    public function getTime() { return $this->time; }
    public function getTitle() { return $this->title; }
    public function getAbstract() { return $this->abstract; }
    public function getLink() { return $this->link; }

    /**
     * 查询获得所有的新闻
     */
    public function getNews() 
    {
        return self::find()->asArray()->all();

    }


}