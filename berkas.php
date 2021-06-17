<?php
include("./admin/model/class_client.php");

$berkas = new Client();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>DPMG KOTA LANGSA - Berkas</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <style>
          .btn{
              color:#fff;
              text-decoration:none;
          }

          .btn-success{
              background:green;
          }
      </style>
</head>
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Berkas</a>
                        <!--<a class="nav-item nav-link" href="#">Abouts</a>-->
                        <a class="nav-item nav-link" href="./admin/">Login</a>
                      </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="images/1.jpeg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>DPMG</h1>
                            <span>KOTA LANGSA</span>

                            <p>"Terwujudnya Masyarakat yang Aman, Damai, Bermartabat,<br> Maju, Sejahtera, dan Islami"</p>
                            

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="images/1.jpeg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>DPMG</h1>
                            <span>KOTA LANGSA</span>

                            <p>"Terwujudnya Masyarakat yang Aman, Damai, Bermartabat,<br> Maju, Sejahtera, dan Islami"</p>
                            

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="images/1.jpeg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                          <h1>DPMG</h1>
                          <span>KOTA LANGSA</span>
                          <p>"Terwujudnya Masyarakat yang Aman, Damai, Bermartabat,<br> Maju, Sejahtera, dan Islami"</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>
    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="fl-index/img/intro.jpg" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-lower">Data Berkas </span>
            </h2><hr>
            <p> Mari kita bersama-sama membangun Kota Langsa menjadi lebih baik dengan dimulai membangun masyarakat yang maju dan modern.</p>
            <hr><br>

            <table class="table table-bordered " id="data-table">
                <thead>
                    <tr>
                        <th width="7%">No</th>
                        <th>Nama Berkas</th>
                        <th>Jenis Berkas</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    $data_berkas = $berkas->get_all_berkas();
                    if(!empty($data_berkas)){
                        foreach($data_berkas as $data){
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama_berkas'] ?></td>
                        <td><?= $berkas->get_jenis_berkas_desc($data['jenis_berkas']) ?></td>
                        <td><a href="./admin/uploads/<?= $data['berkas']?>" class="btn btn-success" target="_blank">Preview</a></td>
                    </tr>
                <?php } } ?>    
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <footer>
        <div class="footer top_layer ">
            <div class="container">

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <a href="index.html"> <img src="images/logo.png" alt="logo" /></a>
                            <p>"Terwujudnya Masyarakat yang Aman, Damai, Bermartabat, Maju, Sejahtera, dan Islami"</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Quick links</h3>
                            <ul class="Links_footer">
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Home</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Berkas</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="admin/login/login.php">Login</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Saran</h3>
                            <p>Isi dibawah ini dan berilah saran untuk kami </p>
                             <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                            <button class="submit-btn">Send</button>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Contact Us</h3>

                            <ul class="loca">
                                <li>
                                    <a href="#"><img src="icon/loc.png" alt="#" /></a>Kota Langsa
                                    <br>Indonesia </li>
                                <li>
                                    <a href="#"><img src="icon/email.png" alt="#" /></a>DPMG@gmail.com </li>
                                <li>
                                    <a href="#"><img src="icon/call.png" alt="#" /></a>+62822-7741-1200 </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="copyright">
            <div class="container">
                <p>© 2021 <a href="https://www.instagram.com/iamnasaaa_/"> Nasa Putri Madinah</a></p>
           
        </div>
        </div>
    </footr>

    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
    <script>
        // This example adds a marker to indicate the position of Bondi Beach in Sydney,
        // Australia.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {
                    lat: 40.645037,
                    lng: -73.880224
                },
            });

            var image = 'images/maps-and-flags.png';
            var beachMarker = new google.maps.Marker({
                position: {
                    lat: 40.645037,
                    lng: -73.880224
                },
                map: map,
                icon: image
            });
        }
    </script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->
</body>

</html>