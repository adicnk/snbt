<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalMDL extends Model
{
    protected $table = 'soal';
    protected $useTimestamps = true;

    // Field yang boleh diisi waktu saving data ** harus didefinisikan dulu **
    protected $allowedFields = ['name', 'idx', 'kategori_soal_id', 'is_picture', 'picture_url', 'is_audio', 'audio_url', 'is_choosen'];

    public function searchSoal($keyword = false)
    {
        if ($keyword == false) {
            $this->table('soal');
            return $this->join('kategori_soal', 'soal.kategori_soal_id = kategori_soal.id');
        }
        $this->table('soal');
        $this->join('kategori_soal', 'soal.kategori_soal_id = kategori_soal.id');
        return  $this->like('kname', $keyword);
    }

    public function searchSoalID($id)
    {
        $this->where(['id' => $id]);
        return $this->findAll();
    }

    public function getJumlahSoal($id)
    {
        $this->where(['kategori_soal_id' => $id]);
        $this->join('kategori_soal', 'soal.kategori_soal_id = kategori_soal.id');
        return $this->countAllResults();
    }

    public function getName($id)
    {
        
        $this->where(['id' => $id]);
        $query =  $this->findAll();
        foreach ($query as $q) {
            return $q['picture_url'];
        }
    }

    public function delSoal($id)
    {
        $this->delete(['id' => $id]);
    }

    public function isChoosen()
    {
        $this->where(['is_choosen' => 1]);
        $this->join('jawaban', 'jawaban.soal_id = soal.id');
        return $this->findAll();
    }

    public function  isChoosenStatus($id) {

        $this->where(['id' => $id]);
        $query =  $this->findAll();
        foreach ($query as $q) {
            if ($q['is_choosen']==1) {
                return "on";
            } else {
                return "off";
            };
        }

    }

    public function searchJawabanSoalIdx($id, $value)
    {
        $this->where(['is_choosen' => 1]);
        $this->join('jawaban', 'jawaban.soal_id = soal.id');
        $query =  $this->findAll();
        foreach ($query as $q) {
                if ($q['jawaban_benar'] == $value) {
                    return true;
                } else {
                    return false;
                }  
        }
    }

    public function countAllUjian()
    {
        $this->where(['is_choosen' => 1]);
        return $this->countAllResults();
    }

    public function reSortIdx(){
        $db      = \Config\Database::connect();
        $builder = $db->table('soal');
        $query = $builder->get();
        $index= 0;
        foreach ($query->getResult() as $q){
            $id = $q->id; 
        
            $idx_new= $index+1;
            $builder->set('idx', $idx_new);
            $builder->where('id', $id);
        
            $builder->update();
            $index++;
        }
    }

}
