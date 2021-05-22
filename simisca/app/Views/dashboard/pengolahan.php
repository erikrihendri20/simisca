<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Dashboard<span> SIMISCA BPS</span></h3>
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>
        </div>

        <center>
            <img src="pkl.png" class="profile_image" alt="">
        </center>
        <a href="main.html"><i class="fas fa-home"></i><span>Halaman Utama</span></a>
        <a href="kuesioner.html"><i class="fas fa-book-open"></i><span>SMKB Satker</span></a>
        <a href="monitoring.html"><i class="fas fa-desktop"></i><span>Monitoring SMKB</span></a>
        <a href="pengolahan.html" class="active"><i class="fas fa-cogs"></i><span>Pengolahan SMKB</span></a>
        <a href="profil.html"><i class="fas fa-user"></i><span>Profil Anda</span></a>
        <a href="tentang.html"><i class="fas fa-info-circle"></i><span>Tentang</span></a>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">
        <div id="overlay">
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
        </div>
        <div class="menu-content">
            <h2>Pengolahan Data</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <ol>
                <li>Apa</li>
                <li>Apa</li>
                <li>Apa</li>
            </ol>

            <div class="line">
                <div class="card">
                    <h3>Unduh data hasil kuesioner</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="cardp"><button class="btn btn-primary"><span class="fa fa-download"></span> <b>Unduh di sini</b></button></p>
                </div>
                <div class="card">
                    <h3>Proses Pengolahan IMKB Satker</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="selengkapnya"><a href="#">selengkapnya</a></p>
                    <p class="cardp"><button class="btn btn-primary"><span class="fa fa-download"></span><b> Unduh R Code</b></button></p>
                </div>
                <div class="card">
                    <h3>Upload Hasil Pengolahan IMKB Satker</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="cardp"><button class="btn btn-primary"><span class="fa fa-upload"></span> <b> Unggah Hasil</b></button></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $(this).toggleClass('active');
        });
        $('#dismiss').on('click', function() {
            $('#sidebar').removeClass('active');
            $('#overlay').removeClass('active');
            $('#sidebarCollapse').removeClass('active');
        });
    });
</script>
<?= $this->endSection(); ?>