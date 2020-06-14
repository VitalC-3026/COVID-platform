<?php

namespace frontend\modules\backend\models;

use common\models\Transactions;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\PriorityType;
use common\models\PriorityList;

class TransactionsSearch extends Transactions
{


    public function rules()
    {
        return [
            [['start_time','info'],'safe'],
        ];
    }

    public function search($params)
    {
        $query = Transactions::find()->where([
            'and',
            'account=:account',
            'is_finished=:is_finished'
        ], [
            ':account' => Yii::$app->user->identity->account,
            ':is_finished' => 0
        ])->orderBy(['start_time'=>SORT_DESC]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'p',
                'pageSizeParam' => 'pageSize',
            ],
            'sort' => [
                'defaultOrder' => [
                    'transactions.start_time' => SORT_ASC,
                ],
                'attributes' => [
                    'transactions.info' => [
                        'asc' => ['transactions.info' => SORT_ASC],
                        'desc' => ['transactions.info' => SORT_DESC],
                        'label' => '任务描述'
                    ],
                    'transactions.start_time' => [
                        'asc' => ['transactions.start_time' => SORT_ASC],
                        'desc' => ['transactions.start_time' => SORT_DESC],
                        'label' => '开始时间'
                    ],
                ],
            ]
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

       // $query->andFilterWhere(['account' =>  $this->account])->andFilterWhere(['like', 'username' => $this->username])->andFilterWhere(['sex' => $this->sex])->andFilterWhere(['age' => $this->age])->andFilterWhere(['tel' => $this->tel]);
        echo Yii::$app->user->identity->getId();
        return $provider;
    }
}