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

    public function monitor($status)
    {
        if ($status == 'selesai')
            $this->builder()->where('submitdate!=', null);
        elseif ($status == 'selesai sebagian')
            $this->builder()->where('submitdate=', null);
        return $this->builder()->countAllResults();
    }
}
