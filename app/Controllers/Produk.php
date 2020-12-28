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

        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $produk = $this->produkModel->search($keyword);
        } else {
            $produk = $this->produkModel;
        }

        $data = [
            'title' => 'Shop',
            'produk' => $produk->paginate(5, 'produk'),
            'pager' => $this->produkModel->pager,
            'currentPage' => $currentPage

        ];


        return view('produk/index', $data);
    }

    public function detail($kode)
    {
        $data = [
            'title' => 'Detail Produk',
            'produk' => $this->produkModel->getProduk($kode)
        ];

        // jika komik tidak ada di label
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('nama produk ' . $kode . ' tidak ditemukan.');
        }

        return view('produk/detail', $data);
    }
}
