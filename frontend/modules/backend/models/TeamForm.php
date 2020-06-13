<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use common\models\TeamMember;
use common\models\Team;

class TeamForm extends Model
{
    public $id;
    public $name;
    public $abstract;
    public $gitCnt;
    public $memCnt;
    public $days;
    public $files;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            [['name'], 'required', 'message' => '团队名称怎么能没有呢？'],
            ['name', 'string', 'min' => 1, 'max' => 20, 'tooShort' => '团队名称太短啦！', 'tooLong' => '团队名称太长啦！'],
            ['abstract', 'trim'],
            ['abstract', 'string', 'min' => 1, 'max' => 200, 'tooShort' => '摘要长度不得超过200个字', 'tooLong' => '摘要长度不得超过200个字'],
            ['gitCnt', 'number', 'min' => 0, 'tooSmall' => '提交次数怎么会是负数？'],
            ['memCnt', 'number', 'min' => 0, 'tooSmall' => '成员肯定很多啦！'],
            ['days', 'number', 'min' => 1, 'tooSmall' => '开发天数怎么会是负数？'],
            ['files', 'number', 'min' => 0, 'tooSmall' => '文件数怎么会是负数？']

        ];
    }

    public function edit() 
    {
        $team = new Team();
        if (!$this->validate()) {
            return false;
        }
        $team->name = $this->name;
        $team->gitCnt = $this->gitCnt;
        $team->memCnt = $this->memCnt;
        $team->days = $this->days;
        $team->files = $this->files;
        $team->abstract = $this->abstract;
        return $team->save();
    }

    public function initTeam()
    {
        $id = TeamMember::findOne(Yii::$app->user->identity)->Team_id;
        $team = Team::findOne($id);
        if($team !== null) {
            $this->id = $team->id;
            $this->name = $team->name;
            $this->gitCnt = $team->gitCnt;
            $this->memCnt = $team->memCnt;
            $this->days = $team->days;
            $this->files = $team->files;
            $this->abstract = $team->abstract;
        } else {
            $this->id = 0;
            $this->name = '无';
            $this->gitCnt = 0;
            $this->memCnt = 0;
            $this->days = 0;
            $this->files = 0;
            $this->abstract = '无';
        }
        
    }

    
}