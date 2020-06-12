<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\Comments;

/**
 * 评论审核检索模型
 * 
 */
class CommentsSearch extends Comments
{
    public string $abstract;
    public string $title;

    // rules
    public function rules(){
        return [
          [['abstract', 'title'], 'safe'],
        ];
    }

    public function search($params) {
        $query = Comments::find();
        $query->joinWith('news', true, 'INNER JOIN')->where(['comments.visible' => 0]);
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'p',
                'pageSizeParam' => 'pageSize',
            ],
            'sort' => [
                'defaultOrder' => [
                    'New_id' => SORT_ASC,
                ],
                'attributes' => [ 
                    'New_id',
                    'author',
                ]
            ]   
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['id' => $this->id])->andFilterWhere(['like', 'author' => $this->author]);

        return $provider;
    } 

}