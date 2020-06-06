<?php
/*
 * 本模型用于修改用户信息，因为修改完成信息和修改之前信息都为MyUser类，因此只用继承MyUser类即可
 * 新增变量$newpassword,$newusername，用来表示修改后的值
 */

namespace frontend\models;


use common\models\User;
use phpDocumentor\Reflection\Types\This;
use yii\base\Model;

class ModifyForm extends Model
{
    public $newpassword;
    public $newusername;
    public $account;
    public $password;
    public $user;

    /*
     * 表单验证规则，修改的account必须已经存在，并且密码正确
     * 密码和用户名规则仍然同以前一样
     */
    public function rules()
    {
        return [
            ['account', 'trim'],
            ['account', 'required'],
            ['account', 'string', 'length' => 18],

            ['newusername', 'trim'],
            ['newusername', 'required'],
            ['newusername', 'string', 'min' => 1, 'max' => 20],

            ['password', 'required'],
            ['password', 'string', 'min' => 4],

            ['newpassword', 'required'],
            ['newpassword', 'string', 'min' => 4]
        ];
    }

    /*
     * 设置修改的用户，在修改时必须调用
     * 如果验证合法，返回true，否则返回false
     * @return bool
     */
    public function setMyUser()
    {
        $this->user = User::findIdentity($this->account);
        //未找到对应的用户或者密码不正确
        return $this->user != null && $this->user->validatePassword($this->password);
    }

    /*
     * 存储新的用户信息
     */
    public function setInfo()
    {
        $this->user->setPassword($this->newpassword);
        $this->user->setUsername($this->newusername);
        $this->user->generateAuthKey();
        $this->user->save();
    }

}