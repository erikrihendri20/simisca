<?php

namespace App\Controllers;

use App\Models\Survei_model;
use App\Models\Satker_model;
use App\Models\Sampel_satker_model;
use App\Models\ImkbSatker_model;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends BaseController
{

    public function index()
    {
        $data['style'] = 'index';
        $data['script'] = 'index';
        $data['active'] = 'dashboard';
        $data['title'] = 'Dashboard';
        return view("dashboard/index",$data);
    }

    public function kuesioner()
    {
        $data['style'] = 'kuesioner';
        $data['script'] = 'kuesioner';
        $data['active'] = 'kuesioner';
        $data['title'] = 'Kuesioner';
        return view("dashboard/kuesioner",$data);
    }

    public function nextKuesioner()
    {
        $data['style'] = 'nextKuesioner';
        $data['script'] = 'nextKuesioner';
        $data['active'] = 'kuesioner';
        $data['title'] = 'Kuesioner';
        return view("dashboard/nextKuesioner",$data);
    }

    // public function survey()
    // {
    //     Auth();
    //     if (isset($this->modelSurvei->getToken(session('email'))[0]['token'])) {
    //         $data = [
    //             'token' => $this->modelSurvei->getToken(session('email'))[0]['token']
    //         ];
    //     } else {
    //         $data = [];
    //     }
    //     return view('dashboard/survei', $data);
    // }

    public function monitoring()
    {
        $data['style'] = 'monitoring';
        $data['script'] = 'monitoring';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring';
        try {
            $sampelSatkerModel = new Sampel_satker_model();
            $data['provinsi'] = $sampelSatkerModel->getSatker();
            $surveyModel = new Survei_model();
            $data['persentaseNasional'] = $surveyModel->progressNasional();
            return view('dashboard/monitoring',$data);
            //code...
        } catch (\Throwable $th) {
            return view('dashboard/monitoringBerhenti',$data);
        }
    }



    public function monitoringNasional()
    {
        $data['style'] = 'monitoringNasional';
        $data['script'] = 'monitoringNasional';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Nasional';
        try {
            $sampelSatkerModel = new Sampel_satker_model();
            $data['provinsi'] = $sampelSatkerModel->getSatker();
            $surveyModel = new Survei_model();
            $data['persentaseNasional'] = $surveyModel->progressNasional();
            $data['progress'] = [];
            foreach ($data['provinsi'] as $prov) :
                $kodesatker = substr($prov['kodesatker'],0,2);
                $progressProvinsi = $surveyModel->progressProvinsi($kodesatker);
                $progress = [
                    'kodesatker' => $prov['kodesatker'],
                    'namasatker' => $prov['namasatker'],
                    'persentase' => $progressProvinsi
                ];
                $data['progressPerProvinsi'][]=$progress;
            endforeach;
            
            $data['detailProgressNasional'] = $surveyModel->detailProgress();
            $data['statusPengisianNasional'] = $surveyModel->statusPengisianSatker();
            
            $data['statusPengisian'] = [];
            foreach ($data['statusPengisianNasional'] as $s) :
                $status['namasatker'] = $s['namasatker'];
                if($s['lastpage']==null){
                    $status['status'] = 'belum mengisi';
                }elseif($s['submitdate']==null){
                    $status['status'] = 'sedang mengisi';
                }else{
                    $status['status'] = 'selesai mengisi';
                }
                $data['statusPengisian'][]=$status;
            endforeach;
            return view('dashboard/monitoringNasional',$data);
        } catch (\Throwable $th) {
            return view('dashboard/monitoringBerhenti',$data);
            //throw $th;
        }
    }

    public function persentasePerProvinsi($kodesatker)
    {
        $surveyModel = new Survei_model();
        $progressProvinsi = $surveyModel->progressProvinsi($kodesatker);
        return json_encode($progressProvinsi);
    }

    public function monitoringProvinsi($kodesatker)
    {
        
        $data['style'] = 'monitoringProvinsi';
        $data['script'] = 'monitoringProvinsi';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Provinsi';
        try {
            $sampelSatkerModel = new Sampel_satker_model();
            $surveyModel = new Survei_model();
            $data['satker'] = $sampelSatkerModel->find($kodesatker);
            $data['persentaseProvinsi'] = $this->persentasePerProvinsi(substr($kodesatker,0,2));

            $data['detailProgressProvinsi'] = $surveyModel->detailProgress(substr($kodesatker,0,2));
            $data['kabupaten'] = $sampelSatkerModel->getSatker(substr($kodesatker,0,2));
            array_unshift($data['kabupaten'] , $data['satker']);

            $data['progressPerkabupaten'] = [];
            
            
            foreach ($data['kabupaten'] as $kab) :
                $ks = $kab['kodesatker'];
                $persentase = $surveyModel->progressKabupaten($ks);
                if($persentase==null){
                    $persentase = 0/8*100;
                }else{
                    $persentase = $persentase[0]['lastpage']/8*100;
                }
                $progress = [
                    'kodesatker' => $kab['kodesatker'],
                    'namasatker' => $kab['namasatker'],
                    'persentase' => $persentase
                ];
                $data['progressPerkabupaten'][]=$progress;
            endforeach;

            $data['statusPengisianProvinsi'] = $surveyModel->statusPengisianSatker(substr($kodesatker,0,2));

            $data['statusPengisian'] = [];
            foreach ($data['statusPengisianProvinsi'] as $s) :
                $status['namasatker'] = $s['namasatker'];
                if($s['lastpage']==null){
                    $status['status'] = 'belum mengisi';
                }elseif($s['submitdate']==null){
                    $status['status'] = 'sedang mengisi';
                }else{
                    $status['status'] = 'selesai mengisi';
                }
                $data['statusPengisian'][]=$status;
            endforeach;

            return view('dashboard/monitoringProvinsi',$data);
        } catch (\Throwable $th) {
            return view('dashboard/monitoringBerhenti',$data);
            //throw $th;
        }
    }

    public function pengolahan()
    {
        if(isset($_POST['script'])){
            $this->rScript();
        }
        if(isset($_POST['upload'])){
            $filename = explode('.' , $_FILES['imkb']['name']);
            if(end($filename)=='csv'){
                $handle = fopen($_FILES['imkb']['tmp_name'],'r');
                $imkb = [];
                $count = 0;
                while($data = fgetcsv($handle)){
                    
                    if($count!=0){
                        $row['kode_satker'] = $data[1];
                        $row['tahun'] = date('Y');
                        
                        $row['perlindungan_aset'] = $data[1];
                        $row['sumber_daya'] = $data[2];
                        $row['pemulihan'] = $data[3];
                        $row['rencana_tanggap'] = $data[4];
                        $row['imkb'] = $data[5];
                        
                        $row['perlindungan_aset_bencana'] = $data[6];
                        $row['sumber_daya_bencana'] = $data[7];
                        $row['pemulihan_bencana'] = $data[8];
                        $row['rencana_tanggap_bencana'] = $data[9];
                        $row['simkb_bencana'] = $data[10];

                        $row['perlindungan_aset_kebakaran'] = $data[11];
                        $row['sumber_daya_kebakaran'] = $data[12];
                        $row['pemulihan_kebakaran'] = $data[13];
                        $row['rencana_tanggap_kebakaran'] = $data[14];
                        $row['simkb_kebakaran'] = $data[15];
                        
                        $row['sumber_daya_covid'] = $data[16];
                        $row['pemulihan_covid'] = $data[17];
                        $row['rencana_tanggap_covid'] = $data[18];
                        $row['simkb_covid19'] = $data[19];

                        $imkb[] = $row;
                    }
                    $count++;
                }
                $imkbSatkerModel = new ImkbSatker_model();
                if(!$imkbSatkerModel->matchUpdate($imkb[0]['tahun'],$imkb[0]['kode_satker'])){
                    $imkbSatkerModel->insertBatch($imkb);
                }else{
                    foreach ($imkb as $row) {
                        $imkbSatkerModel->updateImkb($row);
                    }
                }
            }else{
                $data['pesan'] = 'hanya file csv yang diizinkan';
            }
        }
        $surveyModel = new Survei_model();
        $data['rawData'] = $surveyModel->jawabanKuesioner();
        $data['style'] = 'pengolahan';
        $data['script'] = 'pengolahan';
        $data['active'] = 'pengolahan';
        $data['title'] = 'Pengolahan';
        return view("dashboard/pengolahan",$data);
    }

    private function rScript()
    {
        header('Pragma: public'); 	// required
        header('Expires: 0');		// no cache
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private',false);
        header('Content-Disposition: attachment; filename="'.basename(base_url('RScript/script.R')).'"');
        header('Content-Transfer-Encoding: binary');
        header('Connection: close');
        readfile(base_url('RScript/script.R'));
    }

    public function profil()
    {
        $data['style'] = 'profil';
        $data['script'] = 'profil';
        $data['active'] = 'profil';
        $data['title'] = 'Profil';
        return view("dashboard/Profil",$data);
    }

    public function tentang()
    {
        $data['style'] = 'tentang';
        $data['script'] = 'tentang';
        $data['active'] = 'tentang';
        $data['title'] = 'Tentang';
        return view("dashboard/tentang",$data);
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
        return var_dump($data);
    }

    
    
    //--------------------------------------------------------------------

}
