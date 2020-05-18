<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;

class ResidentForm extends Model
{
    public $account;
    public $username;
    public $tel;
    public $sex;
    public $building;
    public $unit;
    public $room;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username, account, tel, room, unit, building are both required
            [['room', 'unit', 'building'], 'required'],
        ];
    }


    // basic setters
    public function setBuilding($building) { $this->building = $building; }
    public function setUnit($unit) { $this->unit = $unit; }
    public function setRoom($room) { $this->room = $room; }

    // basic getters
    public function getBuilding() { return $this->building; }
    public function getUnit() { return $this->unit; }
    public function getRoom() { return $this->room; }
}