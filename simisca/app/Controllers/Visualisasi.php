<?php

namespace App\Controllers;

use App\Models\Satker_model;
use App\Models\Pegawai_model;
use App\Models\Sampel_satker_model;

class Visualisasi extends BaseController
{

    public function portalVisualisasi()
    {
        $data = [
            'title' => 'Portal Visualisasi',
            'css' => 'portalVisualisasi.css',
            'js' => 'portalVisualisasi.js'
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
            'title' => 'visualisasi',
            'css' => 'visualisasi.css',
            'js' => 'visualisasi.js',
            'provinsi' => $model->getSatker()
        ];
        return view('visualisasi/visualisasi', $data);
    }

    public function petaTematik()
    {
        $data = [
            'title' => 'Peta Tematik',
            'css' => 'tematik.css',
            'js' => 'tematik.js'
        ];
        return view('visualisasi/petaTematik', $data);
    }

    public function tabelDinamis()
    {
        $data = [
            'title' => 'Tabel Dinamis',
            'css' => 'tabelDinamis.css',
            'js' => 'tabelDinamis.js'
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
                'keseluruhan' => $this->request->getVar('keseluruhan'),
                'bencanaalam' => $this->request->getVar('bencanaalam'),
                'kebakaran' => $this->request->getVar('kebakaran'),
                'pandemicovid' => $this->request->getVar('pandemicovid')
            ];
            $modelSatker = new Satker_model();
            $data = [
                'satker' => $modelSatker->filter($filter)
            ];
            return view('visualisasi/tabel', $data);
        } else {
            $filter = [
                'kodelevel' => $this->request->getVar('kodelevel')
            ];
            $modelPegawai = new Pegawai_model();
            $data = [
                'pegawai' => $modelPegawai->filter($filter)
            ];
            return view('visualisasi/tabel', $data);
        }
    }
}
