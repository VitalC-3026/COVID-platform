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
use common\models\PriorityType;
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
                
                Yii::$app->session->setFlash('success', '你成功添加了新职员');
                return $this->render('addadmin', ['model' => $model,]);
            }
        }
        return $this->render('addadmin', ['model' => $model,]);
    }

    public function actionRights()
    {
        $PriorityType = new PriorityType();
        // 实现可以把priorityType所有内容从数据库取出以数组形式返回给priorityType这个变量
        // 其中权限名字给rights，权限介绍给description，都要以数组形式，或者callme改前端展示方式
        $description=array('职员有权限对公告、新闻进行编辑，在通过审核后进行发布和删除；允许筛选评论，发布精选评论，回复评论', '职员每日走访重点对象之后需完成健康信息的上报，并及时记录重点对象的突发状况和状态变更等信息','职员可以查看社区数据库，并进行添加用户与删除用户的操作');
        $rights = array('发布公告','填报健康信息','查看数据库');
        $view = Yii::$app->view;
        $view->params['rights'] = $rights;
        $view->params['description'] = $description;
        return $this->render('rights');
    }
}
