<p align="center">
    <a href="https://github.com/VitalC-3026/COVID-platform" target="_blank">
        <img src="./frontend/web/assets/frontend/images/logo.png">
    </a>
    <h1 align="center">平安社区网站系统</h1>
    <br>
</p>

本网站系统基于`yii2`框架开发，使用部分网站的`css`和`js`进行样式设计。


如果想要在本地架设本框架，请运行根目录下的`install.php`, 我们将会进行傻瓜式指导安装，在其中我们会配置你的数据库和初始的管理员账号。

之后请将`Apache`的解析路径配置在`./frontend/web/index.php`才能正常使用。

部署环境：
```c++
MySQL >= 7.0
PHP >= 5.6
```



部分文件功能说明
```
common
    config/              部分项目配置文件，其中有数据库连接的配置文件main-local.php
    mail/                contains view files for e-mails
    models/              公共使用模型，一般为连接数据库使用
    tests/               测试使用的类  

data
    install.sql          数据库的安装脚本
    team/                团队文档存放文件夹
    personal/            个人作业存放文件夹

console                  yii2原始控制台使用程序，本次项目未使用
    config/              控制台的配置功能
    controllers/         控制台操作使用的控制器
    migrations/          迁移数据库设置
    models/              控制台使用的模型
   
backend                  yii2原始后台，本次项目中未使用


frontend                 yii2前台，本次项目重点文件
    assets/              资源文件的配置
    config/              配置文件，其中包括本地部分加密字符串等等
    controllers/         前台控制器
    models/              模型文件，主要为接受表单信息的model
    modules/             增添的模块，本次项目进行前后台分立，增添后台模块
    views/               视图文件，包含主要的html显示效果
    web/                 包含入口脚本和网站资源文件
vendor/                  yii2依赖的第三方包
environments/            环境配置

install.php             安装指导文件

```
