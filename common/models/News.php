<?php

namespace common\models;

use Yii;

/**
 * 信息模型
 *
 */
class News
{
    private $date;
    private $time;
    private $title;
    private $abstract;
    private $link;


    public function getDate() { return $this->date; }
    public function getTime() { return $this->time; }
    public function getTitle() { return $this->title; }
    public function getAbstract() { return $this->abstract; }
    public function getLink() { return $this->link; }
}