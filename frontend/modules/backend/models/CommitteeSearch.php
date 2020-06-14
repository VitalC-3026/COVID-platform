<?php

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 职员检索模型 model
*/

namespace frontend\modules\backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\Committee;
use common\models\PriorityType;
use common\models\PriorityList;


class CommitteeSearch extends User
{
    public string $in_date;
    public bool $is_admin;
    public int $id;

    // rules
    public function rules(){
        return [
          [['in_date', 'is_admin', 'id'], 'safe'],
          [['account','username'],'string','message'=>'请正确输入字段'],
          [['account','username'],'trim'],
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
                    'committee.id' => [
                        'asc' => ['committee.id' => SORT_ASC],
                        'desc' => ['committee.id' => SORT_DESC],
                        'label' => '职员编号'
                    ],
                ]
            ]   
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['like', 'account', $this->account])->andFilterWhere(['like', 'username', $this->username]);

        return $provider;
    }
    public function count(){
        $query = Committee::find()->all();
        return count($query);
    }

}