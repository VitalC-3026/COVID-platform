<?php

/**
 * 本类为系统的用户类，每个登录的用户都是这个类的实例，实现的方式模仿本目录下的User.php
 * 由于数据库中的熟悉有所差别，因此只能重写，当前数据库属性如下：
 * 身份证号 （主键） |  姓名  | 用户名 | 密码 （加密存储） | 性别 | 年龄 | ****（其他）
 * 对于数据库的接口（用户名，密码，数据库名称等等），请在/common/config/main-local.php中进行修改
 *
 */

namespace common\models;


use Yii;
use yii\base\Component;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;




/*
 * 用户模型
 * string $account      身份证号
 * string $username     用户名
 * string $password_hash加密存储的密码
 * string $password     登录时传入的密码，未加密
 * string $auth_key     认证信息
 * 其他属性自行添加，和登录没有联系
 */

class MyUser extends ActiveRecord implements IdentityInterface
{
    private $name;
    private $sex;
    private $age;
    private $tel;
    private $priority;

    /*
     * @return 返回的是数据库中存储用户使用的表名
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%User}}';
    }
    /*
     * 通过身份证号寻找唯一的用户
     * 返回一个MyUser类
     */
    public static function findIdentity($account)
    {
        return static::findOne(['account' => $account]);
    }

    /*
     * 返回用户对象的主键
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /*
     * 传入参数为待验证密码
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /*
     * 未实现接口中的这个函数，不用管
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    /*
     * 验证认证信息是否正确
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    /*
     * 生成一个长度为32的验证信息string
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /*
     * 返回当前用户的认证信息
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /*
     * 设置密码
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /*
     * 设置用户名
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // basic setters
    public function setName($name) { $this->name = $name; }
    public function setSex($sex) { $this->sex; }
    public function setAge($age) { $this->age; }
    public function setTel($tel) { $this->tel; }
    public function setPriority($priority) { $this->priority = $priority; }

    // basic getters
    public function getName() { return $this->name; }
    public function getSex() { return $this->sex; }
    public function getAge() { return $this->age; }
    public function getTel() { return $this->tel; }
    public function getPriority() { return $this->priority; }
}