<?php

namespace frontend\controllers;

use common\models\MyUser;
use frontend\models\ModifyForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\SignupForm;
use common\models\Resident;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
        // $resident = new Resident();
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->render('index', [
                'message' => "您已成功注册成为社区会员，请登录您的账户。"
            ]);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    /**
     *  重置信息的动作，用于修改当前的密码或者用户名
     */
    public function actionModify()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new ModifyForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->setMyUser()) {
                $model->setInfo();
                Yii::$app->user->logout();
                return $this->render('index', [
                    'message' => "信息修改成功，请重新登录。"
                ]);
            } else {
                return $this->render('modify', [
                    'model' => $model,
                    'message' => "用户名或密码错误"
                ]);
            }
        }
        return $this->render('modify', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Displays prevention page.
     *
     * @return mixed
     */
    public function actionPrevention()
    {
        return $this->render('prevention');
    }

    /**
     * Displays symptoms page.
     *
     * @return mixed
     */
    public function actionSymptoms()
    {
        return $this->render('symptoms');
    }

    /**
     * Displays news page.
     *
     * @return mixed
     */
    public function actionNews()
    {
        return $this->render('news');
    }

    /**
     * Displays community page.
     *
     * @return mixed
     */
    public function actionCommunity()
    {
        return $this->render('community');
    }

}
