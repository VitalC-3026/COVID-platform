<?php

namespace common\models;

use Yii;

class Committee extends MyUser
{
    private $inDate;
    private $isAdmin;

    // basic setters
    public function setInDate($inDate) { $this->inDate = $inDate; }
    public function setIsAdmin($isAdmin) { $this->isAdmin = $isAdmin; }

    // basic getters
    public function getInDate() { return $this->inDate; }
    public function getIsAdmin() { return $this->isAdmin; }
}