<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Pages extends BaseController
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
            'title' => 'Home',
            'produk' => $produk->paginate(3, 'produk'),
            'pager' => $this->produkModel->pager,
            'currentPage' => $currentPage

        ];


        return view('pages/home', $data);
    }

    // public function about()
    // {
    //     $data = [
    //         'title' => 'About Me '
    //     ];

    //     return view('pages/about', $data);
    // }

    // public function contact()
    // {
    //     $data = [
    //         'title' => 'Contact Us',
    //         'alamat' => [
    //             [
    //                 'tipe' => 'rumah',
    //                 'alamat' => 'Jl. abc No. 123',
    //                 'kota' => 'Bandung'
    //             ],
    //             [
    //                 'tipe' => 'kantor',
    //                 'alamat' => 'Jl. cde No. 123',
    //                 'kota' => 'Bandung'
    //             ]
    //         ]
    //     ];

    //     return view('pages/contact', $data);
    // }
    //--------------------------------------------------------------------

}
