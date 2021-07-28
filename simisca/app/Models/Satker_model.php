<?php

namespace App\Models;

use CodeIgniter\Model;

class Satker_model extends Model
{
    protected $table      = 'satker';

    protected $returnType     = 'array';

    protected $useTimestamps = true;

    

    public function filter($filter)
    {
        $this->builder()->join('imkb_satker','satker.kodesatker=imkb_satker.kode_satker');
        $this->builder()->where('imkb_satker.tahun',$filter['tahun']);
        $this->builder()->select('kode_satker as kode , namasatker as Nama Satker');
        switch ($filter['kodelevel']) {
            case '1':
                $this->builder()->whereIn('imkb_satker.kode_satker',[1,2,3]);
                break;
            case '2':
                $this->builder()->like('imkb_satker.kode_satker','00');
                break;
            case '3':  
                $this->builder()->like('imkb_satker.kode_satker' , substr($filter['kodeprovinsi'],0,2) , 'after');
                break;
            default:
                break;
        }

        if($filter['pilihsemua']){
            $this->builder()->select('perlindungan_aset as Perlindungan Aset , sumber_daya as Sumber Daya , pemulihan as Pemulihan , rencana_tanggap as Rencana Tanggap, imkb as IMKB');
        }
        elseif($filter['keseluruhan']){
            $this->builder()->select('simkb_kebakaran as SIMKB Kebakaran , simkb_bencana as SIMKB Bencana Alam , simkb_covid19 as SIMKB Covid 19 , imkb as IMKB');
        }
        else{
            if($filter['bencanaalam']&&$filter['kebakaran']){
                $this->builder()->select('simkb_bencana as SIMKB Bencana , simkb_kebakaran as SIMKB Kebakaran');
            }
            elseif($filter['bencanaalam']&&$filter['covid']){
                $this->builder()->select('simkb_bencana as SIMKB Bencana , simkb_covid19 as SIMKB Covid 19');
            }
            elseif($filter['kebakaran']&&$filter['covid']){
                $this->builder()->select('simkb_kebakaran as SIMKB Kebakaran , simkb_covid19 as SIMKB Covid 19');
            }else{
                if($filter['bencanaalam']){
                    $this->builder()->select('perlindungan_aset_bencana as Perlindungan Aset , sumber_daya_bencana as Sumber Daya , pemulihan_bencana as Pemulihan , rencana_tanggap_bencana as Rencana Tanggap, simkb_bencana as SIMKB Bencana');
                }
                elseif($filter['kebakaran']){
                    $this->builder()->select('perlindungan_aset_kebakaran as Perlindungan Aset , sumber_daya_kebakaran as Sumber Daya , pemulihan_kebakaran as Pemulihan , rencana_tanggap_kebakaran as Rencana Tanggap, simkb_kebakaran as SIMKB Kebakaran');
                }
                elseif($filter['covid']){
                    $this->builder()->select('sumber_daya_covid as Sumber Daya , pemulihan_covid as Pemulihan , rencana_tanggap_covid as Rencana Tanggap, simkb_covid19 as SIMKB Covid 19');
                }
            }
        }
        $this->builder()->orderBy('imkb_satker.kode_satker','asc');
        return $this->builder()->get()->getResultArray();
    }
}
