<?php

namespace App\Models;

use CodeIgniter\Model;

class Satker_model extends Model
{
    protected $table      = 'index_satker';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $useTimestamps = true;

    public function filter($filter)
    {
        $this->builder()->select('namasatker as Nama Satker');
        if ($filter['pilihsemua'] == 1 || ($filter['pilihsemua'] == 0 && $filter['keseluruhan'] == 0 && $filter['bencanaalam'] == 0 && $filter['kebakaran'] == 0 && $filter['pandemicovid'] == 0)) {
            $this->builder()->select(' sub_bencana_kebakaran , sub_bencana_alam , sub_covid_19 , imkb');
        } elseif ($filter['keseluruhan'] == 1) {
            if ($filter['kebakaran'] == 0 && $filter['bencanaalam'] == 0 && $filter['pandemicovid'] == 0) {
                $this->builder()->select(' dimensi1 , dimensi2 , dimensi3 , dimensi4 , imkb');
            } else {
                if ($filter['bencanaalam'] == 1) $this->builder()->select('sub_bencana_alam');
                if ($filter['kebakaran'] == 1) $this->builder()->select('sub_bencana_kebakaran');
                if ($filter['pandemicovid'] == 1) $this->builder()->select('sub_covid_19');
                $this->builder()->select('imkb');
            }
        } elseif ($filter['keseluruhan'] == 0) {

            if ($filter['kebakaran'] == 0 && $filter['bencanaalam'] == 1 && $filter['pandemicovid'] == 0) {
                $this->builder()->join('kesiapan', 'kesiapan.kode=index_satker.kode_bencana_alam');
                $this->builder()->select(' dsdp_bencana_alam , drtd_bencana_alam , dppd_bencana_alam , dpa_bencana_alam , sub_bencana_alam , kategori');
            } elseif ($filter['kebakaran'] == 1 && $filter['bencanaalam'] == 0 && $filter['pandemicovid'] == 0) {
                $this->builder()->join('kesiapan', 'kesiapan.kode=index_satker.kode_kebakaran');
                $this->builder()->select(' dsdp_bencana_kebakaran , drtd_bencana_kebakaran , dppd_bencana_kebakaran , dpa_bencana_kebakaran , sub_bencana_kebakaran , kategori');
            } else if ($filter['kebakaran'] == 0 && $filter['bencanaalam'] == 0 && $filter['pandemicovid'] == 1) {
                $this->builder()->join('kesiapan', 'kesiapan.kode=index_satker.kode_covid_19');
                $this->builder()->select(' dsdp_covid_19 , drtd_covid_19 , dppd_covid_19 , sub_covid_19 , kategori');
            }
            if ($filter['bencanaalam'] == 1) $this->builder()->select('sub_bencana_alam');
            if ($filter['kebakaran'] == 1) $this->builder()->select('sub_bencana_kebakaran');
            if ($filter['pandemicovid'] == 1) $this->builder()->select('sub_covid_19');
        }
        if ($filter['kodelevel'] == 1) {
            $this->builder()->where('index_satker.kodelevel', 1);
            $this->builder()->orWhere('index_satker.kodelevel', 4);
            $this->builder()->orWhere('index_satker.kodelevel', 5);
        } elseif (!$filter['kodelevel'] == 0 || !$filter['kodelevel'] == null || !$filter['kodelevel'] == '') {
            $this->builder()->where('index_satker.kodelevel', $filter['kodelevel']);
        }
        if (!$filter['tahun'] == '' || !$filter['tahun'] == null) {
            $this->builder()->like('created_at', $filter['tahun']);
        }
        $this->builder()->join('satker', 'satker.kodesatker=index_satker.kodesatker');
        $this->builder()->join('level', "index_satker.kodelevel=level.kodelevel");
        return $this->builder()->get()->getResultArray();
    }
}
