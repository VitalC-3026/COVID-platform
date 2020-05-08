<?php
namespace frontend\models;

use common\models\MyUser;
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['account', 'trim'],
            ['account', 'required'],
            ['account', 'unique', 'targetClass' => '\common\models\MyUser', 'message' => 'This account has already been taken.'],
            ['account', 'string', 'length' => 18],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 1, 'max' => 20],

            ['password', 'required'],
            ['password', 'string', 'min' => 4],
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
        
        $user = new MyUser();
        $user->account = $this->account;
        $user->setPassword($this->password);
        $user->setUsername($this->username);
        $user->generateAuthKey();
        return $user->save() ;

    }
}
