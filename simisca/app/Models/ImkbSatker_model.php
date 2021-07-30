<?php

namespace App\Models;

use CodeIgniter\Model;

class ImkbSatker_model extends Model
{
    protected $table      = 'imkb_satker';
    protected $primaryKey = 'id';

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'kode_satker',
        'tahun',

        'imkb',
        'perlindungan_aset',
        'sumber_daya',
        'pemulihan',
        'rencana_tanggap',

        'simkb_bencana',
        'perlindungan_aset_bencana',
        'sumber_daya_bencana',
        'pemulihan_bencana',
        'rencana_tanggap_bencana',

        'simkb_kebakaran',
        'perlindungan_aset_kebakaran',
        'sumber_daya_kebakaran',
        'pemulihan_kebakaran',
        'rencana_tanggap_kebakaran',

        'simkb_covid19',
        'sumber_daya_covid',
        'pemulihan_covid',
        'rencana_tanggap_covid',

    ];

    protected $returnType     = 'array';

    protected $useTimestamps = true;

    public function matchUpdate($tahun , $kode_satker)
    {
        $this->builder()->where('kode_satker' , $kode_satker);
        $this->builder()->where('tahun', $tahun);
        return $this->builder()->get()->getResultArray();
    }

    public function updateImkb($data)
    {
        $this->builder()->update($data , ['kode_satker' => $data['kode_satker'] , 'tahun' => $data['tahun']]);
    }

    public function getPetaSatker($filter)
    {
        $this->builder()->join('satker' , 'imkb_satker.kode_satker=satker.kodesatker');
        $this->builder()->select('satker.kodesatker , satker.namasatker');
        $this->builder()->where('tahun' , $filter['tahun']);
        switch ($filter['indeks']) {
            case 1:
                // $this->builder()->select('sumber_daya_kebakaran as sumber daya , rencana_tanggap_kebakaran as rencana tanggap , pemulihan_kebakaran as pemulihan , perlindungan_aset_kebakaran as perlindungan aset , simkb_kebakaran as simkb kebakaran');
                $this->builder()->select('simkb_kebakaran as SIMKB Kebakaran');
                break;
            case 2:
                $this->builder()->select('simkb_covid19 as SIMKB covid 19');
                break;
            case 3:
                $this->builder()->whereIn('satker.kode_resiko' , [1,3]);
                if($filter['kodesatker']!=1){
                    $this->builder()->like('imkb_satker.kode_satker' , substr($filter['kodesatker'] , 0 , 2) , 'after');
                }
                $this->builder()->select('simkb_bencana as SIMKB Satker Gempa Tsunami');
                break;
            case 4:
                $this->builder()->whereIn('satker.kode_resiko' , [2,3]);
                if($filter['kodesatker']!=1){
                    $this->builder()->like('imkb_satker.kode_satker' , substr($filter['kodesatker'] , 0 , 2) , 'after');
                }
                $this->builder()->select('simkb_bencana as SIMKB Satker Banjir');
                break;
            default:
                # code...
                break;
        }
        return $this->builder()->get()->getResultArray();
    }

    public function getPartPetaSatker($filter){
        $this->builder()->join('satker' , 'imkb_satker.kode_satker=satker.kodesatker');
        $this->builder()->select('satker.kodesatker , satker.namasatker');
        $this->builder()->where('tahun' , $filter['tahun']);
        switch ($filter['indeks']) {
            case 3:
                $this->builder()->whereIn('imkb_satker.kode_satker' , [1,2,3]);
                $this->builder()->whereIn('satker.kode_resiko' , [1,3]);
                $this->builder()->select('simkb_bencana as SIMKB Satker Gempa Tsunami');
                break;
            
            case 4:
                $this->builder()->whereIn('imkb_satker.kode_satker' , [1,2,3]);
                $this->builder()->whereIn('satker.kode_resiko' , [2,3]);
                $this->builder()->select('simkb_bencana as SIMKB Satker Banjir');
                break;
            
            default:
                # code...
                break;
        }
        return $this->builder()->get()->getResultArray();
    }

    public function getImkb($tahun)
    {
        $this->builder()->where('tahun' , $tahun);
        $this->builder()->select('kode_satker as kodesatker , perlindungan_aset as perlindungan aset , sumber_daya as sumber daya pendukung , pemulihan , rencana_tanggap as rencana tanggap, imkb');
        return $this->builder()->get()->getResultArray();
    }

    public function getkarakteristik($tahun , $jenis , $kodesatker)
    {
        $this->builder()->join('satker' , 'imkb_satker.kode_satker = satker.kodesatker');
        $this->builder()->where('imkb_satker.tahun' , $tahun);
        $this->builder()->select('imkb_satker.kode_satker as kodesatker , satker.namasatker as nama satker');
        switch ($jenis) {
            case 'gunung api':
                $this->builder()->select('imkb_satker.simkb_bencana as simkb gunung api');
                $this->builder()->whereIn('kode_satker' , $kodesatker);

                break;
            
            default:
                # code...
                break;
        }
        return $this->builder()->get()->getResultArray();
    }

    public function getSatkerTable($indeks , $tahun)
    {
        $this->builder()->join('satker' , 'satker.kodesatker=imkb_satker.kode_satker');
        $this->builder()->where('tahun' , $tahun);
        switch ($indeks) {
            case 'kebakaran':
                $this->builder()->select('imkb_satker.kode_satker as kodesatker, satker.namasatker as nama satker , imkb_satker.simkb_kebakaran as simkb kebakaran');
                break;
            
            case 'covid 19':
                $this->builder()->select('imkb_satker.kode_satker as kodesatker, satker.namasatker as nama satker , imkb_satker.simkb_covid19 as simkb covid 19');
                break;
            
            case 'gempa dan tsunami':
                $provinsi = [
                    1,
                    1103,
                    1102,
                    1106,
                    1111,
                    7202,
                    7201,
                    3402,
                    1117,
                    1701,
                    9409,
                    7406,
                    9413,
                    5108,
                    3301,
                    1210,
                    5205,
                    7205,
                    5311,
                    5104,
                    3403,
                    8201,
                    8204,
                    8206,
                    3517,
                    5107,
                    1704,
                    1708,
                    1301,
                    7104,
                    9408,
                    7410,
                    5303,
                    1801,
                    5202,
                    5208,
                    7325,
                    7601,
                    7603,
                    7604,
                    7102,
                    1115,
                    1216,
                    3601,
                    9410,
                    7208,
                    1312,
                    9417,
                    1809,
                    1109,
                    1118,
                    8207,
                    9108,
                    1702,
                    1217,
                    8106,
                    8107,
                    7210,
                    5310,
                    1101,
                    3404,
                    9106,
                    5301,
                    5302,
                    5207,
                    9104,
                    9103,
                    3503,
                    1171,
                    1771,
                    3572,
                    1278,
                    7471,
                    7171,
                    5271,
                    1371,
                    7271,
                    1372,
                    3272,
                    3578,
                    3278,1100,1700,3500,8100,5200,7600,7200,7400,1300,2,1107
                ];
                $this->builder()->whereIn('imkb_satker.kode_satker' , $provinsi);
                $this->builder()->select('satker.namasatker as nama satker , imkb_satker.simkb_bencana as simkb gempa dan tsunami');
                break;

            case 'gunung api':
                $provinsi = [
                    1108,
                    3217,
                    3302,
                    1117,
                    3209,
                    3205,
                    8205,
                    1211,
                    7103,
                    7108,
                    3208,
                    5308,
                    5319,
                    7102,
                    7106,
                    5312,
                    1312,
                    1809,
                    1810,
                    3306,
                    3322,
                    1303,
                    1310,
                    1305,
                    3206,
                    3307,
                    3579,
                    7172,
                    3271,
                    1375,
                    1278,
                    7174,
                    7171,
                    1374,
                    1673,
                    7373,
                    1376,
                    3272,
                    3278,
                    8271,
                    7173,
                    3400,
                    3200,
                    8200,
                    7100
                ];
                $this->builder()->whereIn('imkb_satker.kode_satker' , $provinsi);
                $this->builder()->select('satker.namasatker as nama satker , imkb_satker.simkb_bencana as simkb gunung api');
                break;
            
            case 'dataran tinggi':
                $provinsi = [
                    9402,
                    1206,
                    7326,
                    1117,
                    9410,
                    1215,
                    1205,
                    3208,
                    1113,
                    5304,
                    1673,
                    1217,
                    1501,
                    9418,
                    7173,
                    3306,
                    1216,
                    7318,
                    3277,
                    9433,
                    1375,
                    9417,
                    3273,
                    1106,
                    5312,
                    1211,
                    7201,
                    3579,
                    1801,
                    7603,
                    1374,
                    3272,
                    3307,
                    3305,
                    7102,
                    5313,
                    3200,
                    1572,
                    3217,
                    3204,
                    3373,
                    1702,
                    1303
                ];
                $this->builder()->whereIn('imkb_satker.kode_satker' , $provinsi);
                $this->builder()->select('satker.namasatker as nama satker , imkb_satker.simkb_bencana as simkb dataran tinggi');
                break;
            
            case 'banjir':
                $provinsi = [
                    1,
                    1107,
                    1102,
                    1104,
                    1105,
                    5307,
                    1208,
                    9415,
                    5103,
                    3204,
                    3526,
                    6303,
                    7303,
                    6304,
                    6204,
                    6212,
                    6205,
                    7310,
                    1504,
                    1906,
                    5306,
                    1408,
                    1701,
                    6405,
                    5206,
                    1110,
                    3316,
                    3522,
                    3329,
                    7302,
                    6502,
                    8104,
                    8109,
                    3207,
                    3203,
                    3301,
                    3209,
                    1212,
                    3321,
                    1311,
                    3205,
                    7502,
                    3525,
                    3315,
                    6211,
                    8202,
                    8206,
                    6306,
                    6307,
                    6308,
                    1215,
                    1403,
                    1402,
                    3212,
                    9402,
                    3509,
                    3517,
                    1406,
                    6203,
                    6108,
                    3215,
                    6209,
                    3305,
                    3506,
                    3324,
                    1410,
                    7301,
                    7108,
                    6106,
                    3310,
                    7404,
                    7403,
                    6302,
                    6202,
                    1401,
                    6112,
                    3319,
                    3401,
                    3208,
                    5303,
                    6402,
                    6403,
                    1207,
                    1222,
                    1223,
                    3524,
                    6103,
                    1213,
                    2104,
                    5201,
                    3508,
                    7317,
                    3519,
                    3210,
                    3507,
                    6501,
                    8108,
                    7308,
                    6104,
                    9401,
                    9412,
                    7102,
                    3516,
                    1706,
                    6213,
                    1606,
                    9404,
                    1115,
                    2103,
                    3518,
                    1610,
                    1602,
                    1601,
                    3501,
                    1306,
                    7309,
                    7605,
                    6401,
                    3514,
                    3318,
                    3326,
                    3327,
                    1109,
                    1118,
                    7315,
                    7602,
                    3502,
                    7204,
                    1810,
                    3513,
                    6210,
                    3303,
                    3317,
                    5314,
                    6101,
                    3527,
                    8107,
                    6208,
                    7314,
                    3515,
                    7210,
                    1304,
                    7307,
                    6107,
                    3512,
                    9107,
                    3314,
                    3213,
                    3202,
                    6206,
                    3311,
                    5317,
                    5302,
                    5207,
                    6309,
                    7305,
                    6503,
                    6301,
                    1507,
                    1204,
                    1205,
                    6305,
                    3206,
                    3328,
                    1206,
                    7206,
                    7326,
                    3503,
                    1812,
                    3504,
                    7407,
                    1171,
                    3273,
                    6371,
                    3275,
                    1276,
                    7172,
                    6474,
                    3672,
                    3274,
                    3172,
                    3175,
                    1571,
                    3571,
                    1173,
                    1174,
                    3577,
                    7371,
                    3573,
                    5271,
                    1275,
                    3576,
                    6271,
                    1671,
                    7373,
                    3575,
                    1376,
                    3375,
                    6171,
                    3574,
                    6472,
                    3374,
                    3673,
                    6172,
                    9171,
                    3578,
                    3372,
                    3671,
                    1272,
                    2172,
                    6571,
                    1274,
                    3376,
                    1100,
                    5100,
                    3100,
                    7500,
                    3200,
                    3500,
                    6100,
                    6300,
                    6200,
                    6400,
                    6500,
                    5200,
                    1400,
                    7300,
                    1300,
                    1200
                ];
                $this->builder()->whereIn('imkb_satker.kode_satker' , $provinsi);
                $this->builder()->select('satker.namasatker as nama satker , imkb_satker.simkb_bencana as simkb banjir');
                break;
            
            default:
                # code...
                break;
        }
        return $this->builder()->get()->getResultArray();
    }

    public function getTahun()
    {
        $this->builder()->groupBy('tahun');
        $this->builder()->select('tahun');
        return $this->builder()->get()->getResultArray();
    }
}
