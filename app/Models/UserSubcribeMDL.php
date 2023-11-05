<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSubcribeMDL extends Model
{
    protected $table = 'user_subcribe';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['user_id', 'subcribe_id', 'kategpri_soal_id', 'total', 'is_buy', 'is_request', 'is_message', 'is_confirm'];

    public function totalSoal($user,$cat){
        $this->where(['subcribe_id' => $user]);
        $this->where(['kategori_soal_id' => $cat]);
        $query = $this->findAll();
        foreach ($query as $q){
            return $q['total'];
        }
    }
    
}
