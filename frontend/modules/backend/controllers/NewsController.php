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
use common\models\News;

/**
 * Site controller
 */
class NewsController extends Controller
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
    public function actionIndex($id = 0)
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        date_default_timezone_set('prc');
        $time = date('Y-m-d H:i:s', time());
        Yii::$app->view->params['time'] = $time;
        if ($id === 0) {
            $news = News::getEarliestNews();
        } else {
            $news = News::findOne($id);
        } 
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['visible' => 0])->orderBY(['id' => SORT_DESC]),
            'pagination' => [
                'pagesize' => 4
            ]
        ]);
        return $this->render('index', [
            'provider' => $dataProvider,
            'model' => $news,
            'id' => $news->id,
        ]);
    }

    public function actionEdit()
    {
        Yii::$app->view->params['time'] = date('Y-m-d H:i:s', time());
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $model = new EditForm();
        if ($model->load(Yii::$app->request->post())) {
            date_default_timezone_set('prc');
            $date = date('Y-m-d', time());
            $time = date('H:i:s', time());
            if ($model->edit(Yii::$app->user->identity->account, $date, $time)) {
                $dataProvider = new ActiveDataProvider([
                    'query' => News::find()->where(['visible' => 0])->orderBY(['id' => SORT_DESC]),
                    'pagination' => [
                        'pagesize' => 4
                    ]
                ]);
                $news = News::getEarliestNews();
                return $this->render('index', [
                    'provider' => $dataProvider, 
                    'model' => $news,
                    'id' => $news->id,
                ]);
            }
        }

        return $this->render('edit', ['model' => $model]);
    }


    public function actionDelete($id){
        $model = News::findOne($id);
        // $commets = Comments::findOne($model->id);
        if ($model !== null) {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    public function actionView($id) {
        return $this->redirect(['index', 'id' => $id]);
    }

}
