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
            $this->builder()->select(' sub_bencana_kebakaran as Sub IMKB Kebakaran, sub_bencana_alam as Sub IMKB Bencana Alam, sub_covid_19 as Sub IMKB Covid-19 , imkb as IMKB');
        } elseif ($filter['keseluruhan'] == 1) {
            if ($filter['kebakaran'] == 0 && $filter['bencanaalam'] == 0 && $filter['pandemicovid'] == 0) {
                $this->builder()->select(' dimensi1 as Sumber Daya Pendukung, dimensi2 as Rencana Tanggap Darurat , dimensi3 as Pemulihan dan Penanggulangan Darurat , dimensi4 as Perlindungan Aset, imkb as IMKB');
            } else {
                if ($filter['bencanaalam'] == 1) $this->builder()->select('sub_bencana_alam as Sub IMKB Bencana Alam');
                if ($filter['kebakaran'] == 1) $this->builder()->select('sub_bencana_kebakaran as Sub IMKB Kebakaran');
                if ($filter['pandemicovid'] == 1) $this->builder()->select('sub_covid_19 as Sub IMKB Covid-19');
                $this->builder()->select('imkb as IMKB');
            }
        } elseif ($filter['keseluruhan'] == 0) {

            if ($filter['kebakaran'] == 0 && $filter['bencanaalam'] == 1 && $filter['pandemicovid'] == 0) {
                $this->builder()->join('kesiapan', 'kesiapan.kode=index_satker.kode_bencana_alam');
                $this->builder()->select(' dsdp_bencana_alam as Sumber Daya Pendukung, drtd_bencana_alam as Rencana Tanggap Darurat , dppd_bencana_alam as Pemulihan dan Penanggulangan Darurat, dpa_bencana_alam as Perlindungan Aset , sub_bencana_alam as Sub IMKB Bencana Alam, kategori as Kategori');
            } elseif ($filter['kebakaran'] == 1 && $filter['bencanaalam'] == 0 && $filter['pandemicovid'] == 0) {
                $this->builder()->join('kesiapan', 'kesiapan.kode=index_satker.kode_kebakaran');
                $this->builder()->select(' dsdp_bencana_kebakaran as Sumber Daya Pendukung , drtd_bencana_kebakaran as Rencana Tanggap Darurat , dppd_bencana_kebakaran as Pemulihan dan Penanggulangan Darurat, dpa_bencana_kebakaran as Perlindungan Aset , sub_bencana_kebakaran as Sub IMKB Kebakaran , kategori as Kategori');
            } else if ($filter['kebakaran'] == 0 && $filter['bencanaalam'] == 0 && $filter['pandemicovid'] == 1) {
                $this->builder()->join('kesiapan', 'kesiapan.kode=index_satker.kode_covid_19');
                $this->builder()->select(' dsdp_covid_19 as Sumber Daya Pendukung, drtd_covid_19 as Rencana Tanggap Darurat, dppd_covid_19 as Pemulihan dan Penanggulangan Darurat, sub_covid_19 as Sub IMKB Covid-19, kategori as Kategori');
            }
            if ($filter['bencanaalam'] == 1) $this->builder()->select('sub_bencana_alam as Sub IMKB Bencana Alam');
            if ($filter['kebakaran'] == 1) $this->builder()->select('sub_bencana_kebakaran as Sub IMKB Kebakaran');
            if ($filter['pandemicovid'] == 1) $this->builder()->select('sub_covid_19 as Sub IMKB Covid-19');
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

    public function getSpiderChart($filter)
    {
        $this->builder()->select('namasatker , dimensi1 , dimensi2 , dimensi3 , dimensi4 , imkb');
        $this->builder()->where('index_satker.kodesatker', [$filter['provinsi']]);
        $this->builder()->orWhere('index_satker.kodesatker', [$filter['kabupaten']]);
        $this->builder()->join('satker', 'satker.kodesatker=index_satker.kodesatker');
        return $this->builder()->get()->getResultArray();
    }
}
