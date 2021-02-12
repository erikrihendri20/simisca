<?php

namespace App\Models;

use CodeIgniter\Model;

class Pegawai_model extends Model
{
    protected $table      = 'index_pegawai';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $useTimestamps = true;

    public function filter($filter)
    {

        $this->builder()->select('namasatker , dpp , dsp , drt , imkb , kategori');
        if ($filter['kodelevel'] == 1) {
            $this->builder()->like('index_pegawai.kodelevel', 1)->orLike('index_pegawai.kodelevel', 5)->orLike('index_pegawai.kodelevel', 4);
        } elseif (!$filter['kodelevel'] == 0 || !$filter['kodelevel'] == null || !$filter['kodelevel'] == '') {
            $this->builder()->where('index_pegawai.kodelevel', $filter['kodelevel']);
        }
        $this->builder()->join('satker', 'satker.kodesatker=index_pegawai.kodesatker');
        $this->builder()->join('kesiapan', 'kesiapan.kode=index_pegawai.kode');

        return $this->builder()->get()->getResultArray();
    }
}
