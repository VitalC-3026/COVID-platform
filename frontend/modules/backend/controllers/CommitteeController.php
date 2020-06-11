<?php

namespace frontend\modules\backend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use frontend\modules\backend\models\CommitteeForm;
use frontend\modules\backend\models\CommitteeSearch;
use common\models\Committee;
use common\models\User;

/**
 * Site controller
 */
class CommitteeController extends Controller
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
     * 社区职员数据库主页.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->type != 2)
            return $this->goHome();
        $committee = new CommitteeSearch();
        $provider = $committee->search(Yii::$app->request->get());

        return $this->render('index', [
            'model' => $committee,
            'provider' => $provider,
        ]);
    }

    
    // 删除职员
    public function actionDelete($id) {
        $model = Committee::findOne($id);
        if ($model !== null) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    // 添加新职员
    public function actionCreate() {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->type != 2)
            return $this->goHome();
        $model = new CommitteeForm();
        if ($model->load(Yii::$app->request->post())) {
            date_default_timezone_set('prc');
            if ($model->addCommittee(date('Y-m-d', time()))) {
                Yii::$app->session->setFlash('success', '成功添加新职员');
                $committee = new CommitteeSearch();
                $provider = $committee->search(Yii::$app->request->get());
                return $this->redirect(['index']);
            } else {
                return $this->render('create', ['model' => $model,]);
            }

        }
        return $this->render('create', ['model' => $model,]);
    }

    // 更新职员数据
    public function actionUpdate($id) {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->type != 2)
            return $this->goHome();
        $model = new CommitteeForm();
        $committee = Committee::findOne($id);
        $user = User::findOne($id);
        if ($committee !== null && $user !== null) {
            $model->account = $user->account;
            $model->tel = $user->tel;
            $model->sex = $user->sex;
            $model->username = $user->name;
            $model->age = $user->age;
            $model->priority = $user->type;
        }
        if ($model->load(Yii::$app->request->post()) && $model->updateCommittee($id)) {
            $com = new CommitteeSearch();
            $provider = $com->search(Yii::$app->request->get());
            return $this->redirect(['index']);
        }
        return $this->render('update', ['model' => $model]);
    }

}
