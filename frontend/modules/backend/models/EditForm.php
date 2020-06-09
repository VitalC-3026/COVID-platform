<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\DateTime;
use common\models\News;

class EditForm extends Model
{
    public $title;
    public $abstract;
    public $content;    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title', 'trim'],
            [['title'], 'required', 'message' => '标题不能为空'],
            ['title', 'string', 'min' => 1, 'max' => 20, 'tooShort' => '标题长度不得超过20个字', 'tooLong' => '标题长度不得超过20个字'],
            ['abstract', 'trim'],
            ['abstract', 'string', 'min' => 1, 'max' => 50, 'tooShort' => '摘要长度不得超过50个字', 'tooLong' => '摘要长度不得超过50个字'],
            /*['content', 'required', 'message' => '内容不能为空']*/

        ];
    }

    public function edit($account, $date, $time) 
    {
        $news = new News();
        if (!$this->validate()) {
            return false;
        }
        $news->visible = 0;
        $news->account = $account;
        $news->title = $this->title;
        $news->content = $this->content;
        if ($this->abstract === null) {
            $news->abstract = substr($this->content, 0, 15);
        } else {
            $news->abstract = $this->abstract;
        }
        $news->content = 'content';
        $news->date = $date;
        $news->time = $time;
        $news->id = News::find()->count();
        return $news->save();
    }


    
}