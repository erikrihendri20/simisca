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
    <nav class="navbar nav-1 navbar-expand-lg shadow fixed-top animate__animated animate__slideInDown">
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
                    <a class="nav-item nav-link" href="#portalVisualisasi">Visualisasi</a>
                    <a class="nav-item nav-link" href="#kontak">Kontak</a>
                    <span class="line"></span>
                    <button class="nav-item nav-link login-btn" onclick="loginSSO()">Login</button>
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

    <!-- Portal Section (dihapus)-->

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
            <!-- Area Chart -->
            <div style="border-radius:20px !important;  overflow: hidden;"> <iframe id="myIframe" frameborder="0" style="height: 185px; overflow:scroll; width: 100%" src="leaflet/index.html" marginheight="1" marginwidth="1" name="cboxmain" id="cboxmain" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe> </div>
        </div>
    </div>
    </div>

    <!-- Portal Visualisasi (navbar dihapus) -->
    <div id="portalVisualisasi"></div>
    <div class="bg2">
        <h1 class="aos-init aos-animate" data-aos="fade-down">Judul</h1>
        <h3 class="aos-init aos-animate" data-aos="fade-up">Sub Judul</h3>
        <p class="desc aos-init aos-animate" data-aos="fade-down">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus expedita autem eveniet magnam veritatis asperiores amet ipsa, inventore aperiam praesentium?</p>
        <div class="container aos-init aos-animate" data-aos="zoom-in">
            <div class="row justify-content-center">
                <div class="col-sm-2 bar1">
                    <a class="bar1" href="<?= base_url() ?>/petaTematik"> Peta Tematik</a>
                </div>
                <div class="col-sm-2 bar2">
                    <a class="bar2" href="<?= base_url() ?>/visualisasi">Visualisasi</a>
                </div>
                <div class="col-sm-2 bar3">
                    <a class="bar3" href="<?= base_url() ?>/tabelDinamis">Tabel Dinamis</a>
                </div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel carousel-pv slide aos-init aos-animate" data-aos="zoom-in" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/map.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Peta Tematik</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veniam, aut quo provident quasi modi similique inventore praesentium ex explicabo!</p>
                        <a class="btn btn-danger" href="<?= base_url(); ?>/petatematik">Selengkapnya</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/visual.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Visualisasi</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veniam, aut quo provident quasi modi similique inventore praesentium ex explicabo!</p>
                        <a class="btn btn-danger" href="<?= base_url(); ?>/visualisasi">Selengkapnya</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/tabel.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tabel Dinamis</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veniam, aut quo provident quasi modi similique inventore praesentium ex explicabo!</p>
                        <a class="btn btn-danger" href="<?= base_url(); ?>/tabeldinamis">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
    <script>
        // Selecting the iframe element
        var iframe = document.getElementById("myIframe");

        // Adjusting the iframe height onload event
        iframe.onload = function() {
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</body>

</html>