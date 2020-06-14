# NoCov团队网站实现手册

| 成员姓名 | 成员学号 | github地址 | 邮箱 |
| -------- | -------- | ---------- | ---- |
|          |          |            |      |
|      冯杰康|1813402  |[才不要star呢！](https://github.com/fengjk12138)|1327246148@qq.com|

## 一、项目部署与模板导入

### 1.1 初始化项目部署

首先下载yii框架的归档文件，运行init.bat选择Development开发环境。

然后打开powerShell执行yii初始化命令“yii.bat”。

新建数据库并修改数据库配置/common/config/main-local.php，执行命令“yii.bat migrate”。

以上完成了yii基础框架的部署，然后将/frontend/assets/AppAsset.php中的$depends注释掉，进行自己的模板导入。

作业完成并最终进行展示的部署过程，详见部署文档。

### 1.2 模板导入

在frontend/layout/main.php中，写入前台模板的首页源代码。因为前台模板的css和js文件都是全局的，没有针对页面的特定的设置，因此直接在main.php中以html的<link href="xxx"></link>以及<script src="xxx"></script>这两种方式导入js和css文件。同时，在模板首页源代码外层包上<?php $this->beginPage() ?><?php $this->endPage() ?>, 在html的<body>标签外包上<?php $this->beginBody() ?><?php $this->endBody() ?>。main.php是一个大的框架，针对不同的页面需要有细化的布局设计，为了减少代码的冗余，还需要将main content部分由<?= $content ?>代替。这样就可以通过controller的render函数在这个地方渲染不同的界面。

如图所示。

![fmain](E:\NKU\Database\team-pictures\fmain.png)

后台的模板导入方法类似，不再赘述。
### 1.3 后台模块建立

考虑一般运行网站的模式和需求，我们需要对于网站做成前后台模式，前台用于发布消息和浏览信息，
后台用于编辑信息和进行管理。

考虑Yii2框架原始的前后台模式，其为两套分立的系统，无法相互连接，因此我们抛弃他的模式，采用Yii2的`modules`模式。

我们将使用Yii2的`frontend`作为主`app`，然后将后台作为一个`modules/backend`放置在数据库当中。

在`frontend`文件夹下建立`modules`文件夹，在`modules`文件夹下建立`backend`文件夹，之后编写`frontend/modules/backend/backend.php`
进行初始配置（配置其layouts等），之后在建立相应的`controllers`，`models`，`views`文件夹，初步实现后台的MVC模型，
在`frontend/config/main.php`也要进行对于后台模块的声明。

```php
'modules' =>[
        'backend' =>[ 'class'=>'frontend\modules\backend\backend',
            'layout'=>'main'
            ]
    ]
```

之后，必须将后台的MVC模型的命名空间声明在`frontend\modules\backend`下，这样我们就可以
通过Yii2的路由模式访问对应的页面。

对于拥有进入后台权限的人员来说，会在前台看到导航栏按钮`后台管理`，之后通过路由模式/backend/site/index进入后台，
完成前后台的分立和对应链接过程。
### 二、前台页面实现

### 2.1 前台主页

#### 2.1.1 疫情数据动态显示

在frontend/views/site/index.php中直接写script脚本并插入到结尾去

```php+HTML
<script language="JavaScript">
    <?php $this->beginBlock('js_end') ?>
  		 ……
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['js_end'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>
```

而后，给各个需要动态加载数据的位置注明id

```php+HTML
 <div class="data">
                    <span class="caption">现存确诊</span>
                    <span class="number number-counter" id="globalNow">0</span>
                </div>
```

在script中的data函数中引入爬取的数据源的url，使用getjson方法获取其中的数据

数据源中的数据如下图所示

![image-20200613133434349](C:\Users\肖中遥\AppData\Roaming\Typora\typora-user-images\image-20200613133434349.png)

这样，我们就定位到了所需数据的位置，通过索引对位置换进行获取，并通过id获取需要加载数据源的html元素，将其data-number属性设置为数据源

这里不用innerText的原因是，使用的样式class具有数据增长的效果，因此设置属性会让数据更有动感。

```javascript
    function data() {
        var dataApi = "http://49.232.173.220:3001/data/getStatisticsService";
        $.getJSON(dataApi, function (newpneumoniadata) {
            //世界数据
            var summaryDataIn = newpneumoniadata["globalStatistics"];
            var currentConfirmedCount = summaryDataIn["currentConfirmedCount"];
            ……
            document.getElementById("globalTotal").setAttribute("data-number", confirmedCount);
            document.getElementById("globalNow").setAttribute("data-number", currentConfirmedCount);
           ……
```

同时注意到在凌晨“今日增长”这一数据是爬取不到的，因为所有的增长数据在这一时段都处于待国家卫健委公布阶段，因此追加Match函数，以考虑凌晨数据待公布的情况

```javascript
function worldMatch(source, id) {
        var sign = document.getElementById(id);
        if (source === undefined) {
            sign.innerText = "0(待公布)";
        } else {
            sign.setAttribute("data-number", source);
        }
    }
```

```javascript
worldMatch(confirmedIncr, "todayC");
```

在script末尾调用data()函数即可在页面加载时同时动态加载数据

```javascript
data();
```

#### 2.1.2 中国疫情地图与世界疫情地图

这里是使用echart实现疫情地图，因此要首先将相关的js下载到项目中，同时在Appassets_b.php中注册有关js

```php
public $js = [
        'assets/js/echarts.min.js',
        'assets/js/china.js',
        'assets/js/world.js',
    ];
```

```php
public static function addScript($view, $jsfile)
    {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset_b','position' => $view::POS_HEAD]);
    }
```

随后，在index尾部的script脚本中，追加函数ChinaMap()与worldMap()，以ChinaMap为例，首先初始化一个echarts，并为其设置好配置项，配置项包括图例，标题，文字以及类型，这里选择的类型时map，同时mapType为China，这样它就会自动从china.js加载中国地图

```javascript
        var option = {
            backgroundColor: '#ffffff',
            title: {
                text: '中国疫情图',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['中国疫情图']
            },
            visualMap: {
                type: 'piecewise',
                pieces: [
                    {min: 1000, max: 1000000, label: '大于等于1000人', color: '#5e0d00'},
                    {min: 500, max: 999, label: '确诊500-999人', color: '#900701'},
                    {min: 100, max: 499, label: '确诊100-499人', color: '#d6493c'},
                    {min: 10, max: 99, label: '确诊10-99人', color: '#f97364'},
                    {min: 1, max: 9, label: '确诊1-9人', color: '#f5bba7'},
                    {min: 0, max: 0, label: '无现存确诊', color: '#ebd9bc'}
                ],
                color: ['#E0022B', '#E09107', '#A3E00B']
            },
           ……
            series: [
                {
                    name: '现存确诊数',
                    type: 'map',
                    mapType: 'china',
                    roam: false,
                    data: []
                }
            ]
        };
        myChart.setOption(option);
```

接下来是为其配置数据

这里只需要新建一个只有两组键值对的json，并使其成为array，json键值对包括name：省名、value：现存确诊数,而后在基础option中追加数据设置即可

```javascript
            $.getJSON(dataApi, function (data) {
                var newArr = [];
                for (var i = 0; i < data.length; i++) {
                    var json = {
                        name: data[i]["provinceName"],
                        value: data[i]["currentConfirmedCount"]
                    }
                    newArr.push(json);
                }
                //使用指定的配置项和数据显示图表
                myChart.setOption({
                    series: [
                        {
                            name: '现存确诊数',
                            type: 'map',
                            mapType: 'china',
                            roam: false,
                            label: {
                                normal: {
                                    show: false,
                                },
                                emphasis: {
                                    show: true,
                                    textStyle: {
                                        fontSize: 15,
                                        fontWeight: 'bold',
                                        color: '#000000',
                                    }
                                }
                            },
                            data: newArr,
                            showLegendSymbol: false,
                        }
                    ]
                });
            })
```

需要注意的是，在实现世界疫情地图时，world.js是全英文的，而读取的数据源已经被贴心地汉化，因此从网络获取一个nameMap对应国家的中文名与英文名，并设置好echarts的nameMap，在实际效果中发现以下几个问题：

* 开始设置人数上限是100w，但美国已经超过了，所以其虽然有数据但像是没有，通过提高上限解决
* 有的国家中文名在nameMap与在数据源不同，导致数据存在但无法找到，通过修改nameMap中的中文名解决
* 国家名过于密集导致重叠，通过设置其平常状态不可见解决
* 美国与俄罗斯国家名错位，通过设置world.js中的cp属性解决

```javascript
var nameMap_all = {
                'Afghanistan': '阿富汗',
                'Albania': '阿尔巴尼亚',
                'Algeria': '阿尔及利亚',
                'Andorra': '安道尔',
                'Angola': '安哥拉',
                'Antarctica': '南极洲',
                'Antigua and Barbuda': '安提瓜和巴布达',
                'Argentina': '阿根廷',
                'Armenia': '亚美尼亚',
                'Australia': '澳大利亚',
                ……
            };
```

```javascript
                myChart.setOption({
                    series: [
                        {
                            name: '现存确诊数',
                            type: 'map',
                            mapType: 'world',
                            roam: false,
                            label: {
                                normal: {
                                    show: false,
                                },
                                emphasis: {
                                    show: true,
                                    textStyle: {
                                        fontSize: 15,
                                        fontWeight: 'bold',
                                        color: '#000000',
                                    }
                                }
                            },
                            data: newArr,
                            nameMap: nameMap_all,
                            showLegendSymbol: false,
                        }
                    ]
                });
```

#### 2.1.3 前台新闻显示



### 2.2 团队介绍

团队介绍页面主要是涉及数据库中`Team`表和`TeamMember`表的信息获取，并且将其加以展示，
并且对于团队介绍和团队成员的信息可以在后台进行编辑。

开头部分是团队介绍和部分关于项目的信息，包含编写的过程和我们github链接，欢迎贡献代码。

中间部分是我们主要人员展示，包含我们分工和头像，数据均从数据库中获取，可以在后台进行编辑，
之后展示在前台。

下面部分为个人作业展示，其中有个人作业的下载链接。

### 2.3 预防疾病页面
    
我们在页脚部分的`防疫小贴士`的超链接中加入了这个页面，这个页面主要是展示一些常用防疫
知识和技巧，其中样式比较美观，提供给浏览者访问和学习。

### 2.4 注册与登录界面

#### 2.4.1 页面设计

使用页眉--描述--填写信息--确认--页脚的串联式存储模式，页面的展示部分主要是HTML标签和
图象信息，起美观作用


#### 2.4.2 逻辑



### 2.5 健康日报表单提交

其MVC过程与注册登录界面几乎完全一致，这里就不再赘述。

### 2.6 修改用户信息

其MVC过程与注册登录界面几乎完全一致，这里就不再赘述。



## 三、后台管理界面实现

### 4.1 管理主页

#### 4.1.1 天津市数据获取

这里与前台主页获取数据的方式完全一致，只不过在生成表格时，要灵活运用insertRow和insertCell插入新行和每一行的新元素

```javascript
 var newArr = [];
            for (var i = 0; i < data[0]["cities"].length; i++) {
                var json = {
                    name:data[0]["cities"][i]["cityName"],
                    now: data[0]["cities"][i]["currentConfirmedCount"],
                    total: data[0]["cities"][i]["confirmedCount"],
                    input:data[0]["cities"][i]["suspectedCount"],
                    cure:data[0]["cities"][i]["curedCount"],
                    death:data[0]["cities"][i]["deadCount"],
            };
                newArr.push(json);
            }
            var rows = newArr.length;
            for(var i = 0;i < rows; i ++){
                var x = document.getElementById("areaCondition").insertRow(i + 1);
                console.log(newArr[i]["name"]);
                x.insertCell(0).innerHTML = newArr[i]["name"];
                x.insertCell(1).innerHTML = newArr[i]["now"];
                x.insertCell(2).innerHTML = newArr[i]["total"];
                x.insertCell(3).innerHTML = newArr[i]["input"];
                x.insertCell(4).innerHTML = newArr[i]["cure"];
                x.insertCell(5).innerHTML = newArr[i]["death"];
            }
```

#### 4.1.2 天津市疫情风险评估

评估公式为：



#### 4.1.3 居民总数、访客总数、职工总数、体温异常人数获取

以居民数为例，首先在ResidentSearch.php中增加count函数，计算数据库Resident中的总记录条数，只需灵活运用all()与count()即可

```php
    public function count(){
        $query = Resident::find()->all();
        return count($query);
    }
```

其他几个也是同理，需要注意的是，访客总数要特别表明type为3

```php
 public function visitors(){
        $query = User::find()->where(['type' => 3])->all();
        return count($query);
    }
```

在siteController中的actionIndex()中把这些数据model放入

```php
public function actionIndex()
    {
        if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
            return $this->goHome();
        $resident = new ResidentSearch();
        $committee = new CommitteeSearch();
        $health = new HealthSearch();
        return $this->render('index',[
            'model' => [$resident->count(),$resident->visitors(),$committee->count(),$health->count()]]);
    }
```

在index中需要的位置直接调用这些count即可，如

```php+HTML
<h1 class="text-left timer" data-from="0" data-to="<?php echo $model[0]?>" data-speed="2500"></h1>
                    <p>居民总数</p>
```

#### 4.1.4 体温分布

与居民总数极为类似，只不过需要对取出的count做处理

```javascript
public function countLow(){
        $query = User::find()->joinWith('health', true, 'INNER JOIN')->where(['and','health.temperature<36.3'])->all();
        $result = count($query)/count(User::find()->all());
        return round($result,4) * 100;
    }
```

查询后要除总数并保留四位小数再*100，即可实现百分比。


### 4.2 社区数据库模块

#### 4.2.1 居民数据库

##### 4.2.1.1  数据库列表界面

​		数据库列表是通过yii/grid/GridView这个组件进行显示。这个组件可以实现数据项的排序显示，数据的检索和筛选，配以ActionColumn对一行的数据进行操作，并实现分页功能。具体页面展示如下：

![resident01](E:\NKU\Database\team-pictures\resident01.png)

​		首先，GridView通过yii/data/ActiveDataProvider接收到数据库中的数据，数据承载于继承ActiveRecord的实体类。基础的检索数据并返回可供GridView使用的ActiveDataProvider的函数如下：

​		①$query的类型可以是yii/db/Query或yii/db/ActiveQuery，主要是通过yii自己的SQL语句规则进行数据库的查询操作。此处进行了联合查询，稍后再详细记录。如果是SqlDataProvider则可以写正常的sql语句；如果是ArrayDataProvider则可以将Query写成返回数组的形式。

​		②$provider就是GridView需要的数据组织形式，它可以完成查询、分页、排序的设置。由于存在联表查询，所以对于所联表（此处是`resident`）字段，需要进行重新的升序、降序定义，否则会找不到相应的字段。sort中的defaultOrder是设置默认的排序字段，attributes是设置要进行排序的字段，如果需要排序，在列表的表头相应属性可以点击，且显示的是class=”active“的颜色。

​		③如果筛查框通过验证$this->validate() === true, 而且前台get命令没有携带参数的话，那么直接返回provider的结果。如果有数据的话，即有查询条件，则$query调用andFilterWhere()函数进行再次查询，返回结果。想要进行筛选的字段，必须在rules中定义，如我要对身份证号和姓名进行筛选，就定义了`[['account','username'],'string',"message" => "请正确输入"]`。

```php
/* Model: ResidentSearch */
class ResidentSearch extends User
{
    public $building;
    public $unit;
    public $room;

    // rules
    public function rules(){
        return [
          [['building', 'unit', 'room'], 'safe'],
          [['account','username'],'string',"message" => "请正确输入"],
          [['account','username'],'trim']
        ];
    }
    public function search($params) {
        $query = User::find();
        $query->joinWith('resident', true, 'INNER JOIN');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'p',
                'pageSizeParam' => 'pageSize',
            ],
            'sort' => [
                'defaultOrder' => [
                    'account' => SORT_DESC,
                ],
                'attributes' => [
                    'account', 
                    'username',
                    'sex',
                    'age',
                    'resident.unit' => [
                        'asc' => ['resident.unit' => SORT_ASC],
                        'desc' => ['resident.unit' => SORT_DESC],
                        'label' => '单元号'
                    ],
                    'resident.building' => [
                        'asc' => ['resident.building' => SORT_ASC],
                        'desc' => ['resident.building' => SORT_DESC],
                        'label' => '楼'
                    ],
                    'resident.room' => [
                        'asc' => ['resident.room' => SORT_ASC],
                        'desc' => ['resident.room' => SORT_DESC],
                        'label' => '房间号'
                    ]
                ]
            ]   
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $provider;
        }

        $query->andFilterWhere(['like', 'resident.account', $this->account])->andFilterWhere(['like', 'username', $this->username]);

        return $provider;
    } 
    ...	
}
```

​		在controller中对应的action函数如下：

​		由于居民数据库中存储社区居民的身份证号等敏感信息，因此只有级别高的管理员才能访问。同时，在向model：$resident传参时，使用的是post()方法，即Yii::$app->request->post()，最大限度保护信息安全。

```php
/**
 * 社区居民数据库主页.
 * Controller: ResidentController
 * @return mixed
*/
public function actionIndex()
{
    if (Yii::$app->user->isGuest || (Yii::$app->user->identity->type != 2 && Yii::$app->user->identity->type != 1))
        return $this->goHome();
    $priority = PriorityType::find()->where(['name' => '访问职员数据库']);
    if(!Committee::hasPriority(Yii::$app->user->identity->account, $priority)){
        Yii::$app->getSession()->setFlash('error', '您没有权限访问');
        return $this->redirect(['/backend/site/index']);
    }  
    $resident = new ResidentSearch();
    $provider = $resident->search(Yii::$app->request->post());

    return $this->render('index', [
        'model' => $resident,
        'provider' => $provider,
    ]);
}
```

##### 4.2.1.2 数据的增加、修改、删除

​		界面左上角的按钮可以跳转到添加新居民的页面，每一行最右边一列的操作的铅笔按钮可以跳转到对该行数据进行修改的页面。具体实现是通过GridView的ActionColumn进行。以下是view中针对操作这一列的代码片段。首先在class中要引入`yii\grid\ActionColumn`，然后设置显示模板，默认会有查看、更新、删除三个选项，buttons可以进行操作的跳转链接自定义。其中，Html的a标签第一个参数是显示内容，运行在此设置html语言，它会根据Html::encode()的方法进行解析。第二个参数跳转的url，可以理解成普通a标签的href属性，由处理函数名和要传的参数的数组组成，controller中的actionUpdate($id)函数进行相应的处理。第三个参数是其他的属性，可以设置确认弹出框。

```php
/* View: resident/index.php */
[
    'header' => '操作',
    'class' => 'yii\grid\ActionColumn',
    //设置显示模板
    'template' => '{update} {delete}',
    //下面的按钮设置，与上面的模板设置相关联
    'buttons' => [
        'update' => function ($url, $model, $key) {
            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->account], [
                'data' => [
                    'method' => 'post',
                ]
            ]);
        },
        'delete' => function ($url, $model, $key) {
            return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->account], [
                'data' => [
                    'confirm' => '删除将导致永久丢失信息，您确定要删除？',
                    'method' => 'post',
                ]
            ]);
        },
    ],
],
```

​		增加和删除的界面相似，同样需要在controller的相应函数中传入一个接受表单信息的Model。具体代码如下：

​		首先，表单需要接受的所有属性要在此进行定义，值得注意的是定义时最好不要提前设置属性，即public string $account，而是在rules里进行定义。其中room的判断用到自定义的判断函数validateRoom($attribute, $params)，使用正则表达式判断，要求房间号的格式为x0x，其中有2-29层，一层6户。更改居民信息时是不允许更改身份证号的。添加居民信息的时候，如果该居民已经存在是不能重复添加的。如果不存在，要做的是以下两步：

​		第一步是查询该居民对应的身份证号是否在前台进行注册，即在User表中存在，如果是的话，改动它的类型，并相应的更新信息；如果不存在的话，除了赋值表单中的基本信息给新创建的user实体，还需要为其初始化密码，是身份证号12-17位，值得注意的是，我们存储的密码是其哈希值，因此调用这个方法生成初始密码存入数据库中Yii::$app->security->generatePasswordHash(substr($this->account, 11, 6));，这个Yii::$app->security->generatePasswordHash();函数在User类的setPassword中存在。另外还需要生成认证码，调用User类的generateAuthKey()函数，以保证数据库安全以及登录的安全。

##### 4.2.1.3 联表查询

居民的`resident`表是`user`表的派生子表，想要获取完整的居民信息需要联表查询，因此需要建立一个ResidentSearch的model进行相应的处理。源码如下。考虑到联表之后获取的User信息更多，所以此模型继承于User。最关键的是，要将联表之后Resident的字段在rules中设置‘safe’属性，这样在GridView中才能以resident.*的前缀方式获取到`resident`表中的字段。然后在User类中设置一个这样的函数getResident()，考虑到`resident`表和`user`表之间是一对一的关系，所以采用的是$this->hasOne(...)。然后，在$query中，先查询User::find()，然后使用joinWith函数。第一个参数是联表的对象，这里对应着User表中的getResident()函数，注意不能改动大小写。第二个参数是$eagerLoading，是否即时加载关联在第一个参数中的指定，默认为true。第三个参数是连接类型，默认为LEFT_JOIN，我们这里需要的是INNER_JOIN。

联表查询不能挂靠在任何一个具体的类中，必须要进行重新的类定义。yii框架应该比较支持oo实体的构建方式，不太支持er实体的构建方式。

```php
<?php

namespace frontend\modules\backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\Resident;

/**
 * 居民检索模型
 * 
 */
class ResidentSearch extends User
{
    public $building;
    public $unit;
    public $room;

    // rules
    public function rules(){
        return [
          [['building', 'unit', 'room'], 'safe'],
          [['account','username'],'string',"message" => "请正确输入"],
          [['account','username'],'trim']
        ];
    }

    public function search($params){
        $query = User::find();
        $query->joinWith('resident', true, 'INNER JOIN');
        ...
    }

    public function getIdentity($account);
    }
}

/**
 *
 * User类中函数，获取所有的身份证号信息对应的居民
*/
public function getResident()
{
    return $this->hasOne(Resident::className(), ['account' => 'account']);
}
```



#### 4.2.2 职员数据库

职员数据库的整体设计与居民数据库整体上无差，有两个地方有区别，一个是修改职员信息的时候是不能修改职员的等级和分配的职权，只能修改基础信息，具体修改会在职员职权分配上实现。另一个是在新增职员时，如果职员等级是超级管理员，则自动会给他分配所有的职权；如果职员等级是普通职员，即使在新增职员时点击了查看数据库，也会在插入时去掉。具体更细化的职权限制，详见4.3职员职权分配。

```php
$priorityType = PriorityType::find()->all();
    if($this->priority === 2) {
        foreach ($priorityType as $p) {
            $priorityList = new PriorityList();
            $priorityList->setAccount($this->account);
            $priorityList->setPriority($p->priority);
            $priorityList->save();
        }
    } else {
        for ($i = 0; $i < sizeof($this->rights); $i++) {
        if ($this->rights[$i] == 0 || $this->rights[$i] == 1) {
            continue;
        }
        $grantPriority = new PriorityList();
        $grantPriority->account = $this->account;
        $grantPriority->priority = $this->rights[$i];
        $grantPriority->save();
    }
}
```

在职员删除时有一个细节处理，因为发布新闻的职员要对相关新闻负责，一旦这个职员离职，那么他发布新闻的将会被挂靠到其他的职员中。由于未能成功实现弹窗给用户选择交付对象，所以目前实现的是随机选择一名职员承担相关新闻。

```php
public static function deleteCommittee($account) {
    $committees = PriorityList::find()->where(['priority' => 3])->joinWith('committee')->orderBy(['in_date' => SORT_DESC])->all();
    foreach ($committees as $c) {
        if($c->account !== $account) {
            $newsList = News::find()->where(['account'=>$account])->all();
            if($newsList === null || !isset($newsList)) break;
            foreach ($newsList as $n) {
                $n->account = $c->account;
                $n->Com_id = $c->id;
                $n->update();
            }
            break;
        }
    }
    $committee = Committee::find()->where(['account' => $account])->one();
    $committee->delete();
    $user = User::findOne($account);
    $user->type = 3;
    $user->update();

}
```



### 4.3 职员职权分配

职员的职权分配界面如下，将分为三个板块进行实现的记录。

![rights](E:\NKU\Database\team-pictures\rights.png)

#### 4.3.1 搜索并显示职员信息

左上方是搜索并显示职员信息的布局。其中输入框和搜索按钮是通过yii/widgets/ActiveForm进行包装，进行参数的获取和传递。因为yii本身有csrf安全保护机制，而单纯用html的form表单的话需要隐式地提交csrf的验证码，比较不可靠，所以还是直接使用ActiveForm比较合理。

在siteController的actionRights函数中，对应这个表单和下面表格的处理代码如下：

```php
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
...
$user = new ActiveDataProvider([
    'query' => User::find()->where(['account' => $id]),
]);
```

如果当前有表单返回的信息，则根据搜索结果进行查找并显示，否则显示当前的职员自己的信息。在信息显示的地方有一个提升等级，如果当前用户是超级管理员的话，那么这个提升等级按钮会显示，如果不是的话，这个按钮就不显示。这表示只有超级管理员可以对其他职员进行等级的提升。

#### 4.3.2 职权分配

右上方是职权分配的多选框，当一个职员的信息在左上方显示之后，其对应的职权就会显示在右上方。默认打勾的是他目前有的职权。重新勾选就会对其职权进行重新的分配，涉及到对`priorityList`这个表的数据项的增加、查询和删除操作。这里同样是使用ActiveForm进行包装。在实际开发过程中，对checkBoxList这个ActiveField的处理，一定要注意：接收这个多选框结果值的变量需要在表单中的rules添加这样一条信息 `['rights','safe']`，否则无法返回正确值。这个表单中还隐式提交了职权所对应的职员$account，以便进行职权处理。

考虑到拥有职权分配的权限是很大的权力，因此需要对职员进行相应的限制。细化的限制如下表。

#### 4.3.3 职权简介

下方是职权简介的介绍，通过yii/widgets/ListView更灵活的布局来实现一个可以下拉、收起的简介栏目。具体实现如下：

```php
/* View:rights */
<div class="panel panel-default" margin-top="50px">
    <div class="panel-heading">
    	<h3 class="panel-title">职权简介</h3>
    </div>
    <div class="panel-body">
        <?php echo ListView::widget([
            'dataProvider' => $priorityProvider,
            'itemView' => 'priorityList',
            'emptyText' => '无结果',
            'viewParams' => [
            ],
            'layout' => '{items}',
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-12'
            ],
        ]); ?>                                                   
    </div>
</div>
            
            
/* itemView 对应的priorityList */
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#'.$model->priority?>" class="collapsed"><?= $model->name ?></a>
        </h4>
    </div>
    <div id="<?= $model->priority?>" class="panel-collapse collapse">
        <div class="panel-body">
            <p><?= $model->information ?></p>
        </div>
    </div>
</div>
```





### 4.4 新闻公告模块

新闻公告模块有三个部分，分别是新闻公告编辑，新闻公告审核，评论审核。拥有相应职权的职员可以点击进入，开展自己的工作。界面展示如下。

新闻公告编辑主要是表单的提交。

![edit](E:\NKU\Database\team-pictures\edit.png)

评论审核主要是列表以及ActionColumn的操作。操作这一栏点击一个小勾，就可以完成审核，在前台页面上展示这条评论，具体前台展示评论的规则记录于 ？？

- [ ] # **【QXR补充】**

![comments](E:\NKU\Database\team-pictures\comments.png)

新闻公告的审核界面如下。

![news](E:\NKU\Database\team-pictures\news.png)

左栏是通过yii/widgets/ListView进行灵活布局设计，其中使用了yii/helpers/Html设计了查看和删除信息的按钮。列表显示所有的新闻。点击眼睛就会在右栏呈现详细的信息。右半部分的时间是显示今日的日期，点击审核通过按钮就表示通过，左栏的摘要前会显示绿色钩，未审核通过的是红色叉。实现小按钮的方法如下：

值得注意的是，因为外键的限制，在一条新闻删除时，它的评论也会相应删除。

```php
/*左栏的查阅与删除按钮 View: newsList*/
<?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view', 'id' => $model->id], ['title' => '查看',]) ?>
<?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id],[
        'title' => '删除',
        'onclick' => 'return confirm("删除后将无法恢复数据 确认删除？");'
    ])?>
    
/* 对应在newsController的action函数*/
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
```



### 4.5 专业团队的个人信息模块

团队主页分成四个模块。分别是团队成员信息，团队信息，个人信息修改以及账号挂靠修改。其中团队成员信息和团队信息是通过有停靠栏的布局进行设计。团队信息中的详细情况用css做了一个简单的旋转圆形，为操劳的程序员们增添一些动感。个人信息的修改和挂靠账户的修改都是以ActiveForm封装的表单提交。如果用户是队长的话，可以修改团队信息，修改的表单同样是以ActiveForm封装的表单。更详细的界面展示请参看用户手册。

![profile](E:\NKU\Database\team-pictures\profile.png)

关于账户挂靠，我们允许程序员更换，但前提是需要输入的账号是已经在数据库中的注册过的用户，并且输入正确的密码进行验证。

### 4.6 齐心抗“疫”模块

其MVC过程与居民职员数据库几乎完全一致，只需在联表查询时加入条件只显示体温异常人员。这里就不再赘述。
```php
public function search($params)
    {
        $query = User::find();
        $query->joinWith('health', true, 'INNER JOIN')->where(['or', 'health.temperature>37.2', 'health.temperature<36.3'])->orderBy(['health.last_date'=>SORT_DESC]);
      }        
```



