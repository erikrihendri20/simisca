<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
<div class="menu-content">
    <h2>Survey SMKB</h2>
    <div class="card">
        <div class="card-body text-dark">
            <h3>Import Struktur Survay</h3>
            <p>Untuk dapat menjalankan survey SMKB langkah pertama adalah dengan cara mengimport struktur survey</p>
            <button id="import-survey" class="btn btn-dark">Import Struktur Survey</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-dark">
            <h3>Import Partisipan</h3>
            <p>Setelah struktur survey dibuat, langkah selanjutnya adalah menambahkan partisipan yang nantinya akan melakukan pengisian survey, jumlah partisipan yang akan mengisi survey adalah 517 satker diantaranya : </p>
            <ul>
                <li>BPS Pusat RI</li>
                <li>BPS Provinsi</li>
                <li>BPS Kabupaten</li>
                <li>Pusdiklat BPS</li>
                <li>Polstat STIS</li>
            </ul>
            <p>Setelah semua partisipan SMKB ditambahkan, kemudia akan dibuat token yang nantinya akan digunakan oleh partisipan untuk mengakses halaman survey</p>
            <button id="import-partisipan" class="btn btn-dark">Import Partisipan</button>
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
    <div class="card">
        <div class="card-body text-dark">
            <h3>Hapus Survey</h3>
            <p>Langkah terakhir adalah menghapus jawaban dan menghapus struktur survey</p>
            <button id="delete-survey" class="btn btn-dark">Hapus Survey</button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>