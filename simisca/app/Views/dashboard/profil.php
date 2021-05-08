<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div>
                    <p>Anda login sebagai</p>
                </div>
                <div class="email">
                    <p>Email</p>
                    <span id="box"></span>
                </div>
                <div>
                    <button id="button-logout">Log out</button>
                </div>
                <div class="notifikasi">
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
                </table>
            </div>
<?= $this->endSection(); ?>