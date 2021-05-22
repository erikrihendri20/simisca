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

    public function participans($kodesatker=null)
    {
        $builder = $this->db->table('lime_tokens_423492');
        if($kodesatker==null){
            return $builder->countAllResults();
        }else{
            $builder = $this->db->table('satker');
            $builder->like('kodesatker',$kodesatker,'after');
            return $builder->countAllResults();
        }
    }
    
    public function progressNasional()
    {
        $builder = $this->db->table('lime_survey_423492');
        $builder->where('submitdate!=',NULL);
        $mengisi = $builder->countAllResults();
        return round(($mengisi/$this->participans()*100),2);
    }

    // private function getSatker($kode_provinsi)
    // {
    //     $builder = $this->db->table('satker');
    //     // $this->builder()->join('index_satker', 'satker.kodesatker=index_satker.kodesatker');
    //     // $this->builder()->select('satker.kodesatker , satker.namasatker');
    //     $builder->like('satker.kodesatker', $kode_provinsi, 'after')->notLike('satker.kodesatker', '00');
    //     return $builder->countAllResults();
    // }

    public function progressProvinsi($kodesatker)
    {
        $builder = $this->db->table('lime_survey_423492');
        $builder->where('submitdate!=',NULL);
        $builder->where('423492X1X67',$kodesatker);
        $mengisi = $builder->countAllResults();
        return round(($mengisi/$this->participans($kodesatker)*100),2);
    }

    public function jawabanKuesioner()
    {
        $table = $this->showTable(date('Y'));
        if($table){
            $table1 = array_values(end($table))[0];
            $table2 = 'lime_old_survey_423492_timings_'.substr(array_values(end($table))[0],23);
            $builder = $this->db->table(end($table));
            $builder->join($table2,$table1.'.id='.$table2.'.id');
            return $builder->get()->getResultArray();
        }else{
            return;
        }
    }

    public function progressKabupaten($kodesatker)
    {
        $builder = $this->db->table('lime_survey_423492');
        $builder->select('lastpage');
        $builder->where('423492X1X68',$kodesatker);
        $builder->orderBy('lastpage','desc');
        $builder->limit(1);
        return $builder->get()->getResultArray();
    }


    public function detailProgress($kodesatker=null)
    {
        if($kodesatker==null){
            $builderSelesaiMengisi = $this->db->table('lime_survey_423492');
            $builderSelesaiMengisi->where('submitdate!=',NULL);
            $selesaiMengisi = $builderSelesaiMengisi->countAllResults();

            $builderSudahMengisi = $this->db->table('lime_survey_423492');
            $builderSudahMengisi->where('submitdate',NULL);
            $sudahMengisi = $builderSudahMengisi->countAllResults();
            
            $belumMengisi = $this->participans() - $sudahMengisi - $selesaiMengisi;

            return [
                'belum mengisi' => $belumMengisi,
                'sudah mengisi' => $sudahMengisi,
                'selesai mengisi' => $selesaiMengisi
            ];
        }
        $builderSelesaiMengisi = $this->db->table('lime_survey_423492');
        $builderSelesaiMengisi->where('submitdate!=',NULL);
        $builderSelesaiMengisi->where('423492X1X67',$kodesatker);
        $selesaiMengisi = $builderSelesaiMengisi->countAllResults();

        $builderSudahMengisi = $this->db->table('lime_survey_423492');
        $builderSudahMengisi->where('submitdate',NULL);
        $builderSudahMengisi->where('423492X1X67',$kodesatker);
        $sudahMengisi = $builderSudahMengisi->countAllResults();
        
        $belumMengisi = $this->participans($kodesatker) - $sudahMengisi - $selesaiMengisi;

        return [
            'belum mengisi' => $belumMengisi,
            'sudah mengisi' => $sudahMengisi,
            'selesai mengisi' => $selesaiMengisi
        ];
    }

    public function statusPengisianSatker($kodesatker=null)
    {
        if($kodesatker==null){
            $builder = $this->db->table('lime_survey_423492');
            $builder->select('namasatker , submitdate , lastpage');
            $builder->join('satker','kodesatker=423492X1X68','right');
            return $builder->get()->getResultArray();
        }else{
            $builder = $this->db->table('lime_survey_423492');
            $builder->select('namasatker , submitdate , lastpage');
            $builder->like('kodesatker',substr($kodesatker,0,2),'after');
            $builder->join('satker','kodesatker=423492X1X68','right');
            return $builder->get()->getResultArray();
        }
        
    }

    
    
}
