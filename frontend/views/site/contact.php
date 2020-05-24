<header id="site-header" class="position-relative">

  <!-- Add '.navbar_dark' class if you want the color of the text to -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

      <!-- BEGIN: .navbar-brand -->
      <a class="navbar-brand" href="index.html">
      <img src="assets/frontend/images/logo_light.png" alt="Covid" id="logo_light">
      <img src="assets/frontend/images/logo_dark.png" alt="Covid" id="logo_dark">
      </a>
      <!-- END: .navbar-brand -->

      <!-- BEGIN: .navbar-toggler -->
      <a href="#" class="burger-toggle-menu js-burger-toggle-menu ml-auto py-4" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </a>
      <!-- END: .navbar-toggler -->

      <!-- BEGIN: #main-nav -->
      <div class="collapse navbar-collapse" id="main-nav">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prevention.html">Prevention</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="symptoms.html">Symptoms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="community.html">Community</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="news.html">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>

      </div>
      <!-- END: #main-nav -->

    </div>
  </nav>
</header>
<!-- END: #site-header -->

<!-- BEGIN: .cover -->
<div class="page-heading-85912" style="background-image: url('assets/frontend/images/hero_bg_3.jpg')">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-7">
        <h1 class="mb-0 heading text-white">Contact</h1>
        <p class="mb-0 text-white">A small river named Duden flows by their place and supplies it with the necessary regelialia. </p>
      </div>
    </div>
  </div>
</div>

<div class="custom-breadcrumns-23195 border-bottom">
  <div class="container">
    <a href="index.html">Home</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Contact Us</span>
  </div>
</div>
<!-- END: .cover -->


<!-- BEGIN: #main -->
<div id="main">
  <!-- BEGIN: .site-section -->
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="section-heading line-primary">Drop us a line</h3>
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-lg-6 mb-4 mb-lg-0">    
          <form action="#" id="contactForm">
            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject">
            </div>
            <div class="form-group">
              <label for="message">Message <span class="text-danger">*</span></label>
              <textarea class="form-control" name="message" id="message" cols="30" rows="7"></textarea>
            </div>
            <div class="form-group mb-0">
              <input type="submit" class="btn btn-primary" value="Send Message">
              <span class="submitting"></span>
            </div>
          </form>
          <div id="form-message-warning" class="mt-4"></div> 
          <div id="form-message-success">
            Your message was sent, thank you!
          </div>

        </div>

        <div class="col-lg-6 pl-lg-5">
          <!-- BEGIN: .quick-contact-info-91921 -->
          <div class="quick-contact-info-91921 mb-5">

            <h3 class="section-heading heading-xs mb-4 line-primary">Quick Info</h3>

            <ul class="list-unstyled">
              <li class="d-flex w-100">
                <div class="wrap-icon">
                  <span class="icon-room"></span>
                </div>
                <div>
                  <span class="d-block">Location:</span> 
                  <strong>273 South Rd. New York, NY 10011</strong>
                </div>
              </li>

              <li class="d-flex w-100">
                <div class="wrap-icon">
                  <span class="icon-phone"></span>
                </div>
                <div>
                  <span class="d-block">Call Us:</span> 
                  <a href="tel://01123456214">+01 123 456 214</a>
                </div>
              </li>

              <li class="d-flex w-100">
                <div class="wrap-icon">
                  <span class="icon-envelope"></span>
                </div>
                <div>
                  <span class="d-block">Email Us:</span> 
                  <a href="mailto:email@mydomain.com">email@mydomain.com</a>
                </div>
              </li>

            </ul>
          </div>
          <!-- END: .quick-contact-info-91921 -->

          <div class="d-block mb-5">
            <h3 class="section-heading heading-xs mb-4 line-primary">Opening Hours</h3>
            <p>
              MON &mdash; FRI <br>
              8AM &mdash; 5PM
            </p>
            
          </div>
          
          <!-- END: .social-wrap -->
          <div class="d-block social-wrap">
            <h3 class="section-heading heading-xs mb-4 line-primary">Follow Us</h3>
            <ul class="list-unstyled d-flex social-29021 primary">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <!-- END: .social-wrap -->

        </div>    
      </div>
    </div>
  </div>
  <!-- END: .site-section -->
</div>
<!-- END: #main -->
