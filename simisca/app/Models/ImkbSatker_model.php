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
}
