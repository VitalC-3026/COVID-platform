<?php

/**
 * Team: NoCov
 * Coding by: 麦隽韵
 * 搜索职员表格 model
*/

namespace frontend\modules\backend\models;

use Yii;
use yii\base\Model;
use common\models\PriorityType;
use common\models\PriorityList;
use common\models\User;

/**
 * 权限列表界面根据职员编号进行搜索的表单
 */
class SearchForm extends Model
{
    public $account;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['account', 'trim'],
            ['account', 'string', 'min' => 18, 'max' => 18,'tooShort'=> '查询编号应为18位','tooLong' => '身份证号应为18位']];
    }

    public function searchByAccount() {
        if(!$this->validate()) {
            return false;
        }
        /**/
        $user = User::find()->where(['account' =>$this->account])->one();
        if (!empty($user) && ($user->type === 1 || $user->type === 2)) {
            $this->account = $user->account;
            return true;
        }
        return false;
    }
}
