<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SimpleOne - A Responsive Html5 Ecommerce Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('description')">
  <meta name="author" content="@yield('author')">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
  <link href={!! url('user/css/bootstrap.css') !!} rel="stylesheet">
  <link href={!! url('user/css/bootstrap-responsive.css') !!} rel="stylesheet">
  <link href={!! url('user/css/style.css') !!} rel="stylesheet">
  <link href={!! url('user/css/flexslider.css') !!} type="text/css" media="screen" rel="stylesheet"  />
  <link href={!! url('user/css/jquery.fancybox.css') !!} rel="stylesheet">
  <link href={!! url('user/css/cloud-zoom.css') !!} rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <!-- fav -->
  <link rel="shortcut icon" href={!! asset('favicon.ico') !!}>
</head>
<body>
  <!-- Header Start -->
  <header>
    <!-- headerstrip -->
    @include('user.blocks.header')

    <div class="container">

      <!-- categorymenu -->
      @include('user.blocks.nav')

    </div>
  </header>
  <!-- Header End -->

  <div id="maincontainer">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer id="footer">
    <section class="footersocial">
      <div class="container">
        <div class="row">
          <div class="span3 aboutus">
            <h2>About Us </h2>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
              <br>
              t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            </p>
          </div>
          <div class="span3 contact">
            <h2>Contact Us </h2>
            <ul>
              <li class="phone"> +123 456 7890, +123 456 7890</li>
              <li class="mobile"> +123 456 7890, +123 456 78900</li>
              <li class="email"> test@test.com</li>
              <li class="email"> test@test.com</li>
            </ul>
          </div>
          <div class="span3 twitter">
            <h2>Twitter </h2>
            <div id="twitter">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="footerlinks">
      <div class="container">
        <div class="info">
          <ul>
            <li><a href="#">Privacy Policy</a>
            </li>
            <li><a href="#">Terms &amp; Conditions</a>
            </li>
            <li><a href="#">Affiliates</a>
            </li>
            <li><a href="#">Newsletter</a>
            </li>
          </ul>
        </div>
        <div id="footersocial">
          <a href="#" title="Facebook" class="facebook">Facebook</a>
          <a href="#" title="Twitter" class="twitter">Twitter</a>
          <a href="#" title="Linkedin" class="linkedin">Linkedin</a>
          <a href="#" title="rss" class="rss">rss</a>
          <a href="#" title="Googleplus" class="googleplus">Googleplus</a>
          <a href="#" title="Skype" class="skype">Skype</a>
          <a href="#" title="Flickr" class="flickr">Flickr</a>
        </div>
      </div>
    </section>
    <section class="copyrightbottom">
      <div class="container">
        <div class="row">
          <div class="span6"> All images are copyright to their owners. </div>
          <div class="span6 textright"> ShopSimple @ 2012 </div>
        </div>
      </div>
    </section>
    <a id="gotop" href="http://www.mafiashare.net">Back to top</a>
  </footer>
  <!-- javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src={!! url('user/js/jquery.js') !!}></script>
  <script src={!! url('user/js/bootstrap.js') !!}></script>
  <script src={!! url('user/js/respond.min.js') !!}></script>
  <script src={!! url('user/js/application.js') !!}></script>
  <script src={!! url('user/js/bootstrap-tooltip.js') !!}></script>
  <script defer src={!! url('user/js/jquery.fancybox.js') !!}></script>
  <script defer src={!! url('user/js/jquery.flexslider.js') !!}></script>
  <script type="text/javascript" src={!! url('user/js/jquery.tweet.js') !!}></script>
  <script  src={!! url('user/js/cloud-zoom.1.0.2.js') !!}></script>
  <script  type="text/javascript" src={!! url('user/js/jquery.validate.js') !!}></script>
  <script type="text/javascript"  src={!! url('user/js/jquery.carouFredSel-6.1.0-packed.js') !!}></script>
  <script type="text/javascript"  src={!! url('user/js/jquery.mousewheel.min.js') !!}></script>
  <script type="text/javascript"  src={!! url('user/js/jquery.touchSwipe.min.js') !!}></script>
  <script type="text/javascript"  src={!! url('user/js/jquery.ba-throttle-debounce.min.js') !!}></script>
  <script defer src={!! url('user/js/custom.js') !!}></script>
  <script src={!! url('user/js/myscript.js') !!}></script>
</body>
</html>
