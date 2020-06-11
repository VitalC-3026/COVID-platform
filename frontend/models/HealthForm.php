<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class HealthForm extends Model
{
    public $account;
    public $name;
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
            ['temperature', 'required', 'message' => '体温不能为空'],
            ['temperature', 'number', 'message' => '请填写正常体温', 'min' => 34, 'max' => 45, 'tooBig' => '请填写正常体温', 'tooSmall' => '请填写正常体温'],
        ];
    }


    /**
     * @param $pid
     * @return array
     */
    public function getCityList($pid)
    {
        $model = City::findAll(array('pid' => $pid));
        return ArrayHelper::map($model, 'id', 'name');
    }
}