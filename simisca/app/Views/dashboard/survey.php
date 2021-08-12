<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
<div class="menu-content">
    <h2>Survey SMKB</h2>
    <div class="card">
        <div class="card-body text-dark">
            <h3>Struktur Survay </h3>
            <p style="display: inline;">status : </p>
            <a href="#">
                <i id="status-ban-import" class="fas fa-ban" style="display: none;"></i>
                <i id="status-ok-import" class="fas fa-check-circle" style="display: none;"></i>
            </a>
            <p id="keterangan-ban-import" style="display: none;">Untuk dapat menjalankan survey SMKB langkah pertama adalah dengan cara membuat struktur survey</p>
            <p id="keterangan-ok-import" style="display: none;">Survey sedang berjalan, jika anda yakin responden sudah melakukan pengisian survey, anda dapat menghentikan survey ini</p>
            <button id="import-survey" class="btn btn-dark" style="display: none;">Buat Struktur Survey</button>
            <button id="delete-survey" class="btn btn-dark" style="display: none;">Hentikan Survey</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-dark">
            <h3>Buat Partisipan</h3>
            <p>Setelah struktur survey dibuat, langkah selanjutnya adalah menambahkan partisipan yang nantinya akan melakukan pengisian survey, jumlah partisipan yang akan mengisi survey adalah 517 satker diantaranya : </p>
            <ul>
                <li>BPS Pusat RI</li>
                <li>BPS Provinsi</li>
                <li>BPS Kabupaten</li>
                <li>Pusdiklat BPS</li>
                <li>Polstat STIS</li>
            </ul>
            <p>Setelah semua partisipan SMKB ditambahkan, kemudia akan dibuat token yang nantinya akan digunakan oleh partisipan untuk mengakses halaman survey</p>
            <p>username : riset3</p>
            <p>password : riset3</p>
            <p id="partisipan">Jumlah partisipan sekarang : <span id="jumlah-partisipan" class="font-weight-bold">0</span> satker</p>
            <button id="import-partisipan" class="btn btn-dark">Buat Partisipan</button>
            <a href="<?= base_url('/limesurvey/admin'); ?>" class="btn btn-dark text-light">Atur Partisipan</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-dark">
            <h3>Pengolahan SMKB</h3>
            <p>Setelah survey selesai, proses selanjutnya adalah proses pengolahan data SMKB, pertama download jawaban responden terlebih dahulu</p>
            <button id="export-response" class="btn btn-dark">Download Data</button>
            <p>download daftar satker untuk melengkapi jawaban</p>
            <button id="download-daftar-satker" class="btn btn-dark">Download Daftar Satker</button>
            <p>download Script pengolahan R untuk melakukan pengolahan</p>
            <button id="download-rscript" class="btn btn-dark">Download Script Pengolahan</button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>