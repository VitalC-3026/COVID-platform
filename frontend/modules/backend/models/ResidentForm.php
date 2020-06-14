<?php

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 居民数据表格 model
*/

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Resident;

class ResidentForm extends Model
{
    public $account;
    public $username;
    public $tel;
    public $age;
    public $sex;
    public $building;
    public $unit;
    public $room;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['account', 'trim'],
            ['account', 'required','message' => '身份证号不能为空'],
            ['account', 'unique', 'targetClass' => '\common\models\Resident', 'message' => '居民已存在'],
            ['account', 'string', 'min' => 18, 'max' => 18,'tooShort'=> '身份证号应为18位','tooLong' => '身份证号应为18位'],

            ['username', 'trim'],
            ['username', 'required','message' => '姓名不能为空'],
            ['username', 'string', 'min' => 2, 'max' => 10,'tooShort'=> '姓名的长度必须在2到10之间','tooLong' => '姓名的长度必须在2到10之间'],

            ['tel', 'required','message' => '联系方式不能为空'],
            ['tel', 'string', 'min' => 11, 'max' => 11, 'tooShort' => '联系方式长度必须等于11位', 'tooLong' => '联系方式长度必须等于11位'],

            ['sex', 'required','message' => '性别不能为空'],
            
            ['age', 'required','message' => '年龄不能为空'],
            ['age', 'number', 'min' => 0, 'max' => 150,'tooSmall'=> '年龄必须在0-150岁之间','tooBig' => '年龄必须在0-150岁之间'],
            
            ['unit', 'required','message' => '单元号不能为空'],
            ['unit', 'number', 'min' => 1, 'max' => 10,'tooSmall'=> '单元号必须在0-10之间','tooBig' => '单元号必须在0-10之间'],
            
            ['building', 'required','message' => '楼号不能为空'],
            ['building', 'number', 'min' => 1, 'max' => 99,'tooSmall'=> '楼号必须在1-99之间','tooBig' => '楼号必须在1-99之间'],

            ['room', 'trim'],
            ['room', 'required', 'message' => '房间号不能为空'],
            // ['room', 'match', 'pattern' => '/[2-9]{0}[1-6]/', 'message' => '请输入正确的房间号，示例：304'],
            ['room', 'validateRoom', 'message' => '请输入正确的房间号，示例：304']
        ];
    }


    // basic setters
    public function setBuilding($building) { $this->building = $building; }
    public function setUnit($unit) { $this->unit = $unit; }
    public function setRoom($room) { $this->room = $room; }

    // basic getters
    public function getBuilding() { return $this->building; }
    public function getUnit() { return $this->unit; }
    public function getRoom() { return $this->room; }

    // 验证房间号
    public function validateRoom($attribute, $params) {
        $room1 = '/[2-9]0[1-6]/';
        $room2 = '/[1-2][0-9]0[1-6]/';
        if (preg_match($room1, $this->room) === 0 && preg_match($room2, $this->room) === 0) {
            $this->addError($attribute, '请输入正确的房间号，示例：304');
            return false;
        }
        return true;
    }

    /**
     * Add Resident.
     *
     * @return bool whether creating new resident is successful
     */
    public function addResident() 
    {
        if(!$this->validate()) {
            return false;
        }

        $user = new User();
        $resident = new Resident();
        if($user->findIdentity($this->account)) {
            $user->account = $this->account;
            $user->setType(0);
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
            $user->setType(0);
            $user->setName($this->username);
            $user->setUsername($this->username);
            $user->setTel($this->tel);
            $user->setSex($this->sex); 
            $user->setAge($this->age);
            $user->generateAuthKey();
            $u = $user->insert();
        }
        if($resident->getResidentByIdentity($this->account)) {
            return false;
        } else {
            $resident->setAccount($this->account);
            $resident->setUnit($this->unit);
            $resident->setBuilding($this->building);
            $resident->setRoom($this->room);
            $r = $resident->insert();
        }
        
        if($u !== null && $r !== null) {
            return true;
        }
        return false;
    }

    /**
     * Update Resident.
     *
     * @return bool whether updating new resident is successful
     */
    public function updateResident($id) {
        $user = User::findOne($id);
        $resident = Resident::findOne($id);
        if(!$this->validate() && $resident === null) {
            return false;
        }

        
        if($user !== null) {
            $user->setName($this->username);
            $user->setTel($this->tel);
            $user->setSex($this->sex); 
            $user->setAge($this->age);
            $user->update();
        }

        if($resident !== null) {
            $resident->setRoom($this->room);
            $resident->setUnit($this->unit) ;
            $resident->setBuilding($this->building);
            $resident->update();
        }
        
        return true;
    }
}