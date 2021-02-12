<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/<?= $css; ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bc6bf428b6.js" crossorigin="anonymous"></script>
    <title>SIMISCA</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h2 class="font-weigth-bold">PORTAL VISUALISASI</h2>
            <h1 class="display-4 font-weight-bold">SIMISCA BPS</h1>
            <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, dolorum inventore. Quae repellendus error accusantium dicta delectus ipsum earum repellat blanditiis quos, inventore enim ratione labore corporis exercitationem incidunt voluptatibus!</p>
            <a href="#bg2" class="far fa-arrow-alt-circle-down"></a>
        </div>
    </div>
    <div class="custom-shape-divider-top-1608744525">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V6c0,21.6,291,111.46,741,110.26,445.39,3.6,459-88.3,459-110.26V0Z" class="shape-fill"></path>
        </svg>
    </div>
    <nav id="bg2" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">VISUALISASI<br>SIMISCA BPS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link " href="<?= base_url() ?>/petaTematik">Peta Tematik <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>/visualisasi">Visualisasi</a>
                    <a class="nav-item nav-link active" href="<?= base_url() ?>/tabelDinamis">Tabel Dinamis</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="bg2">
        <h1>Judul</h1>
        <h3>Sub Judul</h3>
        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus expedita autem eveniet magnam veritatis asperiores amet ipsa, inventore aperiam praesentium?</p>
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-sm-3 bar1">
                    Peta Tematik
                </div>
                <div class="col-sm-3 bar2">
                    Visualisasi
                </div>
                <div class="col-sm-3 bar3">
                    Tabel Dinamis
                </div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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

    <footer class="footer shadow-lg">
        <div class="row m-0 justify-content-center">
            <div class="col-lg">
                <p class="info">Informasi Umum</p>
                <div class="logo">
                    <a href="https://bps.go.id" target="_blank"><img src="img/bps.png"></a>
                    <a href="https://stis.ac.id" target="_blank"><img src="img/stis.png"></a>
                    <a href="https://pkl.stis.ac.id/" target="_blank"><img src="img/pkl.png"></a>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
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
            <div class="col-lg-4">
                <p class="info">Kritik & Saran</p>
                <div class="form form-row justify-content-center">
                    <div class="col-8">
                        <input type="email" class="form-control mb-2" placeholder="Email Address" name="email" required="">
                    </div>
                    <div class="col-8">
                        <textarea type="text" class="form-control mb-2" id="crit" maxrow="100" placeholder="Kritik dan saran maks. 100 kata" name="pesan" maxlength="100"></textarea>
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn submit btn-primary" style="border: none">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
        <p class="credit">
            © 2021 SIMISCA PKL POLSTAT STIS T.A. 2020/2021
        </p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>