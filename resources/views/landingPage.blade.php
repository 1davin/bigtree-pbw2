
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Liburin</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
   <!-- {{asset('style/')}} -->
  <link href="{{asset('style/assets/img/favicon.png') }}" >
  <link href="{{asset('style/')}}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="{{asset('style/https://fonts.googleapis.com')}}"  rel="preconnect">
  <link href="{{asset('style/https://fonts.gstatic.com')}}" rel="preconnect" crossorigin>
  <link href="{{asset('style/https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('style/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('style/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('style/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('style/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('style/vassets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('style/assets/css/main.css')}}" rel="stylesheet">

</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="sitename">
          <!-- Tambahkan height: auto untuk menjaga rasio aspek -->
          <!-- <img src="/img/logoLiburinOmbak.png" alt="Logo" style="width: 100px; height: auto;"> -->
        </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#team">About</a></li>
          <li><a href="#aboutPage">Sign Up</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
     <!-- dark-background -->
    <section id="hero" class="hero section dark-background ">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active bg-dark">
          <img src="\img\bromo.jpeg" alt="">
          <div class="carousel-container">
            <h1 class="text-info text-uppercase fw-semibold display-1">LIBURIN<br></h1>
            <p>Liburan di <span class="text-info ">liburin</span> bingung mau liburan dimana?pake liburin aja,liburin hadir untuk membantu anda meningkatkan kenyamanan dalam liburan,nikmati liburan tanpa ribet memikirkan pemesanan tiket</p>
            <div class="d-flex p-2">
              <a href="#about" class="btn-get-started">Login</a>
              <a href="#about" class="btn-get-started">Sign Up</a>
            </div>
            
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="\img\labuan_bajo3.jpg" alt="">
          <div class="carousel-container">
          <h1 class="text-info ext-uppercase fw-semibold display-1 ">LIBURIN<br></h1>
            <p><span class="text-info ">liburin</span> hadir untuk memudahkan anda memilih tujuan wisata anda,memudahkan pemesanan tiket,
             mau liburan sekaligus ke beberapa banya tempat?liburin juga mempunyai fitur open trip yang memudahka anda memilih tujuan wisata sekaligus ke beberapa tempat</p>
            <a href="#about" class="btn-get-started">About Us</a>
          </div>
        </div><!-- End Carousel Item -->


        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5 position-relative" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>

          <div class="col-lg-7 content ps-lg-4" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-info ">Apa itu Liburin?</h3>
            <p>
               Liburin adalah aplikasi pemesanan tiket wisata berbasis web,liburin bertujuan untuk memudahkan pengguna dalam memilih  tujuan wisata serta pemesanan tiket wisata.Liburin menawarkan beberapa fitur yaitu:
            </p>
            <ul>
              <li>
              <i class="bi bi-cash"></i>
                <div>
                  <h5>Booking ticket onlinet</h5>
                  <p>Liburin memiliki fitur pemesanan tiket wisata online bertujuan untuk memudahkan pengguna dalam memesan tiket wisata tujuan</p>
                </div>
              </li>
              <li>
              <i class="bi bi-credit-card"></i>
                <div>
                  <h5>Online Payment</h5>
                  <p>Liburin memiliki fitur pembayaran online agar memudahkan pengguna untuk melakukan pembayaran wisata tujuan</p>
                </div>
              </li>
              <li>
              <i class="bi bi-luggage"></i>
                <div>
                  <h5>Open Trip</h5>
                  <p>Liburin mempunyai fitur open trip yang ditawarkan ke pengguna untuk memudahkan pengguna yang mau berwisata bersama banyak orang ataupun ke banyak tempat</p>
                </div>
              </li>
            </ul>
            
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- <x-team /> --
     <div id="team">
       <x-about />

     </div>
     <x-contact />
    
  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Hidayah</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Hidayah</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('style/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('style/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('style/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('style/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('style/assets/js/main.js')}}"></script>

</body>

</html>