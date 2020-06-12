<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\widgets\ContentDecorator;
use common\models\News;

/**
 * Class Comments
 *
 * @property int    $id         评论ID
 * @property int    $New_id     新闻ID
 * @property string $content    评论内容
 * @property string $author     评论人
 * @property bool   $visible    是否可见
 */
class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%Comments}}";
    }

    // basic setters
    public function setId($id) { $this->id = $id; }
    public function setNew_id($New_id) { $this->New_id = $New_id; }
    public function setContent($content) { $this->content = $content; }
    public function setAuthor($author) { $this->author = $author; }
    public function setVisible($visible) { $this->visible = $visible; }

    // basic getters
    public function getId() { return $this->id; }
    public function getNewId() { return $this->New_id; }
    public function getContent() { return $this->content; }
    public function getAuthor() { return $this->author; }
    public function isVisible() { return $this->visible; }

    // 联表查询（Comments x News）
    public function getNews() {
        return $this->hasOne(News::className(), ['id' => 'New_id']);
    }
}
