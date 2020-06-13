<?php
/**
 * @var $message string 通知信息
 * @var $news    mixed  新闻信息
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
$cnt = 2;
?>
<!-- BEGIN: .cover -->
<div class="cover overlay" style="background-image: url('assets/frontend/images/hero_bg_2.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-7">
                <span class="caption mb-3 d-block">欢迎来到平安社区</span>
                <!--发送通知信息-->
                <?php
                if (isset($message))
                    echo "<h1 class=\"heading\">" . $message . "</h1>";
                if(isset($_GET['message']))
                    echo "<h1 class=\"heading\">" . $_GET['message'] . "</h1>";
                else echo "<h1 class=\"heading\">守护社区平安，我们在行动</h1>";
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END: .cover -->

<div class="analytics no-gutters d-block d-md-flex align-items-stretch ml-auto section-counter">


    <div class="col">
        <div class="data h-100 cases">

            <span class="number number-counter" id="globalTotal">0</span>
            <span class="caption d-block mb-5">累计确诊</span>
            <div class="last-record d-flex justify-content-between">
                <div class="data" id="tt">
                    <span class="caption">今日确诊</span>
                    <span class="number" id="deathSign">+<span class="number-counter" id="todayC">0</span></span>
                </div>
                <div class="data">
                    <span class="caption">现存确诊</span>
                    <span class="number number-counter" id="globalNow">0</span>
                </div>
            </div>

        </div>

    </div>
    <div class="col">
        <div class="data h-100 deaths">

            <span class="number number-counter" id="globalDeath">0</span>
            <span class="caption d-block mb-5">累计死亡</span>
            <div class="last-record d-flex justify-content-between">
                <div class="data">
                    <span class="caption number-counter">今日死亡</span>
                    <span class="number">+<span class="number-counter" id="todayD">0</span></span>
                </div>
                <div class="data">
                    <span class="caption">病死率(%)</span>
                    <span class="number number-counter" id="globalDeathRank">0</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="data h-100 recovered">
            <span class="number number-counter" id="globalCure">0</span>
            <span class="caption d-block mb-5">累计治愈</span class="caption d-block mb-5">
            <div class="last-record d-flex justify-content-between">
                <div class="data">
                    <span class="caption">今日治愈</span>
                    <span class="number">+<span class="number-counter" id="cureSign">0</span></span>
                </div>
                <div class="data">
                    <span class="caption">治愈率(%)</span>
                    <span class="number number-counter" id="globalCureRank">0</span>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- BEGIN: #main -->
<div id="main">

    <!-- BEGIN: .bg-floating-1 -->
    <span class="bg-floating-1"></span>
    <!-- END: .bg-floating-1 -->

    <!-- BEGIN: .container -->
    <div class="container">


        <br>
        <h2 class="section-heading line-primary text-center">全球疫情数据</h2>

        <!-- BEGIN: .feature-29103 -->
        <div class="cover overlay" id="worldMap">

        </div>
        <!-- BEGIN: .feature-29103 -->

    </div>
    <!-- END: .container -->
    <div class="container">
        <div class="site-section">
            <!-- BEGIN: .section-counter-78529 -->
            <div class="section-counter-78529">
                <div class="container">

                    <h2 class="section-heading line-primary text-center">国内疫情数据</h2>

                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                            <div class="counter-78529 d-flex align-items-start">
                                <div class="icon-wrap"><span
                                            class="flaticon-muscle text-primary icon-stethoscope"></span>
                                </div>
                                <div class="counter-text">
                                    <span class="caption">较昨日</span>
                                    <span class="block-counter-78529" id="confirmToday">0</span>
                                    <strong class="block-counter-78529" id="confirmTotal">0</strong>
                                    <h5 class="caption">累计确诊</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="counter-78529 d-flex align-items-start">
                                <div class="icon-wrap"><span
                                            class="flaticon-stationary-bike text-primary icon-person"></span></div>
                                <div class="counter-text">
                                    <span class="caption">较昨日</span>
                                    <span class="block-counter-78529" id="inputToday">0</span>
                                    <strong class="block-counter-78529" id="inputTotal">0</strong>
                                    <h5 class="caption">境外输入</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3  mb-4 mb-lg-0">

                            <div class="counter-78529 d-flex align-items-star">
                                <div class="icon-wrap"><span class="flaticon-banana text-primary icon-healing"></span>
                                </div>
                                <div class="counter-text">
                                    <span class="caption">较昨日</span>
                                    <span class="block-counter-78529" id="cureToday">0</span>
                                    <strong class="block-counter-78529" id="cureTotal">0</strong>
                                    <h5 class="caption">累计治愈</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="counter-78529 d-flex align-items-start">
                                <div class="icon-wrap"><span class="flaticon-heart text-primary icon-heartbeat"></span>
                                </div>
                                <div class="counter-text">
                                    <span class="caption">较昨日</span>
                                    <span class="block-counter-78529" id="deathToday">0</span>
                                    <strong class="block-counter-78529" id="deathTotal">0</strong>
                                    <h5 class="caption">累计死亡</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: .section-counter-78529 -->
        </div>

        <div class="cover overlay" id="ChinaMap" style="background:#fff">
        </div>
    </div>
    <!-- BEGIN: .section-21219 -->
    <div class="section-21219 bg-light">
        <div class="container">
            <div class="row justify-content-between align-items-stretch">
                <div class="col-lg-8">

                    <div class="pr-md-4 bg h-100">

                        <!-- BEGIN: .bg-floating -->
                        <span class="bg-floating-2"></span>
                        <!-- END: .bg-floating -->

                        <!--
                        You can change the color of the line by addings these 'classes'
                        '.line-black', '.line-primary', '.line-white'
                        -->
                        <h3 class="section-heading line-black">疫情小知识</h3>

                        <!-- BEGIN: .slider-29101-wrap -->
                        <div class="slider-29101-wrap d-lg-flex">
                            <ul class="list-unstyled slider-custom-nav row d-lg-block">
                                <li class="active col-sm"><a href="#" class="w-100">症状</a></li>
                                <li class="col-sm"><a href="#" class="w-100">传播</a></li>
                                <li class="col-sm"><a href="#" class="w-100">预防</a></li>
                            </ul>

                            <div class="slider-290101 w-100" id="vertical-slider">

                                <!-- BEGIN: .item -->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/symptom_01.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">1</span>
                                                </div>
                                                <h3>发烧</h3>
                                                <p>高热持续72小时以上</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/symptom_02.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">2</span>
                                                </div>
                                                <h3>呼吸</h3>
                                                <p>频率加快，甚至呼吸困难</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom mb-0">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/symptom_03.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">3</span>
                                                </div>
                                                <h3>干咳</h3>
                                                <p>伴有痰音、喘息，<br>影响睡眠</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom mb-0">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/symptom_04.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">4</span>
                                                </div>
                                                <h3>乏力</h3>
                                                <p>精神差、食欲差</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                    </div>
                                </div>
                                <!-- END: .item -->

                                <!-- BEGIN: .item -->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/contagion_01.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">1</span>
                                                </div>
                                                <h3>飞沫传播</h3>
                                                <p>患者打喷嚏、流鼻涕、咳嗽、说话出的飞沫以及呼出的气体，近距离接触到其他健康人员，使其吸入到气道内而导致感染。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/contagion_02.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">2</span>
                                                </div>
                                                <h3>直接接触传播</h3>
                                                <p>健康人群接触污染的手臂后，再接触自己的口腔、鼻腔、眼球等黏膜处，会被吸收导致感染。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom mb-0">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/contagion_03.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">3</span>
                                                </div>
                                                <h3>污染物传播</h3>
                                                <p>感染病毒的人接触过的物品上也会留存病毒，如果物品接触到口腔、鼻腔、眼球等黏膜处，会被吸收导致感染。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                    </div>
                                </div>
                                <!-- END: .item -->

                                <!-- BEGIN: .item -->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/prevention_01.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">1</span>
                                                </div>
                                                <h3>勤洗手</h3>
                                                <p>洗手时注意使用流动水和肥皂或洗手液彻底清洗双手，揉搓时间不少于 20 秒。避免用未清洁的手触摸眼睛、鼻子和嘴巴。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/prevention_02.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">2</span>
                                                </div>
                                                <h3>戴口罩</h3>
                                                <p>日常防护选择医用外科口罩，在戴口罩过程中避免手接触到口罩内面，以降低口罩被污染的可能。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom mb-0">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/prevention_03.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">3</span>
                                                </div>
                                                <h3>避免直接接触</h3>
                                                <p>避免与有呼吸道症状的人密切接触。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                        <div class="col-6 col-sm-6 col-md-6">
                                            <!-- BEGIN: .symptom -->
                                            <div class="symptom mb-0">
                                                <div class="img-wrap">
                                                    <img src="assets/frontend/images/prevention_04.png" alt="Image"
                                                         class="d-block">
                                                    <span class="number d-block">4</span>
                                                </div>
                                                <h3>咳嗽或打喷嚏时遮住口鼻</h3>
                                                <p>咳嗽和打喷嚏时，含有病毒的飞沫可散布至大约 2 米范围内的空气中。</p>
                                            </div>
                                            <!-- END: .symptom -->
                                        </div>

                                    </div>
                                </div>
                                <!-- END: .item -->


                            </div>
                        </div>

                        <!-- END: .slider-29101-wrap -->

                    </div>

                </div>
                <div class="col-lg-4 pl-lg-5 h-100">
                    <!-- BEGIN: .widget-29182 -->
                    <div class="widget-29182">
                        <div class="widget-inner text-center">
                            <h3>社区防护</h3>
                            <img src="assets/frontend/images/hero_bg_2.jpg" alt="Image" class="img-mb-2 img-fluid">
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="#">实时动态信息发布</a></li>
                                <li><a href="#">风险实时预测</a></li>
                                <li><a href="#">在线沟通协作</a></li>
                                <li><a href="#">趋势分析研判</a></li>
                                <li><a href="#">远程医疗辅助</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->

                    <a href="#" class="btn btn-primary btn-block text-center has-icon d-flex"><span
                                class="mx-auto d-flex align-items-center"><span class="lni lni-stethoscope mr-3"></span> <span>I have Covid19</span></span></a>
                    <a href="#" class="btn btn-primary btn-block text-center has-icon d-flex"><span
                                class="mx-auto d-flex align-items-center"><span
                                    class="lni lni-envelope mr-3"></span> <span>Get In Touch</span></span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: .section-21219 -->

    <!-- BEGIN: .site-section -->
    <!--
      Add '.overlay' class to '.bg-image' if you want to add a darker background image
    -->
    <div class="site-section overflow-hidden pb-0 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg
        -7">
                    <!--
                      You can change the color of the line by addings these 'classes'
                      '.line-black', '.line-primary', '.line-white'
                      Line Alignment: Add classes like '.text-center', '.text-left', 'text-right'
                      -->
                    <h2 class="section-heading line-primary text-center">即时解答</h2>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-6 align-self-end">

                    <div class="video-wrap">
                        <figure class="video">
                            <!-- BEGIN: .video-play-button -->
                            <!-- Add '.bottom' class to make the button at the bottom position -->
                            <a href="https://vimeo.com/45830194" class="video-play-button bottom" data-fancybox=""
                               data-ratio="2">
                                <span class="icon icon-play"></span>
                            </a>
                            <!-- END: .video-play-button -->
                            <img src="assets/frontend/images/person_transparent_2.png" alt="Image"
                                 class="img-fluid">
                        </figure>
                    </div>

                </div>
                <div class="col-lg-6 pl-lg-5 mb-5">

                    <!-- BEGIN: .custom-accordion -->
                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingOne">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    什么是新型冠状病毒？
                                </button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    冠状病毒是一个大型病毒家族，已知可引起感冒以及中东呼吸综合征（MERS）和严重急性呼吸综合征（SARS）等较严重疾病。
                                    新型冠状病毒是以前从未在人体中发现的冠状病毒新毒株。
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingTwo">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                    新型冠状病毒的传染性和致死性如何？
                                </button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    若无有效遏制措施，患者可能感染1.5至3.5个人，具有中等传染性，与SARS大致相当。
                                    致死率低于另外两种冠状病毒MERS（致死率大约为三分之一）和SARS（致死率大约为十分之一）。
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->
                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingThree">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">哪些野生动物会携带新型冠状病毒？
                                </button>
                            </h2>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    很多野生动物都可能携带病原体，进而成为传播源。果子狸、蝙蝠、竹鼠、獾等是新型冠状病毒的常见宿主。
                                    为了安全起见，千万不要吃未经检疫的野生动物、生鲜等食品。
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingFour">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                    为什么要对密切接触者医学观察 14 天？
                                </button>
                            </h2>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    新型冠状病毒肺炎的潜伏期 1～14 天，多为 3～7 天。
                                    参照其他冠状病毒所致疾病的潜伏期，此次新冠肺炎病例将密切接触者医学观察期定为 14 天，并对密切接触者进行居家医学观察。
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingFive">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                    被治愈的人还会继续患病（被传染）吗？
                                </button>
                            </h2>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    冠状病毒属于单链 RNA
                                    病毒，容易变异，所以很难形成持续性免疫力。比如每年流行的流感病毒，都需要接种最新的疫苗，也是因为病毒类型经常会发生变化。
                                    新冠肺炎患者康复出院后仍有传播病毒风险，要求继续 14 天健康监测和医学观察。
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->
                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingSix">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseSix">
                                    疫苗研发大概需要多久？
                                </button>
                            </h2>

                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    已有多家公司和机构正在研制疫苗。初步试验后，可能需要几个月甚至几年的时间来进行广泛测试，以证明疫苗安全性。
                                    在最好的情况下，疫苗可能在一年后对公众开放。
                                </div>
                            </div>


                        </div> <!-- .accordion-item -->


                    </div>
                    <!-- END: .custom-accordion -->

                </div>
            </div>
        </div>

    </div>
    <!-- END: .site-section -->

    <!-- BEGIN: .news-updates-22796 -->
    <div class=" site-section bg-light news-updates-22796">
        <div class="container">

            <div class="row">
                <!-- BEGIN: news -->
                <div class="col-lg-9 mb-4 mb-lg-0">
                    <div class="section-heading">
                        <h2 class="section-heading line-black heading-sm">实时新闻</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="post-entry-big-22796">
                                <a href="#" class="img-link"><img src="assets/frontend/images/img_1.jpg" alt="Image"
                                                                  class="img-fluid"></a>

                            </div>
                        </div>
                        <div class="col-lg-6">
                        <?php foreach ($news as $news): ?>
                            <div class="post-entry-big-22796 horizontal d-flex mb-4">
                                <a href="#" class="img-link mr-4"><img src="assets/frontend/images/img_<?=$cnt++?>.jpg"
                                                                       alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#"><?= Html::encode("{$news->date} ({$news->time})") ?></a>
                                        <span class="mx-1">/</span>
                                        <a href="#"><?= Html::encode("{$news->cnt}") ?></a>
                                    </div>
                                    <h3 class="post-heading"><a
                                                href="http://baijiahao.baidu.com/s?id=1669064014333218250&wfr=newsapp">
                                        <?= Html::encode("{$news->title}") ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <!-- END: news -->

                <!-- BEGIN: videos -->
                <div class="col-lg-3">
                    <div class="section-heading">
                        <h2 class="section-heading heading-sm line-black">宣传小视频</h2>
                    </div>
                    <a href="assets/video/video1.mp4" class="video-41036 mb-4" data-fancybox="" data-ratio="2">
            <span class="play">
              <span class="icon-play"></span>
            </span>
                        <img src="assets/frontend/images/img_sm_7.jpg" alt="Image" class="img-fluid">
                    </a>
                    <a href="assets/video/video2.mp4" class="video-41036 mb-4" data-fancybox="" data-ratio="2">
            <span class="play">
              <span class="icon-play"></span>
            </span>
                        <img src="assets/frontend/images/prevention.jpg" alt="Image" class="img-fluid" width="200" height="200">
                    </a>
                </div>
                <!-- BEGIN: videos -->
            </div>
        </div>
    </div>
    <!-- BEGIN: .news-updates-22796 -->

    <!-- BEGIN: .site-section -->
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <h2 class="section-heading line-primary">社区防护措施</h2>
                </div>
                <div class="col-md-6">
                    <p>社区是疫情联防联控、群防群控的关键防线，要推动防控资源和力量下沉，把社区这道防线守严守牢。社区防控工作事关国家抗“疫”大局，事关人民切身利益。</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">
                        <div class="widget-inner">
                            <h3>发放防疫物品</h3>
                        </div>
                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_1.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>

                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://www.sohu.com/a/369773520_120058454">
                                        电子体温计</a>
                                </li>
                                <li>
                                    <a href="https://www.sohu.com/a/369773520_120058454">
                                        消毒液</a>
                                </li>
                                <li>
                                    <a href="https://www.sohu.com/a/369773520_120058454">
                                        一次性口罩</a>
                                </li>
                                <li>
                                    <a href="https://www.sohu.com/a/369773520_120058454">
                                        电动喷雾机</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">
                        <div class="widget-inner">
                            <h3>采买生活用品</h3>
                        </div>
                        <div class="widget-inner"><img src="assets/frontend/images/img_7.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="http://k.sina.com.cn/article_1893892941_70e2834d02000og34.html?from=society">
                                        蔬菜粮油</a>
                                </li>
                                <li>
                                    <a href="http://k.sina.com.cn/article_1893892941_70e2834d02000og34.html?from=society">
                                        水果</a>
                                </li>
                                <li>
                                    <a href="http://k.sina.com.cn/article_1893892941_70e2834d02000og34.html?from=society">
                                        饮用水</a>
                                </li>
                                <li>
                                    <a href="http://k.sina.com.cn/article_1893892941_70e2834d02000og34.html?from=society">
                                        液化气</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">
                        <div class="widget-inner">
                            <h3>隔离措施</h3>
                        </div>
                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_3.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="http://gdgz.wenming.cn/gzjj/202002/t20200207_6274584.htm">
                                        上门随访，健康检测
                                    </a>
                                </li>
                                <li>
                                    <a href="http://gdgz.wenming.cn/gzjj/202002/t20200207_6274584.htm">
                                        居家隔离，体温监测
                                    </a>
                                </li>
                                <li>
                                    <a href="http://gdgz.wenming.cn/gzjj/202002/t20200207_6274584.htm">
                                        专户专人，隔离值守
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <!-- BEGIN: .widget-29182 -->
                    <!--
                      Add '.widget-29182-v2' class for v2 style
                    -->
                    <div class="widget-29182 widget-29182-v2 mb-0 pb-0">
                        <div class="widget-inner">
                            <h3>社区出入管理</h3>
                        </div>
                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_4.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="https://baijiahao.baidu.com/s?id=1658172044602323644&wfr=spider&for=pc">发放出入证，精准识别</a>
                                </li>
                                <li>
                                    <a href="https://baijiahao.baidu.com/s?id=1658172044602323644&wfr=spider&for=pc">设立检查点，体温监测</a>
                                </li>
                                <li>
                                    <a href="https://baijiahao.baidu.com/s?id=1658172044602323644&wfr=spider&for=pc">封闭式管理，外来人员禁入</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: .widget-29182 -->
                </div>

            </div>
        </div>
    </div>
    <!-- END: .site-section -->

</div>
<!-- END: #main -->

<script language="JavaScript">
    <?php $this->beginBlock('js_end') ?>
    function match(source, id) {
        if (source === undefined) document.getElementById(id).innerText = "待国家卫健委数据公布中";
        else if (parseInt(source) < 0) {
            document.getElementById(id).innerText = source;
        } else if (parseInt(source) === 0) {
            document.getElementById(id).innerText = "无变化";
        } else document.getElementById(id).innerText = "+" + source;
    }

    function worldMatch(source, id) {
        var sign = document.getElementById(id);
        if (source === undefined) {
            sign.innerText = "0(待公布)";
        } else {
            sign.setAttribute("data-number", source);
        }
    }

    function data() {
        var dataApi = "http://49.232.173.220:3001/data/getStatisticsService";
        $.getJSON(dataApi, function (newpneumoniadata) {
            //世界数据
            var summaryDataIn = newpneumoniadata["globalStatistics"];
            var currentConfirmedCount = summaryDataIn["currentConfirmedCount"];
            var confirmedCount = summaryDataIn["confirmedCount"];
            var curedCount = summaryDataIn["curedCount"];
            var deadCount = summaryDataIn["deadCount"];
            var currentConfirmedIncr = summaryDataIn["currentConfirmedIncr"];
            var confirmedIncr = summaryDataIn["confirmedIncr"];
            var curedIncr = summaryDataIn["curedIncr"];
            var deadIncr = summaryDataIn["deadIncr"];
            document.getElementById("globalTotal").setAttribute("data-number", confirmedCount);
            worldMatch(confirmedIncr, "todayC");
            document.getElementById("globalNow").setAttribute("data-number", currentConfirmedCount);
            document.getElementById("globalDeath").setAttribute("data-number", deadCount);
            worldMatch(deadIncr, "todayD");
            var deathRank = (parseInt(deadCount) * 100 / parseInt(confirmedCount)).toFixed(1) + "";
            var cureRank = (parseInt(curedCount) * 100 / parseInt(confirmedCount)).toFixed(1) + "";
            document.getElementById("globalDeathRank").setAttribute("data-number", deathRank);
            document.getElementById("globalCure").setAttribute("data-number", curedCount);
            worldMatch(curedIncr, "cureSign");
            document.getElementById("globalCureRank").setAttribute("data-number", cureRank);

            var nationData = newpneumoniadata;
            document.getElementById("confirmTotal").setAttribute("data-number", nationData["confirmedCount"]);
            document.getElementById("inputTotal").setAttribute("data-number", nationData["suspectedCount"]);
            document.getElementById("cureTotal").setAttribute("data-number", nationData["curedCount"]);
            document.getElementById("deathTotal").setAttribute("data-number", nationData["deadCount"]);
            match(nationData["confirmedIncr"], "confirmToday");
            match(nationData["suspectedIncr"], "inputToday");
            match(nationData["curedIncr"], "cureToday");
            match(nationData["deadIncr"], "deathToday");
        })
    }

    window.onbeforeunload = function () {
        document.documentElement.scrollTop = 0;  //ie下
        document.body.scrollTop = 0;  //非ie
    }

    function chinaMap() {
        var myChart = echarts.init(document.getElementById("ChinaMap"));

        // 指定图表的配置项和数据
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
            toolbox: {
                show: true,
                orient: 'vertical',
                left: 'right',
                top: 'center',
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            roamController: {
                show: true,
                left: 'right',
                mapTypeControl: {
                    'china': true
                }
            },
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

        //使用指定的配置项和数据显示图表
        myChart.setOption(option);

        //获取数据
        function getData() {
            $.ajax({
                url: "https://view.inews.qq.com/g2/getOnsInfo?name=disease_h5",
                dataType: "jsonp",
                success: function (data) {
                    var res = data.data || "";
                    res = JSON.parse(res);
                    var newArr = [];
                    if (res) {
                        //获取到各个省份的数据
                        var province = res.areaTree[0].children;
                        for (var i = 0; i < province.length; i++) {
                            var json = {
                                name: province[i].name,
                                value: province[i].total.nowConfirm
                            }
                            newArr.push(json)
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
                                            show: true,
                                            texrStyle: {
                                                fontSize: 15,
                                                fontWeight: 'bold',
                                                color: '#000000',
                                            }
                                        }
                                    },
                                    data: newArr
                                }
                            ]
                        });
                    }
                }

            })
        }

        getData();
    }

    function worldMap() {
        var myChart = echarts.init(document.getElementById("worldMap"));

        // 指定图表的配置项和数据
        var option = {
            backgroundColor: '#ffffff',
            title: {
                text: '世界疫情图',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['世界疫情图']
            },
            visualMap: {
                type: 'piecewise',
                pieces: [
                    {min: 1000, max: 100000000, label: '大于等于1000人', color: '#891200'},
                    {min: 500, max: 999, label: '确诊500-999人', color: '#cb2b18'},
                    {min: 100, max: 499, label: '确诊100-499人', color: '#d6493c'},
                    {min: 10, max: 99, label: '确诊10-99人', color: '#f97364'},
                    {min: 1, max: 9, label: '确诊1-9人', color: '#f5bba7'},
                    {min: 0, max: 0, label: '无现存确诊', color: '#ebd9bc'}
                ],
                color: ['#E0022B', '#E09107', '#A3E00B']
            },
            toolbox: {
                show: true,
                orient: 'vertical',
                left: 'right',
                top: 'center',
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    restore: {show: true},
                    saveAsImage: {show: true}
                }
            },
            roamController: {
                show: true,
                left: 'right',
                mapTypeControl: {
                    'china': true
                }
            },
            series: [
                {
                    name: '现存确诊数',
                    type: 'map',
                    mapType: 'world',
                    roam: false,
                    label: {
                        show: true,
                        color: 'rgb(249, 249, 249)'
                    },
                    data: []
                }
            ]
        };

        //使用指定的配置项和数据显示图表
        myChart.setOption(option);

        //获取数据
        function getData() {
            var dataApi = "http://49.232.173.220:3001/data/getListByCountryTypeService2true";
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
                'Austria': '奥地利',
                'Azerbaijan': '阿塞拜疆',
                'The Bahamas': '巴哈马',
                'Bahrain': '巴林',
                'Bangladesh': '孟加拉国',
                'Barbados': '巴巴多斯',
                'Belarus': '白俄罗斯',
                'Belgium': '比利时',
                'Belize': '伯利兹',
                'Benin': '贝宁',
                'Bermuda': '百慕大',
                'Bhutan': '不丹',
                'Bolivia': '玻利维亚',
                'Bosnia and Herzegovina': '波斯尼亚和黑塞哥维那',
                'Botswana': '博茨瓦纳',
                'Brazil': '巴西',
                'Brunei': '文莱',
                'Bulgaria': '保加利亚',
                'Burkina Faso': '布基纳法索',
                'Burundi': '布隆迪共和国',
                'Cambodia': '柬埔寨',
                'Cameroon': '喀麦隆',
                'Canada': '加拿大',
                'Cape Verde': '佛得角',
                'Central African Republic': '中非共和国',
                'Chad': '乍得',
                'Chile': '智利',
                'China': '中国',
                'Colombia': '哥伦比亚',
                'Comoros': '科摩罗',
                'Republic of the Congo': '刚果（布）',
                'Costa Rica': '哥斯达黎加',
                'Croatia': '克罗地亚',
                'Cuba': '古巴',
                'Cyprus': '塞浦路斯',
                'Czech Republic': '捷克共和国',
                'Denmark': '丹麦',
                'Djibouti': '吉布提',
                'Dominica': '多米尼加',
                'Dominican Republic': '多明尼加共和国',
                'Ecuador': '厄瓜多尔',
                'Egypt': '埃及',
                'El Salvador': '萨尔瓦多',
                'Equatorial Guinea': '赤道几内亚',
                'Eritrea': '厄立特里亚',
                'Estonia': '爱沙尼亚',
                'Ethiopia': '埃塞俄比亚',
                'Falkland Islands': '福克兰群岛',
                'Faroe Islands': '法罗群岛',
                'Fiji': '斐济',
                'Finland': '芬兰',
                'France': '法国',
                'French Guiana': '法属圭亚那',
                'French Southern and Antarctic Lands': '法属南半球和南极领地',
                'Gabon': '加蓬',
                'Gambia': '冈比亚',
                'Gaza Strip': '加沙',
                'Georgia': '格鲁吉亚',
                'Germany': '德国',
                'Ghana': '加纳',
                'Greece': '希腊',
                'Greenland': '格陵兰',
                'Grenada': '格林纳达',
                'Guadeloupe': '瓜德罗普',
                'Guatemala': '危地马拉',
                'Guinea': '几内亚',
                'Guinea Bissau': '几内亚比绍',
                'Guyana': '圭亚那',
                'Haiti': '海地',
                'Honduras': '洪都拉斯',
                'Hong Kong': '香港',
                'Hungary': '匈牙利',
                'Iceland': '冰岛',
                'India': '印度',
                'Indonesia': '印尼',
                'Iran': '伊朗',
                'Iraq': '伊拉克',
                'Iraq-Saudi Arabia Neutral Zone': '伊拉克阿拉伯中立区',
                'Ireland': '爱尔兰',
                'Isle of Man': '马恩岛',
                'Israel': '以色列',
                'Italy': '意大利',
                'Ivory Coast': '科特迪瓦',
                'Jamaica': '牙买加',
                'Jan Mayen': '扬马延岛',
                'Japan': '日本',
                'Jordan': '约旦',
                'Kazakhstan': '哈萨克斯坦',
                'Kenya': '肯尼亚',
                'Kerguelen': '凯尔盖朗群岛',
                'Kiribati': '基里巴斯',
                'Dem.Rep.Korea': '朝鲜',
                'Korea': '韩国',
                'Kuwait': '科威特',
                'Kyrgyzstan': '吉尔吉斯斯坦',
                'Laos': '老挝',
                'Latvia': '拉脱维亚',
                'Lebanon': '黎巴嫩',
                'Lesotho': '莱索托',
                'Liberia': '利比里亚',
                'Libya': '利比亚',
                'Liechtenstein': '列支敦士登',
                'Lithuania': '立陶宛',
                'Luxembourg': '卢森堡',
                'Macau': '澳门',
                'Macedonia': '马其顿',
                'Madagascar': '马达加斯加',
                'Malawi': '马拉维',
                'Malaysia': '马来西亚',
                'Maldives': '马尔代夫',
                'Mali': '马里',
                'Malta': '马耳他',
                'Martinique': '马提尼克',
                'Mauritania': '毛里塔尼亚',
                'Mauritius': '毛里求斯',
                'Mexico': '墨西哥',
                'Moldova': '摩尔多瓦',
                'Monaco': '摩纳哥',
                'Mongolia': '蒙古',
                'Morocco': '摩洛哥',
                'Mozambique': '莫桑比克',
                'Myanmar': '缅甸',
                'Namibia': '纳米比亚',
                'Nepal': '尼泊尔',
                'Netherlands': '荷兰',
                'New Caledonia': '新喀里多尼亚',
                'New Zealand': '新西兰',
                'Nicaragua': '尼加拉瓜',
                'Niger': '尼日尔',
                'Nigeria': '尼日利亚',
                'Northern Mariana Islands': '北马里亚纳群岛',
                'Norway': '挪威',
                'Oman': '阿曼',
                'Pakistan': '巴基斯坦',
                'Panama': '巴拿马',
                'Papua New Guinea': '巴布亚新几内亚',
                'Paraguay': '巴拉圭',
                'Peru': '秘鲁',
                'Philippines': '菲律宾',
                'Poland': '波兰',
                'Portugal': '葡萄牙',
                'Puerto Rico': '波多黎各',
                'Qatar': '卡塔尔',
                'Reunion': '留尼旺岛',
                'Romania': '罗马尼亚',
                'Russia': '俄罗斯',
                'Rwanda': '卢旺达',
                'San Marino': '圣马力诺',
                'Sao Tome and Principe': '圣多美和普林西比',
                'Saudi Arabia': '沙特阿拉伯',
                'Senegal': '塞内加尔',
                'Seychelles': '塞舌尔',
                'Sierra Leone': '塞拉利昂',
                'Singapore': '新加坡',
                'Slovakia': '斯洛伐克',
                'Slovenia': '斯洛文尼亚',
                'Solomon Islands': '所罗门群岛',
                'Somalia': '索马里',
                'South Africa': '南非',
                'Spain': '西班牙',
                'Sri Lanka': '斯里兰卡',
                'St. Christopher-Nevis': '圣',
                'St. Lucia': '圣露西亚',
                'St. Vincent and the Grenadines': '圣文森特和格林纳丁斯',
                'Sudan': '苏丹',
                'Suriname': '苏里南',
                'Svalbard': '斯瓦尔巴特群岛',
                'Swaziland': '斯威士兰',
                'Sweden': '瑞典',
                'Switzerland': '瑞士',
                'Syria': '叙利亚',
                'Taiwan': '台湾',
                'Tajikistan': '塔吉克斯坦',
                'United Republic of Tanzania': '坦桑尼亚',
                'Thailand': '泰国',
                'Togo': '多哥',
                'Tonga': '汤加',
                'Trinidad and Tobago': '特里尼达和多巴哥',
                'Tunisia': '突尼斯',
                'Turkey': '土耳其',
                'Turkmenistan': '土库曼斯坦',
                'Turks and Caicos Islands': '特克斯和凯科斯群岛',
                'Uganda': '乌干达',
                'Ukraine': '乌克兰',
                'United Arab Emirates': '阿联酋',
                'United Kingdom': '英国',
                'United States': '美国',
                'Uruguay': '乌拉圭',
                'Uzbekistan': '乌兹别克斯坦',
                'Vanuatu': '瓦努阿图',
                'Venezuela': '委内瑞拉',
                'Vietnam': '越南',
                'Western Sahara': '西撒哈拉',
                'Western Samoa': '西萨摩亚',
                'Yemen': '也门共和国',
                'Yugoslavia': '南斯拉夫',
                'Democratic Republic of the Congo': '刚果（金）',
                'Zambia': '赞比亚共和国',
                'Zimbabwe': '津巴布韦',
                'South Sudan': '南苏丹',
                'Somaliland': '索马里兰',
                'Montenegro': '黑山',
                'Kosovo': '科索沃',
                'Republic of Serbia': '塞尔维亚',
            };


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
            })
        }

        getData();
    }

    data();
    chinaMap();
    worldMap();
    <?php $this->endBlock(); ?>
</script>
<?php $this->registerJs($this->blocks['js_end'], \yii\web\View::POS_END);//将编写的js代码注册到页面底部 ?>


