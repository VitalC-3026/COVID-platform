<?php

/**
 * Team: NoCov
 * Coding by: 戚晓睿
 * 新闻 model
*/

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 新闻模型
 * @property int    $id             新闻id
 * @property string $account        账号
 * @property string $date           日期
 * @property string $time           时间
 * @property string $title          标题
 * @property string $abstract       摘要
 * @property string $content        正文
 * @property string $link           链接
 * @property int    $cnt            浏览次数
 * @property bool   $visible        是否可见
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

    // basic setters
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
    // basic setters
    public function setId($id) { $this->id = $id; }
    public function setTitle($title) { $this->title = $title; }
    public function setAbstract($abstract) { $this->abstract = $abstract; }
    public function setContent($content) { $this->content = content; }
    public function setLink($link) { if ($this->checkLink($link)) $this->link = $link; }
    public function setCnt($cnt) { $this->cnt = cnt; }
    public function setVisible($visible)   { $this->visible = $visible; }

    // basic getters
    public function getId() { return $this->id; }
    public function getAccount() { return $this->account; }
    public function getDate() { return $this->date; }
    public function getTime() { return $this->time; }
    public function getTitle() { return $this->title; }
    public function getAbstract() { return $this->abstract; }
    public function getContent() { return $this->content; }
    public function getLink() { return $this->link; }
    public function getCnt() { return $this->cnt; }
    public function isVisible() { return $this->visible; }

    /**
     * 查询获得所有的新闻
     */
    public function getNews() 
    {
        return self::find()->asArray()->all();

    }

    /**
     * 合并时间
     */
    public function getDateTime() 
    {
        $datetime = $this->date." ".$this->time;
        return $datetime;

    }

    /**
     * 返回最早的修改的新闻
    */
    public static function getEarliestNews()
    {
        $minId = self::find()->where(['visible' => 0])->min('id');
        return self::findOne($minId);
    } 

    // 发布新闻
    public static function publish($id){
        $model = static::findOne($id);
        if($id === -1 || $model === null) {
            return $this->redirect(['index']);
        }
        $model->visible = 1;
        $committee = Committee::findOne(Yii::$app->user->identity->account);
        $model->account = $committee->account;
        $model->Com_id = $committee->id;
        $model->cnt = 0;
        $model->update();
    }

}