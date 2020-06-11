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
use frontend\modules\backend\models\CensorForm;
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
        $committee = new CommitteeSearch();
        if ($committee->load(Yii::$app->request->post()) && $committee->searchByAccount($committee->account) !== null) {
            $id = $committee->searchByAccount($committee->account)->account;
        } else {
            $id = Yii::$app->user->identity->account;
        }
        $user = new ActiveDataProvider([
            'query' => User::find()->where(['account' => $id]),
        ]); 
        $priorityType = new ActiveDataProvider([
            'query' => PriorityType::find(),
            
        ]);
        $priority = PriorityType::find()->all();
        $rights = array();
        $i = 0;
        foreach ($priority as $p) {
            $rights[$i] = $p->priority;
            $i++;
        }
        $i = 0;
        $old = PriorityList::find()->where(["account" => $id]);
        $oldRights = array();
        foreach ($old as $o) {
            $oldRights[$i] = $o->priority;
            $i++;
        }
        $rightsForm = new RightsForm();
        return $this->render('rights', [
            'provider' => $user, 'priorityProvider' => $priorityType,
            'searchForm' => $committee, 'rightsForm' => $rightsForm,
            'rights' => $rights, 'oldRights' => $oldRights
        ]);
    }

    public function actionHealthreport()
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $model = new HealthForm();
        date_default_timezone_set('prc');
        $time = date('Y-m-d H:i:s', time());
        Yii::$app->view->params['time'] = $time;
        Yii::$app->view->params['info'] = '';
        if ($model->load(Yii::$app->request->post())) {
            // 为什么数据无法传送？
            Yii::$app->view->params['info'] = $model->createTime;
            Yii::$app->session->setFlash('success', '你成功填写了健康日报');
            return $this->redirect(['admininfo']);
        }
        return $this->render('healthreport', ['model' => $model,]);
    }


}
