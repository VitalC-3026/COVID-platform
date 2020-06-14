<?php

/**
 * Team：NoCov
 * Coding By：戚晓睿
 * 本模型为接受前台新闻评论的数据模型，接收完数据后由/common/comments.php传入数据库
 */

namespace frontend\models;

use common\models\Comments;
use yii\base\Model;

class CommentForm extends Model
{
    public $id;
    public $New_id;
    public $content;
    public $author;
    public $visible;

    public function rules()
    {
        return [
            ['New_id', 'required'],
            ['content', 'required'],
            ['author', 'required'],
            ['visible', 'required'],
        ];
    }

    public function submit()
    {
        $comment = new Comments();
        $comment->setId(Comments::find()->max('id') + 1);
        $comment->setNew_id($this->New_id);
        $comment->setContent($this->content);
        $comment->setAuthor($this->author);
        $comment->setVisible($this->visible);
        return $comment->save();
    }
}
