<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSubcribeMDL extends Model
{
    protected $table = 'user_subcribe';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['subcribe_id', 'kategpri_soal_id', 'total'];

    public function totalSoal($id){
        $this->where('id' => $id);
        $this->join('kategori_soal', 'kategori_soal.id = kategori_soal_id', 'left');
        $this->findAll();
    }
    
}
