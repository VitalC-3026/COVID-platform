<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 权限类型模型
 *
 * @property int    $priority           标识
 * @property string $name               名称
 * @property string $information        简介
 */
class PriorityType extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%PriorityType}}";
    }

    // basic setters
    public function setPriority($priority) { $this->priority = $priority; }
    public function setName($name) { $this->name = $name; }
    public function setInformation($information) { $this->information = $information; }

    // basic getters
    public function getPriority() { return $this->priority; }
    public function getName() { return $this->name; }

}