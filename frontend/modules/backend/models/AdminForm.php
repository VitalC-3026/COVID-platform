<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;

class AdminForm extends Model
{
    public $account;
    public $username;
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
            // username, account, tel, room, unit, building are both required
            [['tel', 'username', 'account'], 'required'],
        ];
    }


    
}