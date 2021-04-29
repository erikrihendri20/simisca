<?php

namespace App\Models;

use CodeIgniter\Model;

class Survei_model extends Model
{
    protected $table      = 'lime_tokens_423492';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $useTimestamps = true;
    public function getToken($email)
    {
        $this->builder()->like('email', $email)->orLike('attribute_1', $email);
        $this->builder()->select('token');
        return $this->builder()->get()->getResultArray();
    }


    public function showTable($tahun)
    {
        $query = "SHOW TABLES LIKE '%lime_old_survey_423492_".$tahun."%'";
        $table = $this->db->query($query);
        return $table->getResultArray();
    }

    public function participans()
    {
        $builder = $this->db->table('lime_tokens_423492');
        return $builder->countAllResults();
    }
    
    public function progressNasional()
    {
        $builder = $this->db->table('lime_survey_423492');
        $builder->where('submitdate',!NULL);
        $finish = $builder->countAllResults();
        return [$finish , $this->participans()-$finish];
    }

    private function getSatker($kode_provinsi)
    {
        $builder = $this->db->table('satker');
        // $this->builder()->join('index_satker', 'satker.kodesatker=index_satker.kodesatker');
        // $this->builder()->select('satker.kodesatker , satker.namasatker');
        $builder->like('satker.kodesatker', $kode_provinsi, 'after')->notLike('satker.kodesatker', '00');
        return $builder->countAllResults();
    }
    
    public function progressProvinsi($kode_provinsi)
    {
        return $this->getSatker($kode_provinsi);
    }
}
