# NOCOV团队网站实现手册

| 成员姓名 | 成员学号 | github地址 | 邮箱 |
| -------- | -------- | ---------- | ---- |
|          |          |            |      |

## 一、项目部署与模板导入

### 1.1 项目部署



### 1.2 模板导入





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



### 2.3 联系界面



### 2.4 注册与登录界面

#### 2.4.1 页面设计



#### 2.4.2 逻辑



## 三、后台界面实现

### 3.1 健康日报表单提交

其MVC过程与注册登录界面几乎完全一致，这里就不再赘述。

### 3.2 修改用户信息

其MVC过程与注册登录界面几乎完全一致，这里就不再赘述。

### 3.3 后台新闻



## 四、管理界面实现

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

### 4.2 居民职员数据库



### 4.3 职员权限分配


### 4.4 新闻审核



### 4.5 评论审核



### 4.6 体温异常人员信息列表
其MVC过程与居民职员数据库几乎完全一致，只需在联表查询时加入条件只显示体温异常人员。这里就不再赘述。
```php
public function search($params)
    {
        $query = User::find();
        $query->joinWith('health', true, 'INNER JOIN')->where(['or', 'health.temperature>37.2', 'health.temperature<36.3'])->orderBy(['health.last_date'=>SORT_DESC]);
      }        
```



