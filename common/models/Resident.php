<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;

/**
 * 居民模型
 * @property string $account        身份证号
 * @property string $building       楼
 * @property string $unit           单元
 * @property string $room           房间
 */
class Resident extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%Resident}}';
    }

    // basic setters
    public function setBuilding($building) { $this->building = $building; }
    public function setUnit($unit) { $this->unit = $unit; }
    public function setRoom($room) { $this->room = $room; }

    // basic getters
    public function getBuilding() { return $this->building; }
    public function getUnit() { return $this->unit; }
    public function getRoom() { return $this->room; }

    // rules
    public function rules(){
        return [
          [['account', 'room'], 'trim'],
        ];
    }

    /**
     * 获取社区中所有的居民信息
    */
    public function getUser(){
        return $this->hasOne(User::className(), ['account' => 'account']);
    }

    /**
     *  根据身份证号判断是否已经存在居民
    */
    public static function getResidentByIdentity($account) {
        return static::findOne(['account' => $account]);
    }

    // 删除一条居民信息
    public static function deleteResident($id) {
        $model = Resident::findOne($id);
        if ($model !== null) {
            return $model->delete();
        }
        return false;
    }

}