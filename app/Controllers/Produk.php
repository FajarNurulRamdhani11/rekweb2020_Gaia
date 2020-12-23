<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {

        $produk = $this->produkModel->findAll();

        $data = [
            'title' => 'Daftar Produk',
            'produk' => $produk
        ];


        return view('produk/index', $data);
    }
}
