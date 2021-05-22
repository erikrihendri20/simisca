<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
        <div class="menu-content">
            <h2>Pengolahan Data</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <ol>
                <li>Apa</li>
                <li>Apa</li>
                <li>Apa</li>
            </ol>
            
            
            <table id="raw-data">
                <thead>
                    <th>id</th>
                    <th>submitdate</th>
                    <th>lastpage</th>
                    <th>startlanguage</th>
                    <th>seed</th>
                    <th>token</th>
                    <th>startdate</th>
                    <th>datestamp</th>
                    <th>ipaddr</th>

                    <th>R3B01Q001</th>
                    <th>R3B01Q002</th>
                    <th>R3B01Q003</th>
                    <th>R3B01Q004</th>
                    <th>R3B01Q005</th>
                    <th>R3B01Q006</th>
                    <th>R3B01Q007</th>

                    <th>R3B02Q001</th>
                    <th>R3B02Q002</th>
                    <th>R3B02Q003</th>
                    <th>R3B02Q004</th>
                    <th>R3B02Q005</th>
                    <th>R3B02Q005[other]</th>
                    
                    <th>R3B03Q001</th>
                    <th>R3B03Q002</th>
                    <th>R3B03Q003[1]</th>
                    <th>R3B03Q003[2]</th>
                    <th>R3B03Q003[3]</th>
                    <th>R3B03Q003[4]</th>
                    <th>R3B03Q004[1]</th>
                    <th>R3B03Q004[2]</th>
                    <th>R3B03Q004[3]</th>
                    <th>R3B03Q004[4]</th>
                    <th>R3B03Q004[5]</th>
                    <th>R3B03Q004[6]</th>
                    <th>R3B03Q004[7]</th>

                    <th>R3B04Q001</th>
                    <th>R3B04Q002</th>
                    <th>R3B04Q003</th>
                    <th>R3B04Q004</th>
                    <th>R3B04Q005</th>
                    <th>R3B04Q006</th>
                    <th>R3B04Q007</th>
                    <th>R3B04Q008[1]</th>
                    <th>R3B04Q008[2]</th>
                    <th>R3B04Q008[3]</th>
                    <th>R3B04Q008[4]</th>
                    <th>R3B04Q009[1]</th>
                    <th>R3B04Q009[2]</th>
                    <th>R3B04Q010[1]</th>
                    <th>R3B04Q010[2]</th>
                    <th>R3B04Q010[3]</th>
                    <th>R3B04Q010[4]</th>
                    <th>R3B04Q011</th>
                    <th>R3B04Q012[1]</th>
                    <th>R3B04Q012[2]</th>
                    <th>R3B04Q013</th>
                    <th>R3B04Q013a</th>
                    <th>R3B04Q013b</th>
                    <th>R3B04Q013c</th>
                    <th>R3B04Q014</th>
                    <th>R3B04Q015</th>
                    <th>R3B04Q015a</th>
                    <th>R3B04Q015b</th>
                    <th>R3B04Q016</th>
                    <th>R3B04Q017</th>
                    <th>R3B04Q017a</th>
                    <th>R3B04Q017aa</th>
                    <th>R3B04Q017b</th>
                    <th>R3B004Q017bb</th>
                    <th>R3B04Q017c</th>
                    <th>R3B04Q017cc</th>
                    <th>R3B04Q017d</th>
                    <th>R3B04Q017dd</th>
                    <th>R3B04Q017e</th>
                    <th>R3B04Q017ee</th>
                    <th>R3B04Q017f</th>
                    <th>R3B04Q017ff</th>
                    <th>R3B04Q017g</th>
                    <th>R3B04Q017gg</th>
                    <th>R3B04Q018[1]</th>
                    <th>R3B04Q018[2]</th>
                    <th>R3B04Q019</th>
                    <th>R3B04Q020</th>
                    <th>R3B04Q021</th>
                    <th>R3B04Q022</th>
                    <th>R3B04Q023[1]</th>
                    <th>R3B04Q023[2]</th>
                    <th>R3B04Q023[3]</th>
                    <th>R3B04Q024[1]</th>
                    <th>R3B04Q024[2]</th>
                    <th>R3B04Q024[3]</th>
                    <th>R3B04Q025</th>
                    <th>R3B04Q026</th>

                    <th>R3B05Q001</th>
                    <th>R3B05Q002[1]</th>
                    <th>R3B05Q002[2]</th>
                    <th>R3B05Q002[3]</th>
                    <th>R3B05Q002[4]</th>

                    <th>R3B05Q003[1]</th>
                    <th>R3B05Q003[2]</th>
                    <th>R3B05Q003[3]</th>
                    <th>R3B05Q003[4]</th>
                    <th>R3B05Q003[5]</th>

                    <th>R3B05Q004</th>
                    <th>R3B05Q005</th>

                    <th>R3B06Q001</th>
                </thead>
                <?= d($rawData); ?>
                <tbody>
                    <?php foreach ($rawData as $r) :?>
                        <td><?= $r['id']; ?></td>
                        <td><?= $r['submitdate']; ?></td>
                        <td><?= $r['lastpage']; ?></td>
                        <td><?= $r['startlanguage']; ?></td>
                        <td><?= $r['seed']; ?></td>
                        <td><?= $r['token']; ?></td>
                        <td><?= $r['startdate']; ?></td>
                        <td><?= $r['datestamp']; ?></td>
                        <td><?= ($r['ipaddr']=='::1') ? 1 : ''; ?></td>

                        
                        <td><?= $r['423492X1X66']; ?></td>
                        <td><?= $r['423492X1X67']; ?></td>
                        <td><?= $r['423492X1X68']; ?></td>
                        <td><?= $r['423492X1X1']; ?></td>
                        <td><?= $r['423492X1X2']; ?></td>
                        <td><?= $r['423492X1X39']; ?></td>
                        <td><?= $r['423492X1X40']; ?></td>
                        <td><?= $r['423492X2X3']; ?></td>
                        <td><?= $r['423492X2X4']; ?></td>
                        <td><?= $r['423492X2X69']; ?></td>
                        <td><?= $r['423492X2X5']; ?></td>
                        <td><?= $r['423492X2X6']; ?></td>
                        <td><?= $r['423492X2X6other']; ?></td>
                        <td><?= $r['423492X3X7']; ?></td>
                        <td><?= $r['423492X3X8']; ?></td>
                        <td><?= $r['423492X3X91']; ?></td>
                        <td><?= $r['423492X3X92']; ?></td>
                        <td><?= $r['423492X3X93']; ?></td>
                        <td><?= $r['423492X3X94']; ?></td>
                        <td><?= $r['423492X3X101']; ?></td>
                        <td><?= $r['423492X3X102']; ?></td>
                        <td><?= $r['423492X3X103']; ?></td>
                        <td><?= $r['423492X3X104']; ?></td>
                        <td><?= $r['423492X3X105']; ?></td>
                        <td><?= $r['423492X3X106']; ?></td>
                        <td><?= $r['423492X3X107']; ?></td>
                        <td><?= $r['423492X3X108']; ?></td>
                        <td><?= $r['423492X3X109']; ?></td>
                        <td><?= $r['423492X7X29']; ?></td>
                        <td><?= $r['423492X7X42']; ?></td>
                        <td><?= $r['423492X7X44']; ?></td>
                        <td><?= $r['423492X7X30']; ?></td>
                        <td><?= $r['423492X7X32']; ?></td>
                        <td><?= $r['423492X7X33']; ?></td>
                        <td><?= $r['423492X7X19']; ?></td>
                        <td><?= $r['423492X7X201']; ?></td>
                        <td><?= $r['423492X7X202']; ?></td>
                        <td><?= $r['423492X7X203']; ?></td>
                        <td><?= $r['423492X7X204']; ?></td>
                        <td><?= $r['423492X7X181']; ?></td>
                        <td><?= $r['423492X7X182']; ?></td>
                        <td><?= $r['423492X7X171']; ?></td>
                        <td><?= $r['423492X7X172']; ?></td>
                        <td><?= $r['423492X7X173']; ?></td>
                        <td><?= $r['423492X7X174']; ?></td>
                        <td><?= $r['423492X4X36']; ?></td>
                        <td><?= $r['423492X4X351']; ?></td>
                        <td><?= $r['423492X4X352']; ?></td>
                        <td><?= $r['423492X4X13']; ?></td>
                        <td><?= $r['423492X4X61']; ?></td>
                        <td><?= $r['423492X4X62']; ?></td>
                        <td><?= $r['423492X4X63']; ?></td>
                        <td><?= $r['423492X4X14']; ?></td>
                        <td><?= $r['423492X4X15']; ?></td>
                        <td><?= $r['423492X4X64']; ?></td>
                        <td><?= $r['423492X4X65']; ?></td>
                        <td><?= $r['423492X4X16']; ?></td>
                        <td><?= $r['423492X4X25']; ?></td>
                        <td><?= $r['423492X4X45']; ?></td>
                        <td><?= $r['423492X4X53']; ?></td>
                        <td><?= $r['423492X4X46']; ?></td>
                        <td><?= $r['423492X4X54']; ?></td>
                        <td><?= $r['423492X4X47']; ?></td>
                        <td><?= $r['423492X4X55']; ?></td>
                        <td><?= $r['423492X4X48']; ?></td>
                        <td><?= $r['423492X4X48']; ?></td>
                        <td><?= $r['423492X4X56']; ?></td>
                        <td><?= $r['423492X4X57']; ?></td>
                        <td><?= $r['423492X4X50']; ?></td>
                        <td><?= $r['423492X4X58']; ?></td>
                        <td><?= $r['423492X4X51']; ?></td>
                        <td><?= $r['423492X4X59']; ?></td>
                        <td><?= $r['423492X4X52']; ?></td>
                        <td><?= $r['423492X4X60']; ?></td>
                        <td><?= $r['423492X4X241']; ?></td>
                        <td><?= $r['423492X4X242']; ?></td>
                        <td><?= $r['423492X4X26']; ?></td>
                        <td><?= $r['423492X4X27']; ?></td>
                        <td><?= $r['423492X8X28']; ?></td>
                        <td><?= $r['423492X8X21']; ?></td>
                        <td><?= $r['423492X8X221']; ?></td>
                        <td><?= $r['423492X8X222']; ?></td>
                        <td><?= $r['423492X8X223']; ?></td>
                        <td><?= $r['423492X8X341']; ?></td>
                        <td><?= $r['423492X8X342']; ?></td>
                        <td><?= $r['423492X8X343']; ?></td>
                        <td><?= $r['423492X8X23']; ?></td>
                        <td><?= $r['423492X8X37']; ?></td>
                        <td><?= $r['423492X5X43']; ?></td>
                        <td><?= $r['423492X5X311']; ?></td>
                        <td><?= $r['423492X5X312']; ?></td>
                        <td><?= $r['423492X5X313']; ?></td>
                        <td><?= $r['423492X5X314']; ?></td>
                        <td><?= $r['423492X5X111']; ?></td>
                        <td><?= $r['423492X5X112']; ?></td>
                        <td><?= $r['423492X5X113']; ?></td>
                        <td><?= $r['423492X5X114']; ?></td>
                        <td><?= $r['423492X5X115']; ?></td>
                        <td><?= $r['423492X5X116']; ?></td>
                        <td><?= $r['423492X5X12']; ?></td>
                        <td><?= $r['423492X5X41']; ?></td>
                        <td><?= $r['423492X6X38']; ?></td>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="line">
                <div class="card">
                    <h3>Unduh data hasil kuesioner</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="cardp"><button id="unduh-raw-data" class="btn btn-primary"><span class="fa fa-download"></span> <b>Unduh di sini</b></button></p>
                </div>
                <div class="card">
                    <h3>Proses Pengolahan IMKB Satker</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="selengkapnya"><a href="#">selengkapnya</a></p>
                    <p class="cardp"><button id="unduh-rcode" class="btn btn-primary"><span class="fa fa-download"></span><b> Unduh R Code</b></button></p>
                </div>
                <div class="card">
                    <h3>Upload Hasil Pengolahan IMKB Satker</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="cardp"><button id="unggah-hasil" class="btn btn-primary"><span class="fa fa-upload"></span> <b> Unggah Hasil</b></button></p>
                </div>
            </div>
        </div>
<?= $this->endSection(); ?>