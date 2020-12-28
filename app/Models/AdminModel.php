<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{

    protected $table = 'produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'kode', 'kategori', 'harga', 'gambar'];


    public function getAdmin($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $kode])->first();
    }

    public function search($keyword)
    {
        return $this->table('produk')->like('nama', $keyword)->orLike('kategori', $keyword);
    }
}
