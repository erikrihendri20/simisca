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
        if($filter['kodesatker']!=1){
            $this->builder()->like('imkb_satker.kode_satker' , substr($filter['kodesatker'] , 0 , 2) , 'after')->notLike('imkb_satker.kode_satker' , substr($filter['kodesatker'] , 2));
        }
        $this->builder()->select('satker.kodesatker , satker.namasatker');
        switch ($filter['indeks']) {
            case 1:
                // $this->builder()->select('sumber_daya_kebakaran as sumber daya , rencana_tanggap_kebakaran as rencana tanggap , pemulihan_kebakaran as pemulihan , perlindungan_aset_kebakaran as perlindungan aset , simkb_kebakaran as simkb kebakaran');
                $this->builder()->select('simkb_kebakaran as SIMKB Kebakaran');
                break;
            case 2:
                $this->builder()->select('simkb_covid19 as SIMKB covid 19');
                break;
            default:
                # code...
                break;
        }
        return $this->builder()->get()->getResultArray();
    }
}
