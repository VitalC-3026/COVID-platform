<?php
namespace frontend\modules\backend;

class backend extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        // ...  其他初始化代码 ...
        //TODO:
        $this->setLayoutPath(__DIR__."/views/layouts");
    }
}