<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= $title; ?> SIMISCA BPS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <?php if($style=='index'): ?>
        <link rel="stylesheet" href="<?= base_url('css/dashboard/index.css'); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?= base_url('css/dashboard/index.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('css/dashboard/' . $style . '.css'); ?>">
    <?php endif; ?>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- font google-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard<span> SIMISCA BPS</span></h3>
                <div id="dismiss">
                    <i class="fas fa-arrow-left"></i>
                </div>
            </div>

            <center>
                <img src="<?= base_url('img/dashboard/pkl.png'); ?>" class="profile_image" alt="">
            </center>
            <a href="<?= base_url('dashboard'); ?>" class="<?= ($active=='dashboard') ? 'active' : ''; ?>"><i class="fas fa-home"></i><span>Halaman Utama</span></a>
            <a href="<?= base_url('dashboard/kuesioner'); ?>" class="<?= ($active=='kuesioner') ? 'active' : ''; ?>"><i class="fas fa-book-open"></i><span>SMKB Satker</span></a>
            <a href="<?= base_url('dashboard/monitoring'); ?>" class="<?= ($active=='monitoring') ? 'active' : ''; ?>"><i class="fas fa-desktop"></i><span>Monitoring SMKB</span></a>
            <a href="<?= base_url('dashboard/pengolahan'); ?>" class="<?= ($active=='pengolahan') ? 'active' : ''; ?>"><i class="fas fa-cogs"></i><span>Pengolahan SMKB</span></a>
            <a href="<?= base_url('dashboard/profil'); ?>" class="<?= ($active=='profil') ? 'active' : ''; ?>"><i class="fas fa-user"></i><span>Profil Anda</span></a>
            <a href="<?= base_url('dashboard/tentang'); ?>" class="<?= ($active=='tentang') ? 'active' : ''; ?>"><i class="fas fa-info-circle"></i><span>Tentang</span></a>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <div id="overlay"></div>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="nav navbar-nav navbar-right">
                        <a href="#"><span class="fas fa-bell"></span></a>
                        <a href="#"><span class="fas fa-sign-out-alt"></span></a>
                    </div>
                </div>
            </nav>

            <?= $this->renderSection('content'); ?>
        
        </div>



    </div>

    


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- index -->
    <?php if($script=='index'): ?>
        <script src="<?= base_url('js/dashboard/index.js'); ?>"></script>
    <?php else: ?>
        <script src="<?= base_url('js/dashboard/index.js'); ?>"></script>
        <script src="<?= base_url('js/dashboard/' . $script . '.js'); ?>"></script>
    <?php endif; ?>
    
    



</body>

</html>