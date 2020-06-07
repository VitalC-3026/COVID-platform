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
          [['id', 'name', 'sex', 'age'], 'trim'],
          [['age'], 'integer'],
          ['name', 'string'],
        ];
    }

    /*public function search($params) {
        // $query = $this->getAllResident();
        // $query = self::find()->with('user');
        // $query = self::find()->where(['account' => Yii::$app->user->identity->account]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'p',
                'pageSizeParam' => 'pageSize',
            ],
            'sort' => [
                'defaultOrder' => [
                    'account' => SORT_DESC,
                ],
                'attributes' => [
                    'account', 'user.username', 'user.age','user.sex'
                ]
            ]   
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['account' => $this->account])->andFilterWhere(['like', 'username' => $this->username])->andFilterWhere(['sex' => $this->sex])->andFilterWhere(['age' => $this->age]);

        return $provider;
    } */


    /**
     * 获取社区中所有的居民信息
    */
    public function getUser(){
        return $this->hasOne(User::className(), ['account' => 'account']);
    }
}