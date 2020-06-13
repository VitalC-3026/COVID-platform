<?php

namespace frontend\models;

use common\models\Resident;
use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $account;
    public $password;
    public $username;
    public $tel;
    public $name;
    public $sex;
    public $age;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account', 'name', 'tel'], 'trim'],
            ['account', 'required', 'message' => '账户不能为空'],
            ['account', 'unique', 'targetClass' => '\common\models\User', 'message' => '账户已存在'],
            ['account', 'string', 'min' => 18, 'max' => 18, 'tooShort' => '账户应为18位身份证号', 'tooLong' => '账户应为18位身份证号'],

            ['username', 'trim'],
            ['username', 'required', 'message' => '用户名不能为空'],
            ['username', 'string', 'min' => 1, 'max' => 10, 'tooShort' => '用户名的长度必须在1到10之间', 'tooLong' => '用户名的长度必须在1到10之间'],

            ['password', 'required', 'message' => '密码不能为空'],
            ['password', 'string', 'min' => 4, 'tooShort' => "密码长度必须大于等于4位"],

            ['name', 'required', 'message' => '姓名不能为空'],
            ['name', 'string', 'min' => 2, 'tooShort' => "姓名长度至少为两位"],

            ['sex', "required",'message'=>'性别不能为空'],
            ['age',"required",'message'=>'年龄不能为空'],
            ['age', 'number', 'min' => 1, 'max' => 150, 'message' => "请填写正确的年龄", 'tooBig'=>"请填写正确的年龄",'tooSmall'=>"请填写正确的年龄" ],

            ['tel', 'required', 'message' => '联系方式不能为空'],
            ['tel', 'number', 'min' => 10000000000, 'max' => 19999999999, 'message' => "请填写正确的联系方式", 'tooBig'=>"请填写正确的联系方式",'tooSmall'=>"请填写正确的联系方式" ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->account = $this->account;
        $user->setPassword($this->password);
        $user->setUsername($this->username);
        $user->setTel($this->tel);
        $user->setAge($this->age);
        $user->setSex($this->sex);
        $user->setName($this->name);

        if (Resident::getResidentByIdentity($this->account) != null)
            $user->setType(0);
        else
            $user->setType(3);
        $user->generateAuthKey();
        return $user->save();
    }
}