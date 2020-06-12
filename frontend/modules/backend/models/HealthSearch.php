<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\PriorityType;
use common\models\PriorityList;
use common\models\Health;

class HealthSearch extends User
{
    public float $temperature;
    public function rules(){
        return [
            [['temperature'], 'safe'],
        ];
    }
    public function search($params)
    {
        $query = User::find();
        $query->joinWith('health', true, 'INNER JOIN');
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
                    'tel',
                    'health.temperature' => [
                        'asc' => ['health.temperature' => SORT_ASC],
                        'desc' => ['health.temperature' => SORT_DESC],
                        'label' => '体温'
                    ],
                ],
            ]
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['account' => $this->account])->andFilterWhere(['like','username' => $this->username])->andFilterWhere(['sex' => $this->sex])->andFilterWhere(['age' => $this->age])->andFilterWhere(['tel' => $this->tel]);

        return $provider;
    }
}