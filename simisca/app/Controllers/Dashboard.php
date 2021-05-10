<?php

namespace App\Controllers;

use App\Models\Survei_model;
use App\Models\Satker_model;
use App\Models\Sampel_satker_model;

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
        $sampelSatkerModel = new Sampel_satker_model();
        $data['provinsi'] = $sampelSatkerModel->getSatker();
        $surveyModel = new Survei_model();
        $data['persentaseNasional'] = $surveyModel->progressNasional();
        return view('dashboard/monitoring',$data);
    }

    public function monitoringNasional()
    {
        $data['style'] = 'monitoringNasional';
        $data['script'] = 'monitoringNasional';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Nasional';
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
    }

    public function pengolahan()
    {
        $data['style'] = 'pengolahan';
        $data['script'] = 'pengolahan';
        $data['active'] = 'pengolahan';
        $data['title'] = 'Pengolahan';
        return view("dashboard/pengolahan",$data);
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
