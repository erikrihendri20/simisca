<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div class="card">
                    <img class="card-img-top img-thumbnail rounded-circle mx-auto d-block mt-4" src="<?= $profil['foto']; ?>" alt="Card image cap" style="width: 200px; height: 200px;">
                    <div class="card-body">
                        <ul class="list-group">
                            <h5 class="list-group-item w-100"><?= strtoupper($profil['nama']); ?></h5>
                            <li class="list-group-item w-100">Nip : <?= $profil['nip']; ?></li>
                            <li class="list-group-item w-100">Email : <?= $profil['email']; ?></li>
                            <li class="list-group-item w-100">Jabatan : <?= $profil['jabatan']; ?></li>
                            <li class="list-group-item w-100">Provinsi : <?=$profil['provinsi']; ?></li>
                            <li class="list-group-item w-100">Kabupaten : <?=$profil['kabupaten']; ?></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="notifikasi">
                    <p>Notifikasi</p>
                </div>
                <table class="scroll">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>22 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>23 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>24 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>25 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>26 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>27 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>28 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>29 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                        <tr>
                            <td>30 April 2021</td>
                            <td>Pengisian kuesioner</td>
                        </tr>
                </tbody>
                </table> -->
            </div>
<?= $this->endSection(); ?>