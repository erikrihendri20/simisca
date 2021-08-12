<?php

namespace App\Models;

use CodeIgniter\Model;

class Participan_model extends Model
{
    protected $table      = 'lime_tokens_423492';
    protected $primaryKey = 'id';

    public function getParticipan($email){
        $this->builder()->where('email' , $email);
        return $this->builder()->get()->getResultArray();
    }

    public function emptyTable()
    {
        $this->builder()->emptyTable();
    }

}
