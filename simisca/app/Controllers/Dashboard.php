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
                        
                        $row['perlindungan_aset'] = $data[2];
                        $row['sumber_daya'] = $data[3];
                        $row['pemulihan'] = $data[4];
                        $row['rencana_tanggap'] = $data[5];
                        $row['imkb'] = $data[6];
                        
                        $row['perlindungan_aset_bencana'] = $data[7];
                        $row['sumber_daya_bencana'] = $data[8];
                        $row['pemulihan_bencana'] = $data[9];
                        $row['rencana_tanggap_bencana'] = $data[10];
                        $row['simkb_bencana'] = $data[11];

                        $row['perlindungan_aset_kebakaran'] = $data[12];
                        $row['sumber_daya_kebakaran'] = $data[13];
                        $row['pemulihan_kebakaran'] = $data[14];
                        $row['rencana_tanggap_kebakaran'] = $data[15];
                        $row['simkb_kebakaran'] = $data[16];
                        
                        $row['sumber_daya_covid'] = $data[17];
                        $row['pemulihan_covid'] = $data[18];
                        $row['rencana_tanggap_covid'] = $data[19];
                        $row['simkb_covid19'] = $data[20];

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

    
    
    //--------------------------------------------------------------------

}
