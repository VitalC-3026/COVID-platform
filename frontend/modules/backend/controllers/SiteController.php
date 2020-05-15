<?php
namespace frontend\modules\backend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\modules\backend\models\ResidentForm;
use frontend\modules\backend\models\AdminForm;
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
        
        return $this->render('resinfo');
    }

    /**
     * Workers Information page.
     *
     * @return mixed
     */
    public function actionAdmininfo()
    {
        $model = new AdminForm();
        return $this->render('admininfo');
    }

    /**
     * Workers Information page.
     *
     * @return mixed
     */
    public function actionAddres()
    {
        $model = new ResidentForm();
        if (Yii::$app->request->post()) {
            $request = Yii::$app->request;
            $model->account = $request->post('account');
            echo $model->account;
            Yii::$app->session->setFlash('success', '你成功添加了新职员');
            return $this->render('resinfo', ['model' => $model,]);
        }
        return $this->render('addres', ['model' => $model,]);
    }

    public function actionAddadmin()
    {
        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post())){
            if ($model->setAdministator()){
                $("modal fade").aria_hidden = false;
                Yii::$app->session->setFlash('success', '你成功添加了新职员');
                return $this->render('addadmin', ['model' => $model,]);
            }
        }
        return $this->render('addadmin', ['model' => $model,]);
    }

    
}
