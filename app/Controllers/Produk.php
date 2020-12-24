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
    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('produk/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'produk' => [
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
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/produk/create')->withInput();
        }
        // dd('berhasil');


        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();

            // pindahkan file ke folder img
            $fileGambar->move('img', $namaGambar);
        }

        // ambil nama file gambar
        // $namaGambar = $fileGambar->getName();


        $kode = url_title($this->request->getVar('nama'), '-', true);
        $this->produkModel->save([
            'nama' => $this->request->getVar('nama'),
            'kode' => $kode,
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/produk');
    }



    public function delete($id)
    {
        // cari gambar berdasarkan id
        $produk = $this->produkModel->find($id);

        // cek jika file gambarnya default
        if ($produk['gambar'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $produk['gambar']);
        }

        $this->produkModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/produk');
    }


    public function edit($kode)
    {
        $data = [
            'title' => 'Form Ubah Data Produk',
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkModel->getProduk($kode)
        ];

        return view('produk/edit', $data);
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
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/produk/edit/' . $this->request->getVar('kode'))->withInput();
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
    }
}
