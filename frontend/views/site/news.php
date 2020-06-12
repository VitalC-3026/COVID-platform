<?php

use frontend\controllers\NewsController;

$sudo = new NewsController();
$sudo->setBtMark(1);
?>

<!-- BEGIN: .cover -->
<div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h1 class="mb-0 heading text-white">社区新闻</h1>
        <p class="mb-0 text-white">
            风声雨声读书声，声声入耳；家事国事天下事，事事顺心
        </p>
      </div>
    </div>
  </div>
</div>

<div class="custom-breadcrumns-23195 border-bottom">
  <div class="container">
    <a href="index.php">主页</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">新闻</span>
  </div>
</div>
<!-- END: .cover -->


<!-- BEGIN: #main -->
<div id="main">
  
  <!-- BEGIN: .site-section -->
  <div class="site-section section-29101 overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_1.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#">June 6, 2019</a>
                <span class="mx-1">/</span>
                <a href="#">Health</a>, <a href="#">News</a>
              </div>
              <h3 class="post-heading"><a href="#">Always Cover Your Cough or Sneeze</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_2.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#">June 6, 2019</a>
                <span class="mx-1">/</span>
                <a href="#">Health</a>, <a href="#">News</a>
              </div>
              <h3 class="post-heading"><a href="#">Always Cover Your Cough or Sneeze</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_3.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#">June 6, 2019</a>
                <span class="mx-1">/</span>
                <a href="#">Health</a>, <a href="#">News</a>
              </div>
              <h3 class="post-heading"><a href="#">Always Cover Your Cough or Sneeze</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>

        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_4.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#">June 6, 2019</a>
                <span class="mx-1">/</span>
                <a href="#">Health</a>, <a href="#">News</a>
              </div>
              <h3 class="post-heading"><a href="#">Always Cover Your Cough or Sneeze</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_5.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#">June 6, 2019</a>
                <span class="mx-1">/</span>
                <a href="#">Health</a>, <a href="#">News</a>
              </div>
              <h3 class="post-heading"><a href="#">Always Cover Your Cough or Sneeze</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
          <!-- BEGIN: .post-entry-big-22796 -->
          <div class="post-entry-big-22796">
            <a href="#" class="img-link"><img src="assets/frontend/images/img_6.jpg" alt="Image" class="img-fluid"></a>
            <div class="post-content">
              <div class="post-meta">
                <a href="#">June 6, 2019</a>
                <span class="mx-1">/</span>
                <a href="#">Test</a>, <a href="#">Test</a>
              </div>
              <h3 class="post-heading"><a href="#">Always Cover Your Cough or Sneeze</a></h3>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
          </div>
          <!-- END: .post-entry-big-22796 -->
        </div>

      </div>

      <div class="row">
        <div class="col-12 text-center">
          <ul class="pagination-76993">
              <?php
                $mark = $sudo->getBtMark();
                for ($i = 1; $i <= 4; $i++)
                {
                    echo "<li id='b$i'>";
                    if ($i == $mark)
                        echo "<span>$i</span>";
                    else
                    {
                        echo "<a href='#' onclick='$";
                        echo "sudo->setMark($i);'>$i</a>";
                    }
                        
                    echo "</li>";
                }
              ?>
          </ul>
        </div>


      </div>
    </div>
  </div>
  <!-- END: .site-section -->

</div>
<!-- END: #main -->