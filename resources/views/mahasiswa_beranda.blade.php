<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UNAMA SIAKAD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('anyar') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/owl.carousel/asset/css/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('anyar') }}/assets/css/style.css" rel="stylesheet">
  <link href="{{ asset('font') }}/css/all.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Anyar - v4.3.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="pmb@unama.ac.id">pmb@unama.ac.id</a>
        <i class="bi bi-phone-fill phone-icon"></i> 081208128
      </div>
      <div class="cta d-none d-md-block">
        <a href="#about" class="scrollto">Get Started</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">UNAMA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      @include('menu_utama')<!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section style="height:30vh" id="hero" class="d-flex justify-cntent-center align-items-center">
   
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section style="margin-top:50px;" id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Selamat Datang, {{ \Auth::guard('mahasiswa')->user()->name }}</h2>
          <p>SILAHKAN LENGKAPI BERKAS DIBAWAH !</p>
        </div>
        <div class="card-body">
            @if (Session::has('pesan'))
            <div class="alert alert-info" role="alert">
                {{ \Session::get('pesan') }}
            </div>
           @endif
           

           <table class="table table-sm bg-white">
               <tbody>
                   <tr>
                       <td rowspan="4" width="100"><img src="{{ \Storage::url (Auth::guard('mahasiswa')->user()->foto) }}" width="100"></td>
                       <td width="18%" align="left">Nama</td>
                    <td align="left">{{ Auth::guard('mahasiswa')->user()->name }}</td>
                   </tr>
                   <tr>
                    <td  align="left">Jenis Kelamin</td>
                 <td align="left">{{ Auth::guard('mahasiswa')->user()->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td  align="left">Tanggal lahir</td>
                 <td align="left">{{ Auth::guard('mahasiswa')->user()->tanggal_lahir }}</td>
                </tr> 
                <tr>
                    <td  align="left">Email</td>
                 <td align="left">{{ Auth::guard('mahasiswa')->user()->email }}</td>
                </tr>
                <tr>
                    <td  align="left">Jurusan</td>
                 <td align="left">: {{ $registrasi->jurusan->nama }}</td>
                </tr>
                
               </tbody>
           </table>
<table class="table table-hover">
    <tbody>
        <tr class="bg-dark text-white">
            <td width="8%">No</td>
            <td>Nama Dokumen</td>
            <td>download</td>
            <td>Status</td>
            <td>Aksi</td>
            
        </tr>
    </tbody>
    <tbody>
      @foreach ( $registrasi ->syarat as $item )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td>
            <a href="{{ \Storage::url($item->file) }}" target="blank"><i class="fa fa-download">Download File</i></a>
          </td>
          <td><i class="fa fa-flag"></i>
            {{ $item->status }}</td>
            <td><a onclick="return confirm('Yakin?')" href="{{ url('mahasiswa/hapus-syarat',[$item->id] ) }}">
              <i class="fa fa-remove"></i>Hapus File</a></td>
           
                  </tr>
      @endforeach
    </tbody>
</table>
<hr>
<h2>Input Syarat Pendaftaran MABA </h2>
{!! Form::model($objek,  ['action' => $action, 'method' => $method, 'files' => true]) !!}
           <div class="form-group">
            <label for="name">Nama Lengkap</label>
            {!! Form::select('nama', [
                'ktp' => 'Fotocopy KTP',
                'ijazah' => 'Fotocopy Ijazah',
        'surat keterangan sehat' =>'Fotocopy Surat Keterangan Sehat'], 
        null, ['class' => 'form-control']) !!}
            <span class="text-helper">{{$errors->first('name') }}</span>

        </div>

        <div class="form-group">
            <label for="file">File</label>
            {!! Form::file('file', ['class'=>'foem-control']) !!}
            <span class="text-helper">{{$errors->first('file') }}</span>

        </div>
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About UNAMA</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>UNAMA</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        Login Admin <a href="{{ url ('login')}}">Login</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('anyar') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('anyar') }}/assets/js/main.js"></script>

</body>

</html>