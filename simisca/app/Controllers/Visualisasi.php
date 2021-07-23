<?php

namespace App\Controllers;

use App\Models\ImkbSatker_model;
use App\Models\Satker_model;
use App\Models\Pegawai_model;
use App\Models\Sampel_satker_model;
use App\Models\Survei_model;

class Visualisasi extends BaseController
{

    public function portalVisualisasi()
    {
        $data = [
            'title' => 'Portal Visualisasi',
            'css' => 'portalVisualisasi.css',
            'js' => 'portalVisualisasi.js',
            'active' => 'portal visualisasi'
        ];
        return view('visualisasi/portalVisualisasi', $data);
    }

    public function getKabupatenKota()
    {
        $model = new Sampel_satker_model();
        $data = $model->getSatker(substr($this->request->getVar('kodelevel'), 0, 2));
        return json_encode($data);
    }

    public function getSpiderChart()
    {
        $model = new Satker_model();
        $filter = [
            'provinsi' => $this->request->getVar('provinsi'),
            'kabupaten' => $this->request->getVar('kabupaten')
        ];
        return json_encode($model->getSpiderChart($filter));
    }

    public function visualisasi()
    {
        $model = new Sampel_satker_model();
        $data = [
            'title' => 'Grafik',
            'css' => 'visualisasi.css',
            'js' => 'visualisasi.js',
            'provinsi' => $model->getSatker(),
            'active' => 'visualisasi'
        ];
        return view('visualisasi/visualisasi', $data);
    }

    public function petaTematik()
    {
        $model = new Sampel_satker_model();
        $data = [
            'title' => 'Peta Tematik',
            'css' => 'tematik.css',
            'js' => 'tematik.js',
            'active' => 'peta tematik'
        ];
        $data['satker'] = $model->getSatker();
        return view('visualisasi/petaTematik', $data);
    }

    public function getPeta($jenis)
    {
        if($jenis=='satker'){
            $model = new ImkbSatker_model();
            $filter = [
                'indeks' => $this->request->getPost('indeks'),
                'kodesatker' => $this->request->getPost('kodesatker'),
                'tahun' => $this->request->getPost('tahun')
            ];
            if($filter['indeks']==3||$filter['indeks']==4){
                if($filter['kodesatker']==3100){
                    $data = array_merge($model->getPartPetaSatker($filter) , $model->getPetaSatker($filter));
                }else{
                    $data = $model->getPetaSatker($filter);
                }
            }else{
                $data = $model->getPetaSatker($filter);
            }
            return json_encode($data);
        }else{
            if($this->request->getPost('indeks')==1){
                $handle = fopen(base_url('asset/imkb/gempa-tsunami-pegawai.csv'),'r');
                $imkb = [];
                $count = 0;
                while($data = fgetcsv($handle)){
                    if($count!==0){
                        $row['kodesatker'] = $data[0];
                        $row['namasatker'] = $data[1];
                        $row['SIMKB Pegawai Gempa Tsunami'] = $data[2];
                        $count++;
                        $imkb[] = $row;
                    }
                    $count++;
                }
                return json_encode($imkb);
            }else{
                $handle = fopen(base_url('asset/imkb/banjir-pegawai.csv'),'r');
                $imkb = [];
                $count = 0;
                while($data = fgetcsv($handle)){
                    if($count!==0){
                        $row['kodesatker'] = $data[0];
                        $row['namasatker'] = $data[1];
                        $row['SIMKB Pegawai Banjir'] = $data[2];
                        $count++;
                        $imkb[] = $row;
                    }
                    $count++;
                }
                return json_encode($imkb);
            }
        }
    }

    public function tabelDinamis()
    {
        $model = new Sampel_satker_model();
        $data = [
            'title' => 'Tabel Dinamis',
            'css' => 'tabelDinamis.css',
            'js' => 'tabelDinamis.js',
            'active' => 'tabel dinamis',
            'provinsi' => $model->getSatker()
        ];
        return view('visualisasi/tabeldinamis', $data);
    }

