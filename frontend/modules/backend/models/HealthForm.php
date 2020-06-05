<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;

class HealthForm extends Model
{
    public $account;
    public $username;
    public $tel;
    public $sex;
    public $age;

    public $temperature;

    public $province;
    public $city;
    public $area;

    public $createTime;
    

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


    /**
     * @param $pid
     * @return array
     */
    public function getCityList($pid)
    {
        $model = City::findAll(array('pid'=>$pid));
        return ArrayHelper::map($model, 'id', 'name');
    }
}