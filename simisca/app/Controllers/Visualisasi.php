<?php

namespace App\Controllers;

use App\Models\ImkbSatker_model;
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
}
