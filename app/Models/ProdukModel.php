<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{

    protected $table = 'produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'kode', 'kategori', 'harga', 'gambar'];


    public function getProduk($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $kode])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('produk');
        // $builder->like('nama', $keyword);
        // return $builder;
        return $this->table('produk')->like('nama', $keyword)->orLike('kategori', $keyword);
    }
}
