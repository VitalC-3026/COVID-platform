<?php

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 职员数据表格 model
*/

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
    public $priority;  // 等级
    public $enterdate;
    public $rights;   // 权限
    

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

            [['rights'], 'safe']
        ];
    }

    /**
     * 添加职员.
     *
     * @return bool 返回是否添加成功
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
            if($this->priority === 2) {
                $user->setType(2);
            } else {
                $user->setType(1);
            }
            $user->setName($this->username);
            if ($user->username === null) {
                $user->setUsername($this->username);
            }
            $user->setTel($this->tel);
            $user->setSex($this->sex); 
            $user->setAge($this->age);
            $u = $user->update();
        } else {
            $user->account = $this->account;
            $user->setPassword(substr($this->account, 11, 6));
            if($this->priority === 2) {
                $user->setType(2);
            } else {
                $user->setType(1);
            }
            $user->setName($this->username);
            $user->setUsername($this->username);
            $user->setTel($this->tel);
            $user->setSex($this->sex); 
            $user->setAge($this->age);
            $user->generateAuthKey();
            $u = $user->insert();
        }
        
        // 更新职员表
        $committee->account = $this->account;
        if($this->priority === 2) {
            $committee->setIsAdmin(1);
        } else {
            $committee->setIsAdmin(0);
        }
        $committee->setInDate($in_date);
        $c = $committee->insert(); 
        
        $priorityType = PriorityType::find()->all();
        if($this->priority === 2) {
            foreach ($priorityType as $p) {
                $priorityList = new PriorityList();
                $priorityList->setAccount($this->account);
                $priorityList->setPriority($p->priority);
                $priorityList->save();
            }
        } else {
            for ($i = 0; $i < sizeof($this->rights); $i++) {
                if ($this->rights[$i] == 0 || $this->rights[$i] == 1) {
                    continue;
                }
                $grantPriority = new PriorityList();
                $grantPriority->account = $this->account;
                $grantPriority->priority = $this->rights[$i];
                $grantPriority->save();
            }
        }

        if($c != null && $u != null) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * 更新职员数据.
     *
     * @return bool 返回是否更新成功
     */
    public function updateCommittee($id) 
    {
        $user = User::findOne($id);
        $committee = Committee::findOne($id);
        if(!$this->validate() && $user === null) {
            return false;
        }
        
        $user->setName($this->username);
        $user->account = $this->account;
        if ($user->username === null) {
            $user->setUsername($this->username);
        }
        $user->setTel($this->tel);
        $user->setSex($this->sex); 
        $user->setAge($this->age);
        $u = $user->update();
        
        if($u !== null) {
            return true;
        }
        return false;
    }
}