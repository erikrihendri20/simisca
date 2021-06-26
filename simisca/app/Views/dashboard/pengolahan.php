<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
<div class="menu-content">
    <h2>Pengolahan Data</h2>
    <p>Penjelasan mengenai langkah pengolahan data mulai dari raw data hingga terbentuknya IMKB Satker dapat dilihat pada menu ini.</p>
    <ol>
        <li>Unduh data hasil kuesioner</li>
        <li>Proses Pengolahan IMKB Satker</li>
        <li>Upload Hasil Pengolahan IMKB Satker</li>
    </ol>

    <table id="raw-data" style="position: absolute; visibility: hidden;">
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
            <th>R3B03Q004[8]</th>
            <th>R3B03Q004[9]</th>

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
            <th>R3B04Q017h</th>
            <th>R3B04Q017hh</th>
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
            <th>R3B05Q003[6]</th>

            <th>R3B05Q004</th>
            <th>R3B05Q005</th>

            <th>R3B06Q001</th>

            <th>interviewtime</th>
            <th>groupTime147</th>
            <th>R3B01Q001Time</th>
            <th>R3B01Q002Time</th>
            <th>R3B01Q003Time</th>
            <th>R3B01Q004Time</th>
            <th>R3B01Q005Time</th>
            <th>R3B01Q006Time</th>
            <th>R3B01Q007Time</th>

            <th>groupTime148</th>
            <th>R3B02Q001Time</th>
            <th>R3B02Q002Time</th>
            <th>R3B02Q003Time</th>
            <th>R3B02Q004Time</th>
            <th>R3B02Q005Time</th>

            <th>groupTime149</th>
            <th>R3B03Q001Time</th>
            <th>R3B03Q002Time</th>
            <th>R3B03Q003Time</th>
            <th>R3B03Q004Time</th>

            <th>groupTime239</th>
            <th>R3B04Q001Time</th>
            <th>R3B04Q002Time</th>
            <th>R3B04Q003Time</th>
            <th>R3B04Q004Time</th>
            <th>R3B04Q005Time</th>
            <th>R3B04Q006Time</th>
            <th>R3B04Q007Time</th>
            <th>R3B04Q008Time</th>
            <th>R3B04Q009Time</th>
            <th>R3B04Q010Time</th>

            <th>groupTime150</th>
            <th>R3B04Q011Time</th>
            <th>R3B04Q012Time</th>
            <th>R3B04Q013Time</th>
            <th>R3B04Q013aTime</th>
            <th>R3B04Q013bTime</th>
            <th>R3B04Q013cTime</th>
            <th>R3B04Q014Time</th>
            <th>R3B04Q015Time</th>
            <th>R3B04Q015aTime</th>
            <th>R3B04Q015bTime</th>
            <th>R3B04Q016Time</th>
            <th>R3B04Q017Time</th>
            <th>R3B04Q017aTime</th>
            <th>R3B04Q017aaTime</th>
            <th>R3B04Q017bTime</th>
            <th>R3B004Q017bbTime</th>
            <th>R3B04Q017cTime</th>
            <th>R3B04Q017ccTime</th>
            <th>R3B04Q017dTime</th>
            <th>R3B04Q017ddTime</th>
            <th>R3B04Q017eTime</th>
            <th>R3B04Q017eeTime</th>
            <th>R3B04Q017fTime</th>
            <th>R3B04Q017ffTime</th>
            <th>R3B04Q017gTime</th>
            <th>R3B04Q017ggTime</th>
            <th>R3B04Q017hTime</th>
            <th>R3B04Q017hhTime</th>
            <th>R3B04Q018Time</th>
            <th>R3B04Q019Time</th>
            <th>R3B04Q020Time</th>
            <th>groupTime240</th>
            <th>R3B04Q021Time</th>
            <th>R3B04Q022Time</th>
            <th>R3B04Q023Time</th>
            <th>R3B04Q024Time</th>
            <th>R3B04Q025Time</th>
            <th>R3B04Q026Time</th>
            <th>groupTime151</th>
            <th>R3B05Q001Time</th>
            <th>R3B05Q002Time</th>
            <th>R3B05Q003Time</th>
            <th>R3B05Q004Time</th>
            <th>R3B05Q005Time</th>
            <th>groupTime152</th>
            <th>R3B06Q001Time</th>


        </thead>
        <tbody>
            <?php if($rawData): ?>
            <?php foreach ($rawData as $r) : ?>
                <td><?= $r['id']; ?></td>
                <td><?= $r['submitdate']; ?></td>
                <td><?= $r['lastpage']; ?></td>
                <td><?= $r['startlanguage']; ?></td>
                <td><?= $r['seed']; ?></td>
                <td><?= $r['token']; ?></td>
                <td><?= $r['startdate']; ?></td>
                <td><?= $r['datestamp']; ?></td>
                <td><?= ($r['ipaddr'] == '::1') ? 1 : ''; ?></td>


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

                <td><?= $r['interviewtime']; ?></td>
                <td><?= $r['423492X1time']; ?></td>
                <td><?= $r['423492X1X66time']; ?></td>
                <td><?= $r['423492X1X67time']; ?></td>
                <td><?= $r['423492X1X68time']; ?></td>
                <td><?= $r['423492X1X1time']; ?></td>
                <td><?= $r['423492X1X2time']; ?></td>
                <td><?= $r['423492X1X39time']; ?></td>
                <td><?= $r['423492X1X40time']; ?></td>
                <td><?= $r['423492X2time']; ?></td>
                <td><?= $r['423492X2X3time']; ?></td>
                <td><?= $r['423492X2X4time']; ?></td>
                <td><?= $r['423492X2X69time']; ?></td>
                <td><?= $r['423492X2X5time']; ?></td>
                <td><?= $r['423492X2X6time']; ?></td>
                <td><?= $r['423492X3time']; ?></td>
                <td><?= $r['423492X3X7time']; ?></td>
                <td><?= $r['423492X3X8time']; ?></td>
                <td><?= $r['423492X3X9time']; ?></td>
                <td><?= $r['423492X3X10time']; ?></td>
                <td><?= $r['423492X7time']; ?></td>
                <td><?= $r['423492X7X29time']; ?></td>
                <td><?= $r['423492X7X42time']; ?></td>
                <td><?= $r['423492X7X44time']; ?></td>
                <td><?= $r['423492X7X30time']; ?></td>
                <td><?= $r['423492X7X32time']; ?></td>
                <td><?= $r['423492X7X33time']; ?></td>
                <td><?= $r['423492X7X19time']; ?></td>
                <td><?= $r['423492X7X20time']; ?></td>
                <td><?= $r['423492X7X18time']; ?></td>
                <td><?= $r['423492X7X17time']; ?></td>
                <td><?= $r['423492X4time']; ?></td>
                <td><?= $r['423492X4X36time']; ?></td>
                <td><?= $r['423492X4X35time']; ?></td>
                <td><?= $r['423492X4X13time']; ?></td>
                <td><?= $r['423492X4X61time']; ?></td>
                <td><?= $r['423492X4X62time']; ?></td>
                <td><?= $r['423492X4X63time']; ?></td>
                <td><?= $r['423492X4X14time']; ?></td>
                <td><?= $r['423492X4X15time']; ?></td>
                <td><?= $r['423492X4X64time']; ?></td>
                <td><?= $r['423492X4X65time']; ?></td>
                <td><?= $r['423492X4X16time']; ?></td>
                <td><?= $r['423492X4X25time']; ?></td>
                <td><?= $r['423492X4X45time']; ?></td>
                <td><?= $r['423492X4X53time']; ?></td>
                <td><?= $r['423492X4X46time']; ?></td>
                <td><?= $r['423492X4X54time']; ?></td>
                <td><?= $r['423492X4X47time']; ?></td>
                <td><?= $r['423492X4X55time']; ?></td>
                <td><?= $r['423492X4X48time']; ?></td>
                <td><?= $r['423492X4X56time']; ?></td>
                <td><?= $r['423492X4X49time']; ?></td>
                <td><?= $r['423492X4X57time']; ?></td>
                <td><?= $r['423492X4X50time']; ?></td>
                <td><?= $r['423492X4X58time']; ?></td>
                <td><?= $r['423492X4X51time']; ?></td>
                <td><?= $r['423492X4X59time']; ?></td>
                <td><?= $r['423492X4X52time']; ?></td>
                <td><?= $r['423492X4X60time']; ?></td>
                <td><?= $r['423492X4X24time']; ?></td>
                <td><?= $r['423492X4X26time']; ?></td>
                <td><?= $r['423492X4X27time']; ?></td>
                <td><?= $r['423492X8time']; ?></td>
                <td><?= $r['423492X8X28time']; ?></td>
                <td><?= $r['423492X8X21time']; ?></td>
                <td><?= $r['423492X8X22time']; ?></td>
                <td><?= $r['423492X8X34time']; ?></td>
                <td><?= $r['423492X8X23time']; ?></td>
                <td><?= $r['423492X8X37time']; ?></td>
                <td><?= $r['423492X5time']; ?></td>
                <td><?= $r['423492X5X43time']; ?></td>
                <td><?= $r['423492X5X31time']; ?></td>
                <td><?= $r['423492X5X11time']; ?></td>
                <td><?= $r['423492X5X12time']; ?></td>
                <td><?= $r['423492X5X41time']; ?></td>
                <td><?= $r['423492X6time']; ?></td>
                <td><?= $r['423492X6X38time']; ?></td>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="line">
        <div class="card">
            <h3>Unduh data hasil kuesioner</h3>
            <p>Untuk mengunduh hasil kuesioner, klik tombol di bawah ini. Raw data tersebut dapat langsung diolah dengan R code yang tersedia</p>
            <p class="cardp"><button id="unduh-raw-data" class="btn btn-primary"><span class="fa fa-download"></span> <b>Unduh di sini</b></button></p>
        </div>
        <div class="card">
            <h3>Proses Pengolahan IMKB Satker</h3>
            <p>Proses pengolahan untuk membentuk IMKB Satker dapat dilihat pada section ini. Penjelasan mengenai syntax dapat diunduh pada tombol selengkapnya.</p>
            <p class="selengkapnya"><a href="#">selengkapnya</a></p>
            <form action="<?= base_url('Dashboard/pengolahan'); ?>" method="POST">
                <input type="hidden" name="script" value="true">
                <p class="cardp"><button id="unduh-rcode" class="btn btn-primary" style="margin-left: 25px;"><span class="fa fa-download"></span><b> Unduh R Code</b></button></p>
            </form>
        </div>
        <div class="card">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Upload Hasil Pengolahan IMKB Satker</h3>
                <p>Data hasil pengolahan IMKB Satker dapat diupload pada section ini dan secara otomatis visualisasi indeks terbaru muncul pada bagian visualisasi.</p>
                <input type="file" name="imkb">
                <p class="cardp"><button name="upload" id="unggah-hasil" class="btn btn-primary"><span class="fa fa-upload"></span> <b> Unggah Hasil</b></button></p>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>