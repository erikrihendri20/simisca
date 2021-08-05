<?php

namespace App\Controllers;

use App\Models\ImkbSatker_model;
use App\Models\Survei_model;
use App\Models\Jawaban_model;
use App\Models\Satker_model;
use App\Models\Participan_model;
use App\Models\Survey_model;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use org\jsonrpcphp\JsonRPCClient;
use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController
{

    use ResponseTrait;
    private $LS_BASEURL = "http://localhost/limesurvey/";
    private $LS_USER = "riset3";
    private $LS_PASSWORD = "riset3";
    private $rPCClient = null;
    private $sessionKey= null;
    private $surveyId = 423492;


    public function __construct()
    {
        $this->rPCClient = new JsonRPCClient($this->LS_BASEURL.'/admin/remotecontrol');
        $this->sessionKey = $this->rPCClient->get_session_key( $this->LS_USER, $this->LS_PASSWORD );
    }

    public function getResponseRate($tahun)
    {
        $jawabanModel = new Jawaban_model();
        return json_encode($jawabanModel->getResponseRate($tahun));
    }

    public function index()
    {
        $kodesatker = substr(session()->kodeOrganisasi,0,4);
        $data['kodesatker'] = $kodesatker;
        $satkerModel = new Satker_model();
        $data['profil'] = $satkerModel->findByKodesatker($kodesatker)[0];
        $jawabanModel = new Jawaban_model();
        $lokasi = $jawabanModel->getLokasiGeografi($kodesatker , date('Y'));
        foreach ($lokasi[0] as $key =>$l) {
            $data['lokasi'][$key] = ($l == 2) ? 0 :1;
        }
        $imkbSatkerModel = new ImkbSatker_model();
        $data['tahun'] = $imkbSatkerModel->getTahun();
        $data['style'] = 'index';
        $data['script'] = 'index';
        $data['active'] = 'dashboard';
        $data['title'] = 'Dashboard';
        return view("dashboard/index",$data);
    }
    
    public function remote()
    {
        $data['style'] = 'remote';
        $data['script'] = 'remote';
        $data['active'] = 'remote';
        $data['title'] = 'remote';
        return view("dashboard/remote",$data);
        
    }

    public function kuesioner()
    {
        $data['style'] = 'kuesioner';
        $data['script'] = 'kuesioner';
        $data['active'] = 'kuesioner';
        $data['title'] = 'Kuesioner';
        $email = session()->email;
        $model = new Participan_model();
        try {
            $result = $model->getParticipan($email);
            if(count($result)!=0){
                $data['token'] = $result[0]['token'];
            }else{
                
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
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

    public function monitoring()
    {
        try {
            $data['style'] = 'monitoring';
            $data['script'] = 'monitoring';
            $data['active'] = 'monitoring';
            $data['title'] = 'Monitoring';
            $satkerModel = new Satker_model();
            $data['provinsi'] = $satkerModel->getSatker();
            $export = $this->rPCClient->export_responses($this->sessionKey , $this->surveyId , 'json' , null , 'all' , 'code' , 'short' , null , null , null);
            $fetch = json_decode(base64_decode($export),true)['responses'];
            $result = [];
            foreach ($fetch as $f) {
                $result[] = array_values($f)[0];
            }
            $data['persentaseNasional'] = round(count(array_filter($result , function ($r)
            {
                return $r['lastpage'] == 8;
            }))/517*100,2);
            return view('dashboard/monitoring',$data);
        } catch (\Throwable $th) {
            return view('dashboard/monitoringBerhenti',$data);
        }
    }


    public function getResponses()
    {
        $export = $this->rPCClient->export_responses($this->sessionKey , $this->surveyId , 'json' , null , 'all' , 'code' , 'short' , null , null , null);
        $fetch = json_decode(base64_decode($export),true)['responses'];
        $result = [];
        foreach ($fetch as $f) {
            $row = array_values($f)[0];
            switch ($row['R3B01Q001']) {
                case 1:
                    $row['R3B01Q003'] = 1;
                    break;
                
                case 2:
                    $row['R3B01Q003'] = $row['R3B01Q003'].'00';
                    break;
                
                case 3:
                    $row['R3B01Q003'] = $row['R3B01Q003'];
                    break;
                
                case 4:
                    $row['R3B01Q003'] = 3;
                    break;
                
                case 5:
                    $row['R3B01Q003'] = 2;
                    break;
                
                default:
                    # code...
                    break;
            }
            $result[] = $row;
        }
        $satkerModel = new Satker_model();
        return json_encode([
            'satker' => $satkerModel->findAll(),
            'provinsi' => $satkerModel->getSatker(),
            'responses' => $result
        ]);
    }

    public function monitoringNasional()
    {
        $data['style'] = 'monitoringNasional';
        $data['script'] = 'monitoringNasional';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Nasional';
        $satkerModel = new Satker_model();
        $data['provinsi'] = $satkerModel->getSatker();
        $satkerModel = new Satker_model();
        $data['provinsi'] = $satkerModel->getSatker();
        $export = $this->rPCClient->export_responses($this->sessionKey , $this->surveyId , 'json' , null , 'all' , 'code' , 'short' , null , null , null);
        $fetch = json_decode(base64_decode($export),true)['responses'];
        $result = [];
        foreach ($fetch as $f) {
            $result[] = array_values($f)[0];
        }
        $selesai = array_filter($result , function ($r)
        {
            return $r['lastpage'] == 8;
        });
        $sedang = array_filter($result , function ($r)
        {
            return $r['lastpage'] == null;
        });
        $data['persentaseNasional'] = round(count($selesai)/517*100,2);
        $satker = $satkerModel->getSatker();
        // $data['progressPerProvinsi'] = [];
        // foreach ($satker as $s) {
        //     $data['progressPerProvinsi'][] = [
        //         'kodesatker' => $s['kodesatker'],
        //         'namasatker' => $s['namasatker'],
        //         'persentase' => $this->persentasePerProvinsi(substr($s['kodesatker'],0,2))
        //     ];
        // }
        
        
        $data['detailProgressNasional'] = [
            'sudah mengisi' => count($selesai),
            'belum selesai' => count($sedang),
            'belum mengisi' => 517-count($sedang)-count($selesai)
        ];

        // dd($data['detailProgressNasional']);
        


        return view('dashboard/monitoringNasional',$data);
        try {
        } catch (\Throwable $th) {
            return view('dashboard/monitoringBerhenti',$data);
            //throw $th;
        }
    }


    public function persentasePerProvinsi($kodesatker)
    {
        $export = $this->rPCClient->export_responses($this->sessionKey , $this->surveyId , 'json' , null , 'all' , 'code' , 'short' , null , null , null);
        $fetch = json_decode(base64_decode($export),true)['responses'];
        $result = [];
        foreach ($fetch as $f) {
            $row = array_values($f)[0];
            if($row['lastpage'] == 8 && $row['R3B01Q002']==$kodesatker){
                $result[] = $row;
            }
        }
        $satkerModel = new Satker_model();
        $satker = $satkerModel->getSatker($kodesatker);
        
        return json_encode(round(count($result)/count($satker)*100,2));
    }

    public function monitoringProvinsi($kodesatker)
    {
        $data['style'] = 'monitoringProvinsi';
        $data['script'] = 'monitoringProvinsi';
        $data['active'] = 'monitoring';
        $data['title'] = 'Monitoring Provinsi';
        $satkerModel = new Satker_model();
        $data['satker'] = $satkerModel->find($kodesatker);
        return view('dashboard/monitoringProvinsi',$data);
    }

    public function survey()
    {
        $data['style'] = 'survey';
        $data['script'] = 'survey';
        $data['active'] = 'survey';
        $data['title'] = 'survey';
        return view("dashboard/survey",$data);
    }

    public function importSurvey()
    {
        $handle = fopen(base_url('asset/survey/limesurvey_survey_423492.lss'),'r');
        try {
            $file = base64_encode(stream_get_contents($handle));
            $import = $this->rPCClient->import_survey($this->sessionKey , $file , 'lss' , null , null);
            return $this->respondCreated('sukses membuat survey_' . $import);
        } catch (\Throwable $th) {
            return $this->fail(json_encode($th));
        }
    }

    public function importPartisipan()
    {
        $handle = fopen(base_url('asset/survey/partisipan.csv'),'r');
        $partisipan = [];
        $count = 0;
        while($data = fgetcsv($handle)){
            if($count!=0){   
                $partisipan[] = (object)[
                    'firstname' => $data[0],
                    'lastname' => $data[1],
                    'email' => $data[2]
                ];
            }
            $count++;
        }
        try {
            $this->rPCClient->activate_survey($this->sessionKey, $this->surveyId);
        } catch (\Throwable $th) {
            $this->fail(json_encode($th));
        }
        try {
            $this->rPCClient->activate_tokens($this->sessionKey, $this->surveyId,array());
        } catch (\Throwable $th) {
            $this->fail(json_encode($th));
        }

        try {
            $import = $this->rPCClient->add_participants($this->sessionKey , $this->surveyId , $partisipan , true);
        } catch (\Throwable $th) {
            $this->fail(json_encode($th));
        }
    }

    public function exportResponse()
    {
        try {
            $export = $this->rPCClient->export_responses($this->sessionKey , $this->surveyId , 'json' , null , 'all' , 'code' , 'short' , null , null , null);
            $decoded = json_decode(base64_decode($export),true)['responses'];

            $jawabanModel = new Jawaban_model();
            $tahunDb = $jawabanModel->getTahun()[0]['tahun'];
            $new = [];
            foreach ($decoded as $d) {
                $value = array_values($d)[0];
                $new[] = $value;
            }
            $tahunSurvey = date('Y',strtotime($new[0]['submitdate']));
            $newData = [];
            foreach ($new as $n) {
                $kodesatker = null;
                switch ($n['R3B01Q001']) {
                    case 1:
                        $kodesatker = 1;
                        break;
                    
                    case 2:
                        $kodesatker = $n['R3B01Q002'].'00';
                        break;
                    
                    case 3:
                        $kodesatker = $n['R3B01Q003'];
                        break;
                    
                    case 4:
                        $kodesatker = 3;
                        break;
                    
                    case 5:
                        $kodesatker = 2;
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
                $newData[] = [
                    'kodesatker' => $kodesatker,
                    'tahun' => $tahunSurvey,
                    'dekat_pesisir' => $n['R3B03Q003[1]'],
                    'dekat_sungai' => $n['R3B03Q003[2]'],
                    'dekat_dataran_tinggi' => $n['R3B03Q003[3]'],
                    'dekat_gunung_api' => $n['R3B03Q003[4]'],
                    'kebakaran' => $n['R3B03Q004[1]'],
                    'tsunami' => $n['R3B03Q004[2]'],
                    'gempa' => $n['R3B03Q004[3]'],
                    'gunung_api' => $n['R3B03Q004[4]'],
                    'banjir' => $n['R3B03Q004[5]'],
                    'banjir_bandang' => $n['R3B03Q004[6]'],
                    'kekeringan' => $n['R3B03Q004[7]'],
                    'tanah_longsor' => $n['R3B03Q004[8]'],
                    'angin_puting_beliung' => $n['R3B03Q004[9]'],
                    'covid' => $n['R3B03Q004[1]']
                ];
            }
            if($tahunSurvey!=2021){
                if($tahunSurvey!=$tahunDb){
                    $jawabanModel->insertBatch($newData);
                }else{
                    $jawabanModel->deleteBatch($tahunSurvey);
                    $jawabanModel->insertBatch($newData);
                }
            }

            $row = [];
            foreach ($decoded as $d) {
                $value = array_values($d)[0];
                unset($value['R3B03Q004[8]'] , $value['R3B03Q004[9]'] , $value['R3B04Q017h'] , $value['R3B04Q017hh']);
                $row[] = $value;
            }
            $filtered = array_filter($row , function ($r)
            {
                return date('Y',strtotime($r['submitdate']))==2022;
            });
            
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=satker-raw.csv'); 
            $output = fopen("php://output", "w");
            fputcsv($output , array_keys($row[0]));
            foreach ($filtered as $f) {
                fputcsv($output , $f);
            }
            fclose($output);
            exit;
        } catch (\Throwable $th) {
            return $this->fail(json_encode($th));
        }
    }

    public function downloadRScript()
    {
        $handle = fopen(base_url('asset/rScript/script.Rmd'),'r');
        $file ='script.Rmd';
        file_put_contents($file, $handle);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    public function downloadDaftarSatker()
    {
        $handle = fopen(base_url('asset/survey/satker.xlsx'),'r');
        $file ='satker.xlsx';
        file_put_contents($file, $handle);
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

    public function deleteSurvey()
    {
        $delte = $this->rPCClient->delete_survey($this->sessionKey , $this->surveyId);
        return json_encode($delte);
    }

    public function profil()
    {
        $data['style'] = 'profil';
        $data['script'] = 'profil';
        $data['active'] = 'profil';
        $data['title'] = 'Profil';
        $data['profil'] = [
            'foto' => session()->foto,
            'nama' => session()->nama,
            'nip' => session()->nip,
            'email' => session()->email,
            'jabatan' => session()->jabatan,
            'provinsi' => session()->provinsi,
            'kabupaten' => session()->kabupaten
        ];
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

    public function getImkbByKodesatker($kodesatker , $tahun)
    {
        $imkbSatkerModel = new ImkbSatker_model();
        return json_encode($imkbSatkerModel->getImkbByKodesatker($kodesatker , $tahun));
    }
    
}
