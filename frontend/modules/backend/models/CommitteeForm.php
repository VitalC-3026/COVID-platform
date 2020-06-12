<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Committee;
use common\models\PriorityList;
use common\models\PriorityType;

class CommitteeForm extends Model
{
    public $account;
    public $username;
    public $age;
    public $tel;
    public $sex;
    public $priority;
    public $enterdate;
    public $rights;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['account', 'trim'],
            ['account', 'required','message' => '身份证号不能为空'],
            ['account', 'unique', 'targetClass' => '\common\models\Committee', 'message' => '职员已存在'],
            /*['account', 'unique', 'targetClass' => '\common\models\User', 'message' => '身份证号已存在'],*/
            ['account', 'string', 'min' => 18, 'max' => 18,'tooShort'=> '身份证号应为18位','tooLong' => '身份证号应为18位'],

            ['username', 'trim'],
            ['username', 'required','message' => '姓名名不能为空'],
            ['username', 'string', 'min' => 2, 'max' => 10,'tooShort'=> '姓名名的长度必须在2到10之间','tooLong' => '用户名的长度必须在2到10之间'],

            ['tel', 'required','message' => '联系方式不能为空'],
            ['tel', 'string', 'min' => 11, 'max' => 11, 'tooShort' => '联系方式长度必须等于11位', 'tooLong' => '联系方式长度必须等于11位'],

            ['priority', 'required','message' => '必须分配权限'],

            ['age', 'trim'],
            ['age', 'required','message' => '年龄不能为空'],
            ['age', 'number', 'min' => 18, 'max' => 70,'tooSmall'=> '年龄必须在18-70岁之间','tooBig' => '年龄必须在18-70岁之间'],
        ];
    }

    /**
     * Add committee.
     *
     * @return bool whether the creating new committee is successful
     */
    public function addCommittee($in_date) 
    {
        if(!$this->validate() || $committee->getCommitteeByIdentity($this->account)) {
            return false;
        }

        // 更新用户表
        $user = new User();
        $committee = new Committee();
        if($user->findIdentity($this->account)) {
            $user->account = $this->account;
            $user->type = $this->priority;
            $user->name = $this->username;
            if ($user->username === null) {
                $user->username = $this->username;
            }
            $user->tel = $this->tel;
            if ($this->sex !== null) {
                $user->sex = $this->sex; 
            } else {
                $user->sex = 1;
            }
            $user->age = $this->age;
            $user->update();
        } else {
            $user->account = $this->account;
            $user->password_hash = Yii::$app->security->generatePasswordHash(substr($this->account, 11, 6));
            $user->type = $this->priority;
            $user->name = $this->username;
            if ($user->username === null) {
                $user->username = $this->username;
            }
            $user->tel = $this->tel;
            if ($this->sex !== null) {
                $user->sex = $this->sex; 
            } else {
                $user->sex = 1;
            }
            $user->age = $this->age;
            $user->insert();
        }
        
        // 更新职员表
        $committee->account = $this->account;
        if($this->priority === 2) {
            $committee->is_admin = 1;
        } else {
            $committee->is_admin = 0;
        }
        $committee->in_date = $in_date;
        $committee->insert(); 
        
        $priorityType = PriorityType::find()->all();
        if($this->priority === 2) {
            foreach ($priorityType as $p) {
                $priorityList = new PriorityList();
                $priorityList->account = $this->account;
                $priorityList->priority = $p->priority;
                $priorityList->save();
            }
        }
        return true;
    }

    /**
     * Add committee.
     *
     * @return bool whether the creating new committee is successful
     */
    public function updateCommittee($id) 
    {
        $user = User::findOne($id);
        $committee = Committee::findOne($id);
        if(!$this->validate() && $user === null) {
            return false;
        }
        
        $user->account = $this->account;
        $user->type = $this->priority;
        $user->name = $this->username;
        if ($user->username === null) {
            $user->username = $this->username;
        }
        $user->tel = $this->tel;
        $user->sex = $this->sex;     
        $user->age = $this->age;
        $user->update();
        
        if($committee !== null) {
            if($this->priority === 2) {
                $committee->is_admin = 1;
            } else {
                $committee->is_admin = 0;
            }
            $committee->update();
        } else {
            return false;
        }
        return true;
    }
}