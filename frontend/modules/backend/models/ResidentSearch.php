<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;

/**
 * 居民检索模型
 * 
 */
class ResidentSearch extends User
{
    public string $building;
    public string $unit;
    public string $room;

    // rules
    public function rules(){
        return [
          [['building', 'unit', 'room'], 'safe'],
        ];
    }

    public function search($params) {
        $query = User::find();
        $query->joinWith('resident', true, 'INNER JOIN');
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
                    'account', 
                    'username',
                    'sex',
                    'age',
                    'resident.unit' => [
                        'asc' => ['resident.unit' => SORT_ASC],
                        'desc' => ['resident.unit' => SORT_DESC],
                        'label' => '单元号'
                    ],
                    'resident.building' => [
                        'asc' => ['resident.building' => SORT_ASC],
                        'desc' => ['resident.building' => SORT_DESC],
                        'label' => '楼'
                    ],
                    'resident.room' => [
                        'asc' => ['resident.room' => SORT_ASC],
                        'desc' => ['resident.room' => SORT_DESC],
                        'label' => '房间号'
                    ]
                ]
            ]   
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['account' => $this->account])->andFilterWhere(['like', 'username' => $this->username])->andFilterWhere(['sex' => $this->sex])->andFilterWhere(['age' => $this->age]);

        return $provider;
    } 

    public function getIdentity($account) {
        
        $query = User::find()->joinWith(Resident::className(), ['account' => 'account'], true, 'INNER_JOIN')->asArray()->all();
        return $query;
    }

}