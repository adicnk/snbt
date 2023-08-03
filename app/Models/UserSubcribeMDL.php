<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSubcribeMDL extends Model
{
    protected $table = 'user_subcribe';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['user_id', 'subcribe_id', 'kategpri_soal_id', 'total'];

    public function totalSoal($id){
        $this->where(['subcribe_id' => $id]);
        $this->join('kategori_soal', 'kategori_soal.id = kategori_soal_id', 'left');
        $query = $this->findAll();
        foreach ($query as $q){
            return $q['total'];
        }
    }
    
}
