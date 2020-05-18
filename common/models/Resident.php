<?php

namespace common\models;

use Yii;

/**
 * 居民模型
 *
 * @property string $building       楼
 * @property string $unit           单元
 * @property string $room           房间
 */
class Resident extends MyUser
{
    // basic setters
    public function setBuilding($building) { $this->building = $building; }
    public function setUnit($unit) { $this->unit = $unit; }
    public function setRoom($room) { $this->room = $room; }

    // basic getters
    public function getBuilding() { return $this->building; }
    public function getUnit() { return $this->unit; }
    public function getRoom() { return $this->room; }
}