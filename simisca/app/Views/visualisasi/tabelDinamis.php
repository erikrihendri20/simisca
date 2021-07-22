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
        <label for="wilayah">Wilayah</label>
        <select class="form-control" id="wilayahsatker">
          <option value="0" class="defaultwilayah">Semua Wilayah</option>
          <option value="1">Pusat</option>
          <option value="2">Provinsi</option>
          <option value="3">Kabupaten/Kota</option>
        </select>
      </div>
      <div class="form-group col-md-12" style="display: none;" id="form-provinsi-satker">
        <label for="Provinsi">Provinsi</label>
        <select class="form-control" style="display: none;" id="provinsi-satker">
          <?php foreach ($provinsi as $p): ?>
            <option value="<?= $p['kodesatker']; ?>"><?= substr($p['namasatker'],4); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="indeks">Indeks</label><br>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="sampleDropdownMenu" data-toggle="dropdown">
            Indeks
          </button>
          <div class="dropdown-menu" id="indeksSatker">
            <button class="dropdown-item" type="button">
              <input type="checkbox" id="pilihsemua" value="1" checked>Pilih Semua
            </button>
            <button class="dropdown-item" type="button">
              <input type="checkbox" id="keseluruhan" value="1">Keseluruhan
            </button>
            <button class="dropdown-item" type="button">
              <input type="checkbox" id="bencanaalam" value="1">Bencana Alam
            </button>
            <button class="dropdown-item" type="button">
              <input type="checkbox" id="kebakaran" value="1">Kebakaran
            </button>
            <button class="dropdown-item" type="button">
              <input type="checkbox" id="covid" value="1">Pandemi Covid-19
            </button>
          </div>
        </div>
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
        <select class="form-control" id="indeks">
          <option>Indeks Kesiapan Pegawai</option>
        </select>
      </div>
      <div class="form-group col-md-12">
        <label for="wilayah">Wilayah</label>
        <select class="form-control" id="wilayahpegawai">
          <option value="0" class="defaultwilayah">Semua Wilayah</option>
          <option value="1">Pusat</option>
          <option value="2">Provinsi</option>
          <option value="3">Kabupaten/Kota</option>
        </select>
      </div>
      <div class="form-group col-md-12" id="form-provinsi-pegawai" style="display: none;">
        <label for="provinsi">Wilayah</label>
        <select class="form-control" id="provinsi-pegawai">
          <?php foreach ($provinsi as $p) :?>
            <option value="<?= $p['kodesatker']; ?>"><?= substr($p['namasatker'] , 4) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

    </div>

  </form>
</div>

<div class="container mt-3">
  <div class="" id="tabeldinamis">
  </div>
</div>


<?= $this->endSection(); ?>