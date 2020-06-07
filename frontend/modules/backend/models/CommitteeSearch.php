<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;

/**
 * 职员检索模型
 * 
 */
class CommitteeSearch extends User
{
    public string $in_date;
    public bool $is_admin;

    // rules
    public function rules(){
        return [
          [['in_date', 'is_admin'], 'safe'],
        ];
    }

    public function search($params) {
        $query = User::find();
        $query->joinWith('committee', true, 'INNER JOIN');
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
                    'committee.in_date' => [
                        'asc' => ['committee.in_date' => SORT_ASC],
                        'desc' => ['committee.in_date' => SORT_DESC],
                        'label' => '入职日期'
                    ],
                ]
            ]   
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['account' => $this->account])->andFilterWhere(['like', 'username' => $this->username])->andFilterWhere(['sex' => $this->sex])->andFilterWhere(['age' => $this->age]);

        return $provider;
    } 


}