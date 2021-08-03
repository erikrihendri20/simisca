<?php

namespace App\Models;

use CodeIgniter\Model;

class Jawaban_model extends Model
{
    protected $table      = 'jawaban';
    protected $primaryKey = 'id';

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields = [
        'id',
        'kodesatker',
        'tahun',
        'dekat_pesisir',
        'dekat_sungai',
        'dekat_dataran_tinggi',
        'dekat_gunung_api',
        'kebakaran',
        'tsunami',
        'gempa',
        'gunung_api',
        'banjir',
        'banjir_bandang',
        'kekeringan',
        'tanah longsor',
        'angin_puting_beliung',
        'covid'
    ];

    protected $returnType     = 'array';

    protected $useTimestamps = true;

    public function getJawaban($kodesatker)
    {
        $this->builder()->join('satker' , 'jawaban.kodesatker = satker.kodesatker');
    }
    
    public function findByTahun($tahun)
    {
        $this->builder()->where('tahun',$tahun);
        return $this->builder()->get()->getResultArray();
    }

    public function getLokasiGeografi($kodesatker,$tahun)
    {
        $this->builder()->where('tahun' , $tahun);
        $this->builder()->where('kodesatker' , $kodesatker);
        $this->builder()->select('dekat_pesisir as pesisir , dekat_sungai as sungai , dekat_dataran_tinggi as dataran tinggi , dekat_gunung_api as gunung berapi' );
        return $this->builder()->get()->getResultArray();
    }

    public function getTahun()
    {
        $this->builder()->groupBy('tahun');
        $this->builder()->select('tahun');
        $this->builder()->orderBy('tahun' , 'desc');
        return $this->builder()->get()->getResultArray();
    }

    public function deleteBatch($tahun)
    {
        $this->builder()->delete(['tahun' => $tahun]);
    }
}
