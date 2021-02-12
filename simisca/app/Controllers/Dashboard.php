<?php

namespace App\Controllers;

use App\Models\Survei_model;
use App\Models\Satker_model;

class Dashboard extends BaseController
{
    private $modelSurvei = null;
    private $modelSatker = null;
    public function __construct()
    {
        helper("Auth");
        $this->modelSurvei = new Survei_model();
        $this->modelSatker = new Satker_model();
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

    public function monitor()
    {
        Auth();
        $selesai = $this->modelSurvei->monitor('selesai');
        $selesaiSebagian = $this->modelSurvei->monitor('selesai sebagian');
        $jumlahSatker = $this->modelSatker->countAllResults();

        echo 'selesai mengisi: ' . $selesai / $jumlahSatker;
        echo '<br>selesai sebagian: ' . $selesaiSebagian / $jumlahSatker;
        echo '<br>belum selesai: ' . ($jumlahSatker - $selesai) / $jumlahSatker;
    }


    //--------------------------------------------------------------------

}
