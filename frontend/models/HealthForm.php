<?php

namespace frontend\models;

use common\models\Health;
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
            [['account', 'createTime'], 'required'],
            [['account','createTime'], 'trim'],
            ['temperature', 'required', 'message' => '体温不能为空'],
            ['temperature', 'number', 'message' => '请填写正常体温', 'min' => 34, 'max' => 45, 'tooBig' => '请填写正常体温', 'tooSmall' => '请填写正常体温'],
        ];
    }


    /**
     * @return bool
     */
    public function submit()
    {
        $health = new Health();
        $health->setAccount($this->account);
        $health->setTemperature($this->temperature);
        $health->setId(Health::find()->max('id') + 1);
        date_default_timezone_set('prc');
        $health->setLastDate(date("Y-m-d", strtotime($this->createTime)));
        date_default_timezone_set('prc');
        $health->setLastTime(date("H:i:sa", strtotime($this->createTime)));
        $this->temperature=null;
        return $health->save();
    }
}