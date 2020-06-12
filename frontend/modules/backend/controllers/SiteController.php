<?php

namespace frontend\modules\backend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use frontend\modules\backend\models\ResidentSearch;

use frontend\modules\backend\models\AdminForm;
use frontend\modules\backend\models\TeamMemberForm;
use frontend\modules\backend\models\EditForm;
use frontend\modules\backend\models\SearchForm;
use frontend\modules\backend\models\RightsForm;
use common\models\User;
use common\models\PriorityType;
use common\models\PriorityList;
use common\models\Committee;
use common\models\TeamMember;
use frontend\modules\backend\models\HealthSearch;


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
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1)){
            return $this->goHome();            
        }
        
        $priority = PriorityType::find()->where(['name' => '分配权限']);
        if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
            Yii::$app->getSession()->setFlash('error', '您没有权限访问');
            return $this->redirect(['index']);
        }    
        
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
                Yii::$app->getSession()->setFlash('success', '成功分配权限');
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
        if (empty($priority)) {
            $rightsArray = [];
        }
        return $this->render('rights', [
            'provider' => $user, 'priorityProvider' => $priorityType,
            'searchForm' => $search, 'rightsForm' => $rightsForm,
            'rightsArray' => $rightsArray, 'oldRights' => $oldRights, 'id' => $id
        ]);
    }

    public function actionRequestlist()
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $health = new HealthSearch();
        $provider = $health->search(Yii::$app->request->get());

        return $this->render('requestlist', [
            "model" => $health,
            'provider' => $provider
        ]);
    }

    public function actionProfile()
    {
        $teammember = new TeamMemberForm();
        $t = TeamMember::findOne(Yii::$app->user->identity->account);
        $teammember->initMember($t);
        if($teammember->load(Yii::$app->request->post())) {
            if($teammember->password !== null) {
                if($teammember->setUser()) {
                    $teammember->setProfile(Yii::$app->user->identity->account);
                    Yii::$app->user->logout();
                    return $this->redirect(['/site/index', 'message' => '身为专业团队成员的你，成功完成了挂靠账号修改，现在需要重新登录喔！']);
                } else {
                    Yii::$app->getSession()->setFlash('error', '修改挂靠账户失败！');
                }
            } else {
                if($teammember->updateProfile()){
                    Yii::$app->getSession()->setFlash('success', '修改个人简历成功！');
                } else {
                    Yii::$app->getSession()->setFlash('error', '修改个人简历失败！');
                }
            }
        }
        return $this->render('profile',[
            'model' => $teammember,
        ]);
    }
}
