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
        helper("Auth");
        $this->modelSurvei = new Survei_model();
        $this->modelSatker = new Satker_model();
        $this->modelSampelSatker = new Sampel_satker_model();
    }

    public function index()
    {
        //cek sudah login atau belum
        Auth();
        //view
        return view("dashboard/index");
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
        $data['satker'] = $this->modelSampelSatker->getSatker();
        return view('dashboard/monitoring',$data);
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
