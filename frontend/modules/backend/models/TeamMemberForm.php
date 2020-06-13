<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\TeamMember;
use common\models\User;

/**
 * 评论审核检索模型
 * 
 */
class TeamMemberForm extends Model
{
    public $name;
    public $id;         
    public $link;       
    public $info;       
    public $is_Leader;  
    public $account;
    public $password;    

    // rules
    public function rules(){
        return [
            ['account', 'trim'],
            ['account', 'required','message' => '身份证号不能为空'],
            ['account', 'findByAccount', 'message' => '用户不存在'],
            ['account', 'string', 'min' => 18, 'max' => 18,'tooShort'=> '身份证号应为18位','tooLong' => '身份证号应为18位'],

            ['password', 'string'],

            ['name', 'trim'],
            ['name', 'required','message' => '姓名不能为空'],
            ['name', 'string', 'min' => 2, 'max' => 10,'tooShort'=> '姓名的长度必须在2到10之间','tooLong' => '姓名的长度必须在2到10之间'],

            ['info', 'required','message' => '个人简介不能为空'],
            ['info', 'string'],
            
            ['link', 'required','message' => '作业链接不能为空'],
            ['link', 'string','message' => '请输入正确的链接'],
            
            ['id', 'required','message' => '编号不能为空'],
            ['id', 'string', 'min' => 7, 'max' => 7,'tooShort'=> '长度为7位','tooLong' => '长度为7位'],
            
        ];
    }

    public function findByAccount($attribute, $params) {
        if(User::findOne($this->account) === null) {
            $this->addError($attribute, '不存在该账号的用户');
        }
    }

    public function updateProfile() {
        if (!$this->validate()){
            return false;
        }

        $teammember = TeamMember::findOne($this->account);
        if($teammember !== null){
            $teammember->id = $this->id;
            $teammember->link = $this->link;
            $teammember->info = $this->info;
            return $teammember->update();
             
        }
        return false;
    } 

    public function setProfile($id) {
        
        $teammember = TeamMember::findOne($id);
        $teammember->account = $this->account;
        $teammember->update();
    } 

    public function setUser() {
        $user = User::findIdentity($this->account); 
        //未找到对应的用户或者密码不正确
        return $user != null && $user->validatePassword($this->password);
    }

    public function initMember($t) {
        if($t !== null) {
            if($t->id !== null) {
                $this->id = $t->id;
            }
            if($t->link !== null) {
                $this->link = $t->link;
            }
            if($t->info !== null) {
                $this->info = $t->info;
            }
            $user = User::findIdentity($t->account);
            $this->account = $t->account;
            $this->name = $user->name;
        }
    }
}