    public function getTabel($subjek)
    {
        if ($subjek == 'satker') {
            $filter = [
                'tahun' => $this->request->getVar('tahun'),
                'kodelevel' => $this->request->getVar('kodelevel'),
                'pilihsemua' => $this->request->getVar('pilihsemua'),
                'kodeprovinsi' => $this->request->getVar('kodeprovinsi'),
                'keseluruhan' => $this->request->getVar('keseluruhan'),
                'bencanaalam' => $this->request->getVar('bencanaalam'),
                'kebakaran' => $this->request->getVar('kebakaran'),
                'covid' => $this->request->getVar('covid')
            ];
            $modelSatker = new Satker_model();
            $data = [
                'satker' => $modelSatker->filter($filter),
                'active' => 'get tabel'
            ];
            return view('visualisasi/tabel', $data);
        } else {
            $filter = [
                'kodelevel' => $this->request->getVar('kodelevel')
            ];
            $modelPegawai = new Pegawai_model();
            $data = [
                'pegawai' => $modelPegawai->filter($filter),
                'active' => 'get tabel'
            ];
            return view('visualisasi/tabel', $data);
        }
    }


    public function getImkbTable($tahun , $subjek)
    {
        $model = new Survei_model();
        $question = $model->getImkbTable($tahun);
        $data = [];
        foreach ($question as $q) {
            $imkb = [];
            $imkb['id'] = $q['id'];
            $imkb['kodesatker'] = 0;

            if($q['423492X1X66']==1){
                $imkb['kodesatker'] = 1;
            }
            elseif($q['423492X1X66']==2){
                $imkb['kodesatker'] = substr($q['423492X1X68'],0,2) . "00";
            }
            elseif($q['423492X1X66']==3){
                $imkb['kodesatker'] = $q['423492X1X68'];
            }
            elseif($q['423492X1X66']==4){
                $imkb['kodesatker'] = 3;
            }
            elseif($q['423492X1X66']==5){
                $imkb['kodesatker'] = 2;
            }
            // 202
            $q['423492X2X4'] = ($q['423492X2X4']=="M") ?  1 : 2;
            // 303 
            $q['423492X3X91'] = ($q['423492X3X91']==2) ?  0 : (int)$q['423492X3X91'];
            $q['423492X3X92'] = ($q['423492X3X92']==2) ?  0 : (int)$q['423492X3X92'];
            $q['423492X3X93'] = ($q['423492X3X93']==2) ?  0 : (int)$q['423492X3X93'];
            $q['423492X3X94'] = ($q['423492X3X94']==2) ?  0 : (int)$q['423492X3X94'];
            // 304
            $q['423492X3X101'] = ($q['423492X3X101']==2) ?  0 : (int)$q['423492X3X101'];
            $q['423492X3X102'] = ($q['423492X3X102']==2) ?  0 : (int)$q['423492X3X102'];
            $q['423492X3X103'] = ($q['423492X3X103']==2) ?  0 : (int)$q['423492X3X103'];
            $q['423492X3X104'] = ($q['423492X3X104']==2) ?  0 : (int)$q['423492X3X104'];
            $q['423492X3X105'] = ($q['423492X3X105']==2) ?  0 : (int)$q['423492X3X105'];
            $q['423492X3X106'] = ($q['423492X3X106']==2) ?  0 : (int)$q['423492X3X106'];
            $q['423492X3X107'] = ($q['423492X3X107']==2) ?  0 : (int)$q['423492X3X107'];
            // 401
            $q['423492X7X29'] = ($q['423492X7X29']==2) ?  0 : (int)$q['423492X7X29'];
            // 402
            $q['423492X7X42'] = ($q['423492X7X42']==2) ?  0 : (int)$q['423492X7X42'];
            // 403
            $q['423492X7X44'] = ($q['423492X7X44']==2) ?  0 : (int)$q['423492X7X44'];
            // 404
            $q['423492X7X30'] = ($q['423492X7X30']==2) ?  0 : (int)$q['423492X7X30'];
            // 405
            $q['423492X7X32'] = ($q['423492X7X32']==2) ?  0 : (int)$q['423492X7X32'];
            // 406
            $q['423492X7X33'] = ($q['423492X7X33']==2) ?  0 : (int)$q['423492X7X33'];
            // 407
            $q['423492X7X19'] = ($q['423492X7X19']==2) ?  0 : (int)$q['423492X7X19'];
            // 408
            $q['423492X7X201'] = ($q['423492X7X201']=="Y") ? 1 : $q['423492X7X201'] = 0;
            $q['423492X7X202'] = ($q['423492X7X202']=="Y") ? 1 : $q['423492X7X202'] = 0;
            $q['423492X7X203'] = ($q['423492X7X203']=="Y") ? 1 : $q['423492X7X203'] = 0;
            $q['423492X7X204'] = ($q['423492X7X204']=="Y") ? 1 : $q['423492X7X204'] = 0;
            // 409
            $q['423492X7X181'] = ($q['423492X7X181']==2) ? 0 : (int)$q['423492X7X181'];
            $q['423492X7X182'] = ($q['423492X7X182']==2) ? 0 : (int)$q['423492X7X182'];
            // 410
            $q['423492X7X171'] = ($q['423492X7X171']==2) ? 0 : (int)$q['423492X7X171'];
            $q['423492X7X172'] = ($q['423492X7X172']==2) ? 0 : (int)$q['423492X7X172'];
            $q['423492X7X173'] = ($q['423492X7X173']==2) ? 0 : (int)$q['423492X7X173'];
            $q['423492X7X174'] = ($q['423492X7X174']==2) ? 0 : (int)$q['423492X7X174'];
            // 411
            $q['423492X4X36'] = ($q['423492X4X36']==2) ? 0 : (int)$q['423492X4X36'];
            // 412
            $q['423492X4X351'] = ($q['423492X4X351']==2) ? 0 : (int)$q['423492X4X351'];
            $q['423492X4X352'] = ($q['423492X4X352']==2) ? 0 : (int)$q['423492X4X352'];
            // 413 x13
            $q['423492X4X61'] = ($q['423492X4X61']==2) ? 0 : (int)$q['423492X4X61'];
            $q['423492X4X62'] = ($q['423492X4X62']==2) ? 0 : (int)$q['423492X4X62'];
            $q['423492X4X63'] = ($q['423492X4X63']==2) ? 0 : (int)$q['423492X4X63'];
            // 414
            $q['423492X4X14'] = ($q['423492X4X14']==2) ? 0 : (int)$q['423492X4X14'];
            // 415 x15
            $q['423492X4X64'] = ($q['423492X4X64']==2) ? 0 : (int)$q['423492X4X64'];
            $q['423492X4X65'] = ($q['423492X4X65']==2) ? 0 : (int)$q['423492X4X65'];
            // 416
            $q['423492X4X16'] = ($q['423492X4X16']==2) ? 0 : (int)$q['423492X4X16'];
            // 417 x25
            $q['423492X4X45'] = ($q['423492X4X45']==2) ? 0 : (int)$q['423492X4X45'];
            $q['423492X4X46'] = ($q['423492X4X46']==2) ? 0 : (int)$q['423492X4X46'];
            $q['423492X4X47'] = ($q['423492X4X47']==2) ? 0 : (int)$q['423492X4X47'];
            $q['423492X4X48'] = ($q['423492X4X48']==2) ? 0 : (int)$q['423492X4X48'];
            $q['423492X4X49'] = ($q['423492X4X49']==2) ? 0 : (int)$q['423492X4X49'];
            $q['423492X4X50'] = ($q['423492X4X50']==2) ? 0 : (int)$q['423492X4X50'];
            $q['423492X4X51'] = ($q['423492X4X51']==2) ? 0 : (int)$q['423492X4X51'];

            $q['423492X4X53'] = ($q['423492X4X53']==2) ? 0 : (int)$q['423492X4X53'];
            $q['423492X4X54'] = ($q['423492X4X54']==2) ? 0 : (int)$q['423492X4X54'];
            $q['423492X4X55'] = ($q['423492X4X55']==2) ? 0 : (int)$q['423492X4X55'];
            $q['423492X4X56'] = ($q['423492X4X56']==2) ? 0 : (int)$q['423492X4X56'];
            $q['423492X4X57'] = ($q['423492X4X57']==2) ? 0 : (int)$q['423492X4X57'];
            $q['423492X4X58'] = ($q['423492X4X58']==2) ? 0 : (int)$q['423492X4X58'];
            $q['423492X4X59'] = ($q['423492X4X59']==2) ? 0 : (int)$q['423492X4X59'];
            // 418
            $q['423492X4X241'] = ($q['423492X4X241']==2) ? 0 : (int)$q['423492X4X241'];
            $q['423492X4X242'] = ($q['423492X4X242']==2) ? 0 : (int)$q['423492X4X242'];
            // 419
            $q['423492X4X26'] = ($q['423492X4X26']==2) ? 0 : (int)$q['423492X4X26'];
            // 420
            $q['423492X4X27'] = ($q['423492X4X27']==2) ? 0 : (int)$q['423492X4X27'];
            // 421
            $q['423492X8X28'] = ($q['423492X8X28']==2) ? 0 : (int)$q['423492X8X28'];
            // 422
            $q['423492X8X21'] = ($q['423492X8X21']==2) ? 0 : (int)$q['423492X8X21'];
            // 423
            $q['423492X8X221'] = ($q['423492X8X221']=="Y") ? 1 : $q['423492X8X221'] = 0;
            $q['423492X8X222'] = ($q['423492X8X222']=="Y") ? 1 : $q['423492X8X222'] = 0;
            $q['423492X8X223'] = ($q['423492X8X223']=="Y") ? 1 : $q['423492X8X223'] = 0;
            // 424
            $q['423492X8X341'] = ($q['423492X8X341']==2) ? 0 : (int)$q['423492X8X341'];
            $q['423492X8X342'] = ($q['423492X8X342']==2) ? 0 : (int)$q['423492X8X342'];
            $q['423492X8X343'] = ($q['423492X8X343']==2) ? 0 : (int)$q['423492X8X343'];
            // 425
            $q['423492X8X23'] = ($q['423492X8X23']==2) ? 0 : (int)$q['423492X8X23'];
            // 426
            $q['423492X8X37'] = ($q['423492X8X37']==2) ? 0 : (int)$q['423492X8X37'];
            // 501
            $q['423492X5X43'] = ($q['423492X5X43']==2) ? 0 : (int)$q['423492X5X43'];
            // 502
            $q['423492X5X311'] = ($q['423492X5X311']==2) ? 0 : (int)$q['423492X5X311'];
            $q['423492X5X312'] = ($q['423492X5X312']==2) ? 0 : (int)$q['423492X5X312'];
            $q['423492X5X313'] = ($q['423492X5X313']==2) ? 0 : (int)$q['423492X5X313'];
            $q['423492X5X314'] = ($q['423492X5X314']==2) ? 0 : (int)$q['423492X5X314'];
            // 503
            $q['423492X5X111'] = ($q['423492X5X111']==2) ? 0 : (int)$q['423492X5X111'];
            $q['423492X5X112'] = ($q['423492X5X112']==2) ? 0 : (int)$q['423492X5X112'];
            $q['423492X5X113'] = ($q['423492X5X113']==2) ? 0 : (int)$q['423492X5X113'];
            $q['423492X5X114'] = ($q['423492X5X114']==2) ? 0 : (int)$q['423492X5X114'];
            $q['423492X5X115'] = ($q['423492X5X115']==2) ? 0 : (int)$q['423492X5X115'];
            // 504
            $q['423492X5X12'] = ($q['423492X5X12']==2) ? 0 : (int)$q['423492X5X12'];
            // 505
            $q['423492X5X41'] = ($q['423492X5X41']==2) ? 0 : (int)$q['423492X5X41'];

            $q401 = $q['423492X7X29'];
            $q402 = $q['423492X7X42'];
            $q403 = $q['423492X7X44'];
            $q404 = $q['423492X7X30'];
            $q405 = $q['423492X7X32'];
            $q406 = $q['423492X7X33'];
            $q407 = $q['423492X7X19'];
            $q408 = $q['423492X7X201'] + $q['423492X7X202'] + $q['423492X7X203'] + $q['423492X7X204'];
            $q409 = $q['423492X7X181'] + $q['423492X7X182'];
            $q410 = $q['423492X7X171'] + $q['423492X7X172'] + $q['423492X7X173'] + $q['423492X7X174'];
            $q411 = $q['423492X4X36'];
            $q412 = $q['423492X4X351'] + $q['423492X4X352'];
            $q413 = $q['423492X4X61'] + $q['423492X4X62'] + $q['423492X4X63'];
            $q414 = $q['423492X4X14'];
            $q415 = $q['423492X4X64'] + $q['423492X4X65'];
            $q416 = $q['423492X4X16'];
            $q417 = $q['423492X4X45'] + $q['423492X4X46'] + $q['423492X4X47'] + $q['423492X4X48'] + $q['423492X4X49'] + $q['423492X4X50'] + $q['423492X4X51'] + $q['423492X4X53'] + $q['423492X4X54'] + $q['423492X4X55'] + $q['423492X4X56'] + $q['423492X4X57'] + $q['423492X4X58'] + $q['423492X4X59'] +
            $q418 = $q['423492X4X241'] + $q['423492X4X242'];
            $q419 = $q['423492X4X26'];
            $q420 = $q['423492X4X27'];
            $q421 = $q['423492X8X28'];
            $q422 = $q['423492X8X21'];
            $q423 = $q['423492X8X221'] + $q['423492X8X222'] + $q['423492X8X223'];
            $q424 = $q['423492X8X341'] + $q['423492X8X342'] + $q['423492X8X343'];
            $q425 = $q['423492X8X23'];
            $q426 = $q['423492X8X37'];
            $q501 = $q['423492X5X43'];
            $q502 = $q['423492X5X311'] + $q['423492X5X312'] + $q['423492X5X313'] + $q['423492X5X314'];
            $q503 = $q['423492X5X111'] + $q['423492X5X112'] + $q['423492X5X113'] + $q['423492X5X114'] + $q['423492X5X115'];
            $q504 = $q['423492X5X12'];
            $q505 = $q['423492X5X41'];
            switch ($subjek) {
                case 'imkb':
                    $imkb['total sistem peringatan dini'] =  $q407 + $q408 + $q409;
                    $imkb['total perlengkapan kebutuhan dasar'] = $q410 + $q413 + $q414 + $q415 + $q416 + $q503 + $q504;
                    $imkb['total mobilisasi sumber daya'] = $q422 + $q423 + $q425;
                    $imkb['indikator 1 sumber daya pendukung'] = $imkb['total sistem peringatan dini'] + $imkb['total perlengkapan kebutuhan dasar'];
                    $imkb['indikator 2 sumber daya pendukung'] = $imkb['total mobilisasi sumber daya'];
                    $imkb['dimensi sumber daya pendukung'] = $imkb['indikator 1 sumber daya pendukung'] + $imkb['indikator 2 sumber daya pendukung'];
                    $imkb['total pemulihan pegawai'] = $q424;
                    $imkb['total pemulihan fasilitas'] = $q411 + $q412 + $q426;
                    $imkb['indikator dimensi pemulihan dan penanggulangan darurat'] = $imkb['total pemulihan pegawai'] + $imkb['total pemulihan fasilitas'];
                    $imkb['dimensi pemulihan dan penanggulangan darurat'] = $imkb['indikator dimensi pemulihan dan penanggulangan darurat'];
                    $imkb['total perlindungan data dan dokumen'] = $q419 + $q420 + $q421;
                    $imkb['total perlindungan properti fasilitas'] = $q417 + $q418;
                    $imkb['indikator dimensi perlindungan aset'] = $imkb['total perlindungan data dan dokumen'] + $imkb['total perlindungan properti fasilitas'];
                    $imkb['dimensi perlindungan aset'] = $imkb['indikator dimensi perlindungan aset'];
                    $imkb['total koordinasi institusi lain'] = $q405;
                    $imkb['total pembentukan tim khusus bencana'] = $q406;
                    $imkb['total pelatihan'] = $q401 + $q402 + $q501;
                    $imkb['total prosedur penanggulangan bencana'] = $q403 + $q404 + $q502;
                    $imkb['indikator 1 dimensi rencana tanggap darurat'] =  $imkb['total koordinasi institusi lain'] + $imkb['total pembentukan tim khusus bencana'] + $imkb['total pelatihan'];
                    $imkb['indikator 2 dimensi rencana tanggap darurat'] = $imkb['total prosedur penanggulangan bencana'];
                    $imkb['dimensi rencana tanggap darurat'] = $imkb['indikator 1 dimensi rencana tanggap darurat'] + $imkb['indikator 2 dimensi rencana tanggap darurat'];            
                    break;

                case 'bencana alam':
                    $imkb['total sistem peringatan dini'] =  $q407 + $q408 + $q409;
                    $imkb['total perlengkapan kebutuhan dasar'] = $q410 + $q413 + $q414;
                    $imkb['total mobilisasi sumber daya'] = $q422 + $q423 + $q425;
                    $imkb['indikator 1 sumber daya pendukung'] = $imkb['total sistem peringatan dini'] + $imkb['total perlengkapan kebutuhan dasar'];
                    $imkb['indikator 2 sumber daya pendukung'] = $imkb['total mobilisasi sumber daya'];
                    $imkb['dimensi sumber daya pendukung'] = $imkb['indikator 1 sumber daya pendukung'] + $imkb['indikator 2 sumber daya pendukung'];
                    $imkb['total pemulihan pegawai'] = $q424;
                    $imkb['total pemulihan fasilitas'] = $q411 + $q412;
                    $imkb['indikator dimensi pemulihan dan penanggulangan darurat'] = $imkb['total pemulihan pegawai'] + $imkb['total pemulihan fasilitas'];
                    $imkb['dimensi pemulihan dan penanggulangan darurat'] = $imkb['indikator dimensi pemulihan dan penanggulangan darurat'];
                    $imkb['total perlindungan data dan dokumen'] = $q419 + $q420 + $q421;
                    $imkb['total perlindungan properti fasilitas'] = $q417 + $q418;
                    $imkb['indikator dimensi perlindungan aset'] = $imkb['total perlindungan data dan dokumen'] + $imkb['total perlindungan properti fasilitas'];
                    $imkb['dimensi perlindungan aset'] = $imkb['indikator dimensi perlindungan aset'];
                    $imkb['total koordinasi institusi lain'] = $q405;
                    $imkb['total pembentukan tim khusus bencana'] = $q406;
                    $imkb['total pelatihan'] = $q401;
                    $imkb['total prosedur penanggulangan bencana'] = $q403 + $q404;
                    $imkb['indikator 1 dimensi rencana tanggap darurat'] =  $imkb['total koordinasi institusi lain'] + $imkb['total pembentukan tim khusus bencana'] + $imkb['total pelatihan'];
                    $imkb['indikator 2 dimensi rencana tanggap darurat'] = $imkb['total prosedur penanggulangan bencana'];
                    $imkb['dimensi rencana tanggap darurat'] = $imkb['indikator 1 dimensi rencana tanggap darurat'] + $imkb['indikator 2 dimensi rencana tanggap darurat'];            
                    break;

                case 'kebakaran':
                    $imkb['total sistem peringatan dini'] =  $q407 + $q408 + $q409;
                    $imkb['total perlengkapan kebutuhan dasar'] = $q410 + $q413 + $q414 + $q415 + $q416;
                    $imkb['total mobilisasi sumber daya'] = $q423 + $q425;
                    $imkb['indikator 1 sumber daya pendukung'] = $imkb['total sistem peringatan dini'] + $imkb['total perlengkapan kebutuhan dasar'];
                    $imkb['indikator 2 sumber daya pendukung'] = $imkb['total mobilisasi sumber daya'];
                    $imkb['dimensi sumber daya pendukung'] = $imkb['indikator 1 sumber daya pendukung'] + $imkb['indikator 2 sumber daya pendukung'];
                    $imkb['total pemulihan pegawai'] = $q422 + $q424;
                    $imkb['total pemulihan fasilitas'] = $q411 + $q412;
                    $imkb['indikator dimensi pemulihan dan penanggulangan darurat'] = $imkb['total pemulihan pegawai'] + $imkb['total pemulihan fasilitas'];
                    $imkb['dimensi pemulihan dan penanggulangan darurat'] = $imkb['indikator dimensi pemulihan dan penanggulangan darurat'];
                    $imkb['total perlindungan data dan dokumen'] = $q419 + $q420 + $q421;
                    $imkb['total perlindungan properti fasilitas'] = $q417 + $q418;
                    $imkb['indikator dimensi perlindungan aset'] = $imkb['total perlindungan data dan dokumen'] + $imkb['total perlindungan properti fasilitas'];
                    $imkb['dimensi perlindungan aset'] = $imkb['indikator dimensi perlindungan aset'];
                    $imkb['total koordinasi institusi lain'] = $q405;
                    $imkb['total pembentukan tim khusus bencana'] = $q406;
                    $imkb['total pelatihan'] = $q402;
                    $imkb['total prosedur penanggulangan bencana'] = $q403 + $q404;
                    $imkb['indikator 1 dimensi rencana tanggap darurat'] =  $imkb['total koordinasi institusi lain'] + $imkb['total pembentukan tim khusus bencana'] + $imkb['total pelatihan'];
                    $imkb['indikator 2 dimensi rencana tanggap darurat'] = $imkb['total prosedur penanggulangan bencana'];
                    $imkb['dimensi rencana tanggap darurat'] = $imkb['indikator 1 dimensi rencana tanggap darurat'] + $imkb['indikator 2 dimensi rencana tanggap darurat'];            
                    break;

                case 'covid':
                    $imkb['total sistem peringatan dini'] =  $q407 + $q408;
                    $imkb['total perlengkapan kebutuhan dasar'] = $q413 + $q414 + $q503 + $q504;
                    $imkb['total mobilisasi sumber daya'] = $q422 + $q423;
                    $imkb['indikator 1 sumber daya pendukung'] = $imkb['total sistem peringatan dini'] + $imkb['total perlengkapan kebutuhan dasar'];
                    $imkb['indikator 2 sumber daya pendukung'] = $imkb['total mobilisasi sumber daya'];
                    $imkb['dimensi sumber daya pendukung'] = $imkb['indikator 1 sumber daya pendukung'] + $imkb['indikator 2 sumber daya pendukung'];
                    $imkb['total pemulihan pegawai'] = $q424;
                    $imkb['total pemulihan fasilitas'] = 0;
                    $imkb['indikator dimensi pemulihan dan penanggulangan darurat'] = $imkb['total pemulihan pegawai'] + $imkb['total pemulihan fasilitas'];
                    $imkb['dimensi pemulihan dan penanggulangan darurat'] = $imkb['indikator dimensi pemulihan dan penanggulangan darurat'];
                    $imkb['total perlindungan data dan dokumen'] = 0;
                    $imkb['total perlindungan properti fasilitas'] = 0;
                    $imkb['indikator dimensi perlindungan aset'] = $imkb['total perlindungan data dan dokumen'] + $imkb['total perlindungan properti fasilitas'];
                    $imkb['dimensi perlindungan aset'] = $imkb['indikator dimensi perlindungan aset'];
                    $imkb['total koordinasi institusi lain'] = $q405;
                    $imkb['total pembentukan tim khusus bencana'] = 0;
                    $imkb['total pelatihan'] = $q501;
                    $imkb['total prosedur penanggulangan bencana'] = $q403 + $q404 + $q502;
                    $imkb['indikator 1 dimensi rencana tanggap darurat'] =  $imkb['total koordinasi institusi lain'] + $imkb['total pembentukan tim khusus bencana'] + $imkb['total pelatihan'];
                    $imkb['indikator 2 dimensi rencana tanggap darurat'] = $imkb['total prosedur penanggulangan bencana'];
                    $imkb['dimensi rencana tanggap darurat'] = $imkb['indikator 1 dimensi rencana tanggap darurat'] + $imkb['indikator 2 dimensi rencana tanggap darurat'];            
                    break;
                
                default:
                    
                    break;
            }
            

            $data[] = $imkb;
        }
        return json_encode($data);
    }
}
