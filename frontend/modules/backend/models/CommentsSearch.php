<?php
/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 评论审核检索模型 model
*/

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
    public $abstract;
    public $title;

    // rules
    public function rules(){
        return [
          [['abstract', 'title'], 'safe'],
          [['title','author'],'string'],
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

        $query->andFilterWhere(['like', 'news.title', $this->title])->andFilterWhere(['like', 'author', $this->author]);

        return $provider;
    } 

}