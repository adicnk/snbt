<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriMDL extends Model
{

    protected $table = 'kategori_soal';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['id','kname', 'jumlah_soal', 'is_buy', 'price', 'is_request'];

    public function saveJumlah($sel, $val)
    {
        $this->where(['id' => $sel]);
        $this->set('jumlah_soal', $val);
        $this->update();
        return;
    }
}
