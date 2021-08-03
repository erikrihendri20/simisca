<?php

namespace App\Models;

use CodeIgniter\Model;

class Satker_model extends Model
{
    protected $table      = 'satker';
    protected $primaryKey = 'kodesatker';

    protected $returnType     = 'array';

    protected $useTimestamps = true;

    public function getSatker($level = null)
    {
        // $this->builder()->join('index_satker', 'satker.kodesatker=index_satker.kodesatker');
        // $this->builder()->select('satker.kodesatker , satker.namasatker');
        if ($level == null) {
            $this->builder()->like('satker.kodesatker', '00');
            return $this->builder()->get()->getResultArray();
        } else {
            $this->builder()->like('satker.kodesatker', $level, 'after')->notLike('satker.kodesatker', '00');
            return $this->builder()->get()->getResultArray();
        }
    }

    public function findByKodesatker($kodesatker)
    {
        $this->builder()->where('kodesatker' , $kodesatker);
        return $this->builder()->get()->getResultArray();
    }
    
}
