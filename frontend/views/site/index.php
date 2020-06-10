<?php
/*
 * @var $message string 通知信息
 */
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

            <span class="number number-counter" data-number="7062712">0</span>
            <span class="caption d-block mb-5">累计确诊</span>
            <div class="last-record d-flex justify-content-between">
                <div class="data">
                    <span class="caption">今日确诊</span>
                    <span class="number">+ <span class="number-counter" data-number="9766">0</span></span>
                </div>
                <div class="data">
                    <span class="caption">现存确诊</span>
                    <span class="number number-counter" data-number="3543568">0</span>
                </div>
            </div>

        </div>

    </div>
    <div class="col">
        <div class="data h-100 deaths">

            <span class="number number-counter" data-number="405197">0</span>
            <span class="caption d-block mb-5">累计死亡</span>
            <div class="last-record d-flex justify-content-between">
                <div class="data">
                    <span class="caption number-counter">今日死亡</span>
                    <span class="number">+<span class="number-counter" data-number="0">0</span></span>
                </div>
                <div class="data">
                    <span class="caption">病死率(%)</span>
                    <span class="number number-counter" data-number="5">0</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="data h-100 recovered">
            <span class="number number-counter" data-number="3113947">0</span>
            <span class="caption d-block mb-5">累计治愈</span class="caption d-block mb-5">
            <div class="last-record d-flex justify-content-between">
                <div class="data">
                    <span class="caption">今日治愈</span>
                    <span class="number">+<span class="number-counter" data-number="9564"></span></span>
                </div>
                <div class="data">
                    <span class="caption">治愈率(%)</span>
                    <span class="number number-counter" data-number="44">0</span>
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
        <div class="cover overlay" style="background-image: url('assets/frontend/images/hero_bg_2.jpg');">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-4 col-lg-7">
                        <h2>这里是世界地图</h2>
                    </div>
                </div>
            </div>
        <!-- BEGIN: .feature-29103 -->

    </div>
    <!-- END: .container -->
    <div class="site-section">
        <!-- BEGIN: .section-counter-78529 -->
        <div class="section-counter-78529">
            <div class="container">

                <h2 class="section-heading line-primary text-center">国内疫情数据</h2>

                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="counter-78529 d-flex align-items-start">
                            <div class="icon-wrap"><span class="flaticon-muscle text-primary icon-stethoscope"></span>
                            </div>
                            <div class="counter-text">
                                <span class="caption">较昨日+</span>
                                <span class="block-counter-78529" data-number="4">0</span>
                                <strong class="block-counter-78529" data-number="84638">0</strong>
                                <h5 class="caption">累计确诊</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="counter-78529 d-flex align-items-start">
                            <div class="icon-wrap"><span
                                        class="flaticon-stationary-bike text-primary icon-person"></span></div>
                            <div class="counter-text">
                                <span class="caption">较昨日+</span>
                                <span class="block-counter-78529" data-number="3">0</span>
                                <strong class="block-counter-78529" data-number="1783">0</strong>
                                <h5 class="caption">境外输入</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3  mb-4 mb-lg-0">

                        <div class="counter-78529 d-flex align-items-star">
                            <div class="icon-wrap"><span class="flaticon-banana text-primary icon-healing"></span></div>
                            <div class="counter-text">
                                <span class="caption">较昨日+</span>
                                <span class="block-counter-78529" data-number="10">0</span>
                                <strong class="block-counter-78529" data-number="79875">0</strong>
                                <h5 class="caption">累计治愈</h5>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="counter-78529 d-flex align-items-start">
                            <div class="icon-wrap"><span class="flaticon-heart text-primary icon-heartbeat"></span>
                            </div>
                            <div class="counter-text">
                                <span class="caption">较昨日+</span>
                                <span class="block-counter-78529" data-number="0">0</span>
                                <strong class="block-counter-78529" data-number="4645">0</strong>
                                <h5 class="caption">累计死亡</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: .section-counter-78529 -->
    </div>

    <div class="container">
        <div class="cover overlay" style="background-image: url('assets/frontend/images/hero_bg_2.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7">
                        <h2>这里是中国地图</h2>
                    </div>
                </div>
            </div>
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
                                                <p>伴有痰音、喘息，影响睡眠</p>
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
                            <img src="assets/frontend/images/person_transparent_2.png" alt="Image" class="img-fluid">
                        </figure>
                    </div>

                </div>
                <div class="col-lg-6 pl-lg-5 mb-5">

                    <!-- BEGIN: .custom-accordion -->
                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingOne">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">什么是新型冠状病毒？
                                </button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    冠状病毒是一个大型病毒家族，已知可引起感冒以及中东呼吸综合征（MERS）和严重急性呼吸综合征（SARS）等较严重疾病。新型冠状病毒是以前从未在人体中发现的冠状病毒新毒株。
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingTwo">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    新型冠状病毒的传染性和致死性如何？
                                </button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    若无有效遏制措施，患者可能感染1.5至3.5个人，具有中等传染性，与SARS大致相当。致死率低于另外两种冠状病毒MERS（致死率大约为三分之一）和SARS（致死率大约为十分之一）。
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
                                    很多野生动物都可能携带病原体，进而成为传播源。果子狸、蝙蝠、竹鼠、獾等是冠状病毒的常见宿主。为了安全起见，千万不要吃未经检疫的野生动物、生鲜等食品。
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingFour">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
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
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    被治愈的人还会继续患病（被传染）吗？
                                </button>
                            </h2>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    冠状病毒属于单链 RNA 病毒，容易变异，所以很难形成持续性免疫力。比如每年流行的流感病毒，都需要接种最新的疫苗，也是因为病毒类型经常会发生变化。新冠肺炎患者康复出院后仍有传播病毒风险，要求继续 14 天健康监测和医学观察。
                                </div>
                            </div>

                        </div> <!-- .accordion-item -->
                        <div class="accordion-item">
                            <h2 class="mb-0" id="headingFive">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    疫苗研发大概需要多久？
                                </button>
                            </h2>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                 data-parent="#accordion_1">
                                <div class="accordion-body">
                                    已有多家公司和机构正在研制疫苗。初步试验后，可能需要几个月甚至几年的时间来进行广泛测试，以证明疫苗安全性。在最好的情况下，疫苗可能在一年后对公众开放。
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
                        <h2 class="section-heading line-black heading-sm">实时播报</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="post-entry-big-22796">
                                <a href="#" class="img-link"><img src="assets/frontend/images/img_1.jpg" alt="Image"
                                                                  class="img-fluid"></a>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="post-entry-big-22796 horizontal d-flex mb-4">
                                <a href="#" class="img-link mr-4"><img src="assets/frontend/images/img_2.jpg"
                                                                       alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">6.09, 2020</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Covid</a>, <a href="#">News</a>
                                    </div>
                                    <h3 class="post-heading"><a href="#">湖北鄂州开展核酸检测筛查</a></h3>
                                </div>
                            </div>

                            <div class="post-entry-big-22796 horizontal d-flex mb-4">
                                <a href="#" class="img-link mr-4"><img src="assets/frontend/images/img_3.jpg"
                                                                       alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">6.08, 2020</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Health</a>, <a href="#">News</a>
                                    </div>
                                    <h3 class="post-heading"><a href="#">阿布扎比酋长国宣布延长一周人员流动禁令</a></h3>
                                </div>
                            </div>

                            <div class="post-entry-big-22796 horizontal d-flex mb-4">
                                <a href="#" class="img-link mr-4"><img src="assets/frontend/images/img_4.jpg"
                                                                       alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">6.06, 2020</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Health</a>, <a href="#">News</a>
                                    </div>
                                    <h3 class="post-heading"><a href="#">200余名员工感染新冠病毒 巴西淡水河谷暂停伊塔比拉综合矿区业务</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: news -->

                <!-- BEGIN: videos -->
                <div class="col-lg-3">
                    <div class="section-heading">
                        <h2 class="section-heading heading-sm line-black">宣传小视频</h2>
                    </div>
                    <a href="https://vimeo.com/45830194" class="video-41036 mb-4" data-fancybox="" data-ratio="2">
            <span class="play">
              <span class="icon-play"></span>
            </span>
                        <img src="assets/frontend/images/img_sm_1.jpg" alt="Image" class="img-fluid">
                    </a>
                    <a href="https://vimeo.com/45830194" class="video-41036 mb-4" data-fancybox="" data-ratio="2">
            <span class="play">
              <span class="icon-play"></span>
            </span>
                        <img src="assets/frontend/images/img_sm_8.jpg" alt="Image" class="img-fluid">
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
                                <li><a href="#">电子体温计</a></li>
                                <li><a href="#">消毒液</a></li>
                                <li><a href="#">一次性口罩</a></li>
                                <li><a href="#">电动喷雾机</a></li>
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
                        <div class="widget-inner"><img src="assets/frontend/images/img_sm_2.jpg" alt="Image"
                                                       class="img-mb-2 img-fluid">
                        </div>
                        <div class="widget-inner">
                            <ul class="list-unstyled">
                                <li><a href="#">蔬菜粮油</a></li>
                                <li><a href="#">水果</a></li>
                                <li><a href="#">饮用水</a></li>
                                <li><a href="#">液化气</a></li>
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
                                <li><a href="#">上门随访，健康检测</a></li>
                                <li><a href="#">居家隔离，体温监测</a></li>
                                <li><a href="#">专户专人，隔离值守</a></li>
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
                                <li><a href="#">发放出入证，精准识别</a></li>
                                <li><a href="#">设立检查点，体温监测</a></li>
                                <li><a href="#">封闭式管理，外来人员禁入</a></li>
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
