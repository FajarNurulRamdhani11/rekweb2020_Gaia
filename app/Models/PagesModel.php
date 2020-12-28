<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{

    protected $table = 'produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'kode', 'kategori', 'harga', 'gambar'];


    public function getPages($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $kode])->first();
    }
}
