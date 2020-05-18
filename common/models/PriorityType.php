<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * 权限类型模型
 *
 * @property int    $type               标识
 * @property string $name               名称
 * @property string $information        简介
 */
class PriorityType extends ActiveRecord
{
    // basic setters
    public function setType($type) { $this->type = $type; }
    public function setName($name) { $this->name = $name; }
    public function setInformation($information) { $this->information = $information; }

    // basic getters
    public function getType() { return $this->type; }
    public function getName() { return $this->name; }
    public function getInformation() { return $this->information; }
}