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
use frontend\modules\backend\models\ResidentSearch;
use frontend\modules\backend\models\CommitteeSearch;
use common\models\PriorityType;
use common\models\Resident;
use common\models\User;
use common\models\Committee;
use yii\helpers\Url;

/**
 * Site controller
 */
class ResidentController extends Controller
{
    // public $enableCsrfValidation = false;
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
     * 社区居民数据库主页.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '查看社区数据库']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问');
            return $this->redirect(['/backend/site/index']);
        }  
        $resident = new ResidentSearch();
        $provider = $resident->search(Yii::$app->request->get());

        return $this->render('index', [
            'model' => $resident,
            'provider' => $provider,
        ]);
    }


    // 删除社区居民
    public function actionDelete($id) {

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '查看社区数据库']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问');
            return $this->redirect(['/backend/site/index']);
        }

        $model = Resident::findOne($id);
        if ($model !== null) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    // 创建新居民
    public function actionCreate() {

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '查看社区数据库']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问');
            return $this->redirect(['/backend/site/index']);
        }

        $model = new ResidentForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->addResident()) {
                Yii::$app->session->setFlash('success', '成功添加新居民');
                $resident = new ResidentSearch();
                $provider = $resident->search(Yii::$app->request->get());
                return $this->render('index', ['message' => '成功添加新居民', 'model' => $resident, 'provider' => $provider]);
            } else {
                return $this->render('create', ['model' => $model,]);
            }

        }
        return $this->render('create', ['model' => $model,]);
    }

    // 更新居民数据
    public function actionUpdate($id) {

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '查看社区数据库']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问');
            return $this->redirect(['/backend/site/index']);
        }


        $model = new ResidentForm();
        $resident = Resident::findOne($id);
        $user = User::findOne($id);
        if ($resident !== null && $user !== null) {
            $building = substr($resident->building, 0, strlen($resident->building) - 6);
            $model->building = $building;
            $unit = substr($resident->unit, 0, strlen($resident->unit) - 6);
            $model->unit = $unit;
            $model->room = $resident->room;
            $model->account = $resident->account;
            $model->tel = $user->tel;
            $model->sex = $user->sex;
            $model->username = $user->name;
            $model->age = $user->age;
        }
        if ($model->load(Yii::$app->request->post()) && $model->updateResident($id)) {
            $res = new ResidentSearch();
            $provider = $res->search(Yii::$app->request->get());
            return $this->render('index', ['model' => $res, 'provider' => $provider]);
        }
        return $this->render('update', ['model' => $model]);
    }

}
