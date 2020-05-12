<?php
namespace frontend\modules\backend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
        return $this->render('index');
    }

    /**
     * Residence Information page.
     *
     * @return mixed
     */
    public function actionResinfo()
    {
        $button1 = Button::begin ( 
        [ 'label' => 'Button 1','options' => [
            'class' => 'btn btn-primary','onclick' => 'alert("Button 1 clicked");',],]);
        $button1->run();
        return $this->render('resinfo');
    }

    /**
     * Workers Information page.
     *
     * @return mixed
     */
    public function actionWorkerinfo()
    {
        return $this->render('workerinfo');
    }

}
