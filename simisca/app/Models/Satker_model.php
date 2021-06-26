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
        $this->builder()->join('imkb_satker','satker.kode_satker=imkb_satker.kode_satker');
        $this->builder()->where('imkb_satker.tahun',$filter['tahun']);
        $this->builder()->select('nama as Nama Satker');
        
        if($filter['kodelevel']==2){
            $this->builder()->like('imkb_satker.kode_satker','01');
        }

        if($filter['pilihsemua']==1){
            $this->builder()->select('perlindungan_aset , sumber_daya , pemulihan , rencana_tanggap , imkb');
        }elseif($filter['keseluruhan']){
            $this->builder()->select('simkb_bencana , simkb_kebakaran , simkb_covid19 , imkb');
        }
        return $this->builder()->get()->getResultArray();
    }

    public function getSpiderChart($filter)
    {
        $this->builder()->select('nama , sumber_daya , rencana_tanggap , pemulihan , perlindungan_aset , imkb');
        $this->builder()->where('imkb_satker.kodesatker', [$filter['provinsi']]);
        $this->builder()->orWhere('imkb_satker.kodesatker', [$filter['kabupaten']]);
        $this->builder()->join('satker', 'satker.kodesatker=imkb_satker.kodesatker');
        return $this->builder()->get()->getResultArray();
    }
}
