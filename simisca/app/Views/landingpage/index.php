<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/363b8c1c23.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= base_url(); ?>/css/landingPage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>SIMISCA BPS</title>
</head>

<body data-aos-duration="1000" data-aos-delay="0">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg shadow fixed-top animate__animated animate__slideInDown">
        <div class="container-fluid animate__animated animate__fadeIn animate__delay-1s ">
            <a class="navbar-brand font-weight-bold" href="#">
                <img src="img/pkl.png" width="30" height="30" class="d-inline-block align-top font-weigth-bold" alt=""> SIMISCA BPS
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="#tentang">Tentang</a>
                    <a class="nav-item nav-link" href="#statistik">Statistik</a>
                    <a class="nav-item nav-link" href="#kontak">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <div class="jumbotron shadow-lg jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4 font-weight-bold animate__animated animate__zoomIn">SIMISCA BPS</h1>
            <p class="lead">Sistem Informasi Mitigasi dan Kesiapsiagaan BPS memuat informasi indeks mitigasi dan kesiapsiagaan seluruh kantor BPS seluruh Indonesia. Sistem ini dibuat oleh Politeknik Statistika STIS Angkatan 60 dalam rangka Praktik Kerja Lapangan T.A.
                2020/2021
            </p>
        </div>
    </div>

    <!-- Portal Section -->
    <div>
        <div class="btn-toolbar font-weight-bold justify-content-center animate__animated animate__headShake animate__delay-1s" role="toolbar">
            <a onclick="loginSSO()" class="btn btn-lg shadow-lg class-1">
                Portal<br><span class="font-weight-bold">Dashboard</span>
            </a>
            <a href="<?= base_url(); ?>/portalvisualisasi" class="btn btn-lg shadow-lg class-2">
                Portal<br><span class="font-weight-bold">Visualisasi</span>
            </a>
        </div>
    </div>

    <!-- Penjelasan Section -->
    <div class="konten-1" id="tentang">
        <div class="container py-5">
            <h3 class="py-4 font-weight-bold" data-aos="fade-down">Tentang SIMISCA</h3>
            <div class="row justify-content-sm-center">
                <div class="col-sm-5 order-1 order-sm-2">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" data-aos="fade-left">
                            <div class="carousel-item active">
                                <img src="img/bencana1.jpg" class="d-block w-100 rounded float-left" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/bencana2.jpeg" class="d-block w-100 rounded float-left" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/bencana3.jpeg" class="d-block w-100 rounded float-left" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/bencana4.jpg" class="d-block w-100 rounded float-left" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/bencana5.jpeg" class="d-block w-100 rounded float-left" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 pt-2 order-2 order-sm-1 content">
                    <p class="font-weight-lighter tentang" data-aos="fade-right">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="batas">
        <div class="custom-shape-divider-bottom-1608571675">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <!-- Statistik Section -->
    <div class="konten-2" id="statistik">
        <div class="container py-5">
            <p class="py-3 font-weight-bold" data-aos="fade-down">Statistik Geografis Satuan Kerja BPS Indonesia</p>
            <div class="row justify-content-center">
                <!-- Area Chart -->
                <div id="map" class="col-10 mb-4">
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer class="footer shadow-lg" id="kontak">
        <div class="row m-0 justify-content-center">
            <div class="col-sm">
                <p class="info">Informasi Umum</p>
                <div class="logo">
                    <a href="https://bps.go.id" target="_blank"><img src="img/bps.png"></a>
                    <a href="https://stis.ac.id" target="_blank"><img src="img/stis.png"></a>
                    <a href="https://pkl.stis.ac.id/" target="_blank"><img src="img/pkl.png"></a>
                </div>
            </div>
            <div class="col-sm-4 col-xl-4">
                <p class="info">Kontak Kami</p>
                <ul class="text-left">
                    <li class="mb-3 d-flex">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="ml-3">
                            <span>
                                Politeknik Statistika STIS
                                (POLSTAT STIS)<br>
                                Jl. Otto Iskandardinata No.64C <br>
                                Jakarta 13330</span>
                        </div>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-phone-alt"></i>
                        <div class="ml-3">
                            <span>(021) 8191437, 8508812</span>
                        </div>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-envelope"></i>
                        <div class="ml-3">
                            <span>simisca@stis.ac.id</span>
                        </div>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fab fa-instagram"></i>
                        <div class="ml-3">
                            <span>kolasepkl60</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <p class="info">Kritik & Saran</p>
                <div class="form form-row justify-content-center">
                    <div class="col-8">
                        <input type="email" class="form-control mb-2" placeholder="Email Address" name="email" required="">
                    </div>
                    <div class="col-8">
                        <textarea type="text" class="form-control mb-2" id="crit" maxrow="100" placeholder="Kritik dan saran maks. 100 kata" name="pesan" maxlength="100"></textarea>
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn submit btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
        <p class="credit py-1">
            © 2021 SIMISCA PKL POLSTAT STIS T.A. 2020/2021
        </p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        function loginSSO() {
            var win = window.open("auth/bps", "_blank", true);
            var timer = setInterval(function() {
                if (win.closed) {
                    clearInterval(timer);
                    location.replace("dashboard");
                }
            }, 1000);
        }
    </script>
</body>

</html>