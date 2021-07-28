<?= $this->extend('template/visualisasiTemplate'); ?>

<?= $this->section('content'); ?>


<div class="container formulir">
  <h3>Tabel Dinamis</h3>
  <form class="col-md-12">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="subjek">Subjek</label>
        <select class="form-control" id="subjek">
          <option id="opsi-satker" value=1>Satuan Kerja</option>
          <option id="opsi-pegawai" value=2>Pegawai</option>
        </select>
      </div>
    </div>

    <div class="filter form-row" id="filter-satker">
      <div class="form-group col-md-12">
        <label for="indeks">Indeks</label>
        <select class="form-control" id="indeks-satker">
          <option value="kebakaran">Kebakaran</option>
          <option value="covid 19">Covid 19</option>
          <option value="gempa dan tsunami">Gempa dan Tsunami</option>
          <option value="gunung api">Gunung Berapi</option>
          <option value="dataran tinggi">Dataran Tinggi</option>
          <option value="banjir">Banjir</option>
        </select>
      </div>

      <div class="form-group col-md-12">
        <label for="tahun">Tahun</label>
        <select class="form-control" id="tahunsatker">
          <option>2021</option>
          <option>2022</option>
        </select>
      </div>
    </div>

    <div class="form-row filter" id="filter-pegawai">
      <div class="form-group col-md-12">
        <label for="indeks">Indeks</label>
        <select class="form-control" id="indeks-pegawai">
          <option value="gempa dan tsunami">Gempa dan Tsunami</option>
          <option value="gunung api">Gunung Berapi</option>
          <option value="dataran tinggi">Dataran Tinggi</option>
          <option value="banjir">Banjir</option>
        </select>
      </div>
    </div>

  </form>
</div>

<div class="container mt-3">
  <div class="" id="tabeldinamis">
    <!-- <table id="table">
      <thead id="head-table">
        <tr><th></th></tr>
      </thead>
      <tbody id="body-table">
        <tr><td></td></tr>
      </tbody>
    </table> -->
  </div>
</div>


<?= $this->endSection(); ?>