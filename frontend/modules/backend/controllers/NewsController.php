<?php

namespace frontend\modules\backend\controllers;

use frontend\modules\backend\models\TransactionsSearch;
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
use frontend\modules\backend\models\CommentsSearch;
use common\models\PriorityType;
use common\models\Comments;
use common\models\News;
use common\models\Committee;
use yii\helpers\Url;

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
    public function actionIndex($id = -1)
    {
        
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '发布公告']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }
        date_default_timezone_set('prc');
        $time = date('Y-m-d H:i:s', time());
        Yii::$app->view->params['time'] = $time;
        if ($id === -1) {
            $news = News::getEarliestNews();
        } else {
            $news = News::findOne($id);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->orderBY(['id' => SORT_DESC]),
            'pagination' => [
                'pagesize' => 4
            ]
        ]);
        if($news === null) {
            $news = new News();
        }
        return $this->render('index', [
            'provider' => $dataProvider,
            'model' => $news,
            'id' => $id,
        ]);
    }

    public function actionEdit()
    {

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '编辑公告']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }

        Yii::$app->view->params['time'] = date('Y-m-d H:i:s', time());
        $model = new EditForm();
        if ($model->load(Yii::$app->request->post())) {
            date_default_timezone_set('prc');
            $date = date('Y-m-d', time());
            $time = date('H:i:s', time());
            if ($model->edit(Yii::$app->user->identity->account, $date, $time)) {
                $priority = PriorityType::find()->where(['name' => '发布公告']);
                if(Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
                    $dataProvider = new ActiveDataProvider([
                        'query' => News::find()->orderBY(['id' => SORT_DESC]),
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
        }
        return $this->render('edit', ['model' => $model]);
    }

    public function actionComments($id = 0){

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '审核评论']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }

        $comments = new CommentsSearch();
        $provider = $comments->search(Yii::$app->request->get());
        return $this->render('comments', [
            'model' => $comments,
            'provider' => $provider
        ]);
    }


    public function actionDelete($id){

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '发布公告']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }

        if($id === -1) {
            return $this->redirect(['index']);
        }
        Comments::deleteAll(['New_id' => $id]);
        $model = News::findOne($id);
        // $commets = Comments::findOne($model->id);
        if ($model !== null) {
            $model->delete();
        }
        return $this->redirect(['/backend/news/index']);
    }

    public function actionView($id) {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '发布公告']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }
        return $this->redirect(['/backend/news/index', 'id' => $id]);
    }

    public function actionCheck($id) {

        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '审核评论']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }

        $model = Comments::findOne($id);
        if($id === -1 || $model === null) {
            return $this->redirect(['index']);
        }
        $model->visible = 1;
        $model->update();
        return $this->redirect(['/backend/news/comments']);
    }

    public function actionPublish($id) {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $priority = PriorityType::find()->where(['name' => '发布公告']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问！');
            return $this->redirect(['/backend/site/index']);
        }
        News::publish($id);
        Yii::$app->getSession()->setFlash('success', '发布新闻成功！');
        return $this->redirect(['/backend/news/index']);
    }

}
