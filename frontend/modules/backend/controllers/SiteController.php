<?php

namespace frontend\modules\backend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use frontend\modules\backend\models\ResidentForm;
use frontend\modules\backend\models\AdminForm;
use frontend\modules\backend\models\HealthForm;
use frontend\modules\backend\models\EditForm;
use frontend\modules\backend\models\SearchForm;
use frontend\modules\backend\models\RightsForm;
use frontend\modules\backend\models\ResidentSearch;
use frontend\modules\backend\models\CommitteeSearch;
use common\models\PriorityType;
use common\models\PriorityList;
use common\models\Resident;
use common\models\News;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        return $this->render('index');
    }

    public function actionRights()
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $search = new SearchForm();
        if ($search->load(Yii::$app->request->post())) {
            if ($search->searchByAccount()) {
                $id = $search->searchByAccount();
            } else {
                $id = Yii::$app->user->identity->account;
            }
        } else {
            $id = Yii::$app->user->identity->account;
        }
        $rightsForm = new RightsForm();
        $rightsForm->account = $id;
        
        $user = new ActiveDataProvider([
            'query' => User::find()->where(['account' => $id]),
        ]); 
        if($rightsForm->load(Yii::$app->request->post())) {
            $res = $rightsForm->setRights();
            if($res) {
                Yii::$app->getSession()->setFlash('success', '成功分配权限'.$rightsForm->account.implode(',', $rightsForm->rights));
            }
            $id = $rightsForm->account;
            $user = new ActiveDataProvider([
                'query' => User::find()->where(['account' => $id]),
            ]); 
        }
        $old = PriorityList::find()->where(["account" => $id])->all();
        $i = 0;
        foreach ($old as $o) {
            $oldRights[$i] = $o['priority'];
            $i++;
        }
        if(empty($old)) {
            $oldRights = array();
        }
        $user->setSort(false);
        $priorityType = new ActiveDataProvider([
            'query' => PriorityType::find(),
            
        ]);
        $priority = PriorityType::find()->all();
        foreach ($priority as $p) {
            $rightsArray[$p['priority']] = $p['name'];
        }
        return $this->render('rights', [
            'provider' => $user, 'priorityProvider' => $priorityType,
            'searchForm' => $search, 'rightsForm' => $rightsForm,
            'rightsArray' => $rightsArray, 'oldRights' => $oldRights, 'id' => $id
        ]);
    }
}
