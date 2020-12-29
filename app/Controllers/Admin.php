<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Admin extends BaseController
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
            'title' => 'Admin',
            'produk' => $produk->paginate(5, 'produk'),
            'pager' => $this->produkModel->pager,
            'currentPage' => $currentPage

        ];


        return view('admin/produk/produk', $data);
    }


    public function addProduk()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/produk/addProduk', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[produk.nama]',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => '{field} produk sudah terdaftar.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang Anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {

            return redirect()->to('/admin/produk/addProduk')->withInput();
        }


        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        // dd($fileGambar);
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();

            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        }

        // ambil nama file gambar
        $namaGambar = $fileGambar->getName();




        $kode = url_title($this->request->getVar('nama'), '-', true);
        $this->produkModel->save([
            'nama' => $this->request->getVar('nama'),
            'kode' => $kode,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin');
    }


    public function delete($id)
    {
        // cari gambar berdasarkan id
        $produk = $this->produkModel->find($id);

        // cek jika file gambarnya default
        if ($produk['gambar'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $produk['gambar']);
        }

        $this->produkModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->getProduk($id)
        ];

        return view('admin/produk/editProduk', $data);
    }

    public function update($id)
    {
        // cek judul
        $produkLama = $this->produkModel->getProduk($this->request->getVar('kode'));
        if ($produkLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[produk.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang Anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
        }

        $fileGambar = $this->request->getFile('gambar');

        // cek gambar, apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama file random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan gambar
            $fileGambar->move('img', $namaGambar);
            // hapus file yang lama
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $kode = url_title($this->request->getVar('nama'), '-', true);
        $this->produkModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'kode' => $kode,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin');
    }
}
