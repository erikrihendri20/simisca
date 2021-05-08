<?php

namespace App\Controllers;

use App\Models\Survei_model;
use App\Models\Satker_model;
use App\Models\Sampel_satker_model;

class Dashboard extends BaseController
{
    private $modelSurvei = null;
    private $modelSatker = null;
    private $modelSampelSatker = null;

    public function __construct()
    {
        $this->modelSurvei = new Survei_model();
        $this->modelSatker = new Satker_model();
        $this->modelSampelSatker = new Sampel_satker_model();
    }

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

    public function survey()
    {
        Auth();
        if (isset($this->modelSurvei->getToken(session('email'))[0]['token'])) {
            $data = [
                'token' => $this->modelSurvei->getToken(session('email'))[0]['token']
            ];
        } else {
            $data = [];
        }
        return view('dashboard/survei', $data);
    }

    public function monitoring()
    {
        $data['style'] = 'monitoring';
        $data['script'] = 'monitoring';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring';
        $data['satker'] = $this->modelSampelSatker->getSatker();
        return view('dashboard/monitoring',$data);
    }

    public function monitoringNasional()
    {
        $data['style'] = 'monitoringNasional';
        $data['script'] = 'monitoringNasional';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Nasional';
        $data['satker'] = $this->modelSampelSatker->getSatker();
        return view('dashboard/monitoringNasional',$data);
    }

    public function monitoringProvinsi()
    {
        $data['style'] = 'monitoringProvinsi';
        $data['script'] = 'monitoringProvinsi';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Provinsi';
        $data['satker'] = $this->modelSampelSatker->getSatker();
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

    public function FunctionName()
    {
        dd($this->modelSurvei->participans());
    }
    public function countProgressNasional()
    {
        return json_encode($this->modelSurvei->progressNasional());
    }

    public function countProgressPerProvinsi($kode_satker)
    {
        return json_encode($this->modelSurvei->progressProvinsi(substr($kode_satker,0,2)));
    }
    //--------------------------------------------------------------------

}
