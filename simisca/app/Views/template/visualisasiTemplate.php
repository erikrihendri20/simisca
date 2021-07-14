<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootsrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- leaflet -->
    <?php if($active=='peta tematik') :?>
    <link rel="stylesheet" href="css/leaflet/leaflet.css">
    <?php endif; ?>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/bc6bf428b6.js" crossorigin="anonymous"></script>

    <!-- datatabel -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

    <!-- mycss -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/<?= $css; ?>">

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title><?= $title; ?></title>
    <!-- add icon link -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">

</head>

<body>
    <nav id="bg2" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('#portalvisualisasi') ?>"><img src="img/logo.png" width="30" height="30" class="d-inline-block align-top font-weigth-bold mr-2" alt="">SIMISCA BPS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link " href="<?= base_url() ?>/petaTematik">Peta Tematik <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>/visualisasi">Grafik</a>
                    <a class="nav-item nav-link active" href="<?= base_url() ?>/tabelDinamis">Tabel Dinamis</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-3">

        <i class="fas fa-home home mr-2"></i><i class="fas fa-long-arrow-alt-right panah">
            <div class="head"><?= $title; ?></div>
        </i>
    </div>


    <!-- content -->
    <?= $this->renderSection('content'); ?>


    <div class="foot">
        <footer>©2021 Praktik Kerja Lapangan Politeknik Statistika STIS T.A. 2020/2021</footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <?php if($active=='peta tematik') :?>
    <script src="js/leaflet/leaflet.js"></script>
    <script src="js/leaflet/leaflet.rotatedMarker.js"></script>
    <script src="js/leaflet/leaflet.pattern.js"></script>
    <script src="js/leaflet/leaflet-hash.js"></script>
    <script src="js/leaflet/Autolinker.min.js"></script>
    <script src="js/leaflet/rbush.min.js"></script>
    <script src="js/leaflet/labelgun.min.js"></script>
    <script src="js/leaflet/labels.js"></script>
    <script src="asset/leaflet/poligon.js"></script>
    <script src="asset/leaflet/point.js"></script>
    <?php endif; ?>

    <!-- bootsrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php if($active == 'get tabel' || $active == 'tabel dinamis') :?>
    <!-- datatabel -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <?php endif ?>

    <!-- chartjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <!-- myscript -->
    <!-- <?php if($active == 'visualisasi') :?>
        <?php for ($i=1; $i < 12; $i++) : ?>
            <script src="<?= base_url('js/grafik/'.$i.'.js'); ?>"></script>
        <?php endfor; ?>
    <?php endif; ?> -->
    <script src="<?= base_url() ?>/js/<?= $js; ?>"></script>

</body>

</html>