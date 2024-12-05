<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;


class ProdukController extends BaseController
{
    protected $produkModel;
    protected $kategoriModel; // Declare kategoriModel as a property for consistency

    public function __construct()
    {
        $this->produkModel = new ProdukModel(); // Use PascalCase
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $produk = $this->produkModel->findAll();
        $kategori = $this->kategoriModel->findAll(); // Mengambil semua kategori
        return view('produk/index', [
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        // Mengambil semua kategori dari model
        $data['kategori'] = $this->kategoriModel->findAll();

        // Mengembalikan tampilan dengan data kategori
        return view('produk/create', $data);
    }


    public function store()
    {
        $this->produkModel->save([ // Use the class instance
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'kategori_id' => $this->request->getPost('kategori_id')
        ]);
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id); // Use the class instance
        $data['kategori'] = $this->kategoriModel->findAll(); // Use the class instance
        return view('produk/edit', $data);
    }

    public function update($id)
    {
        $this->produkModel->update($id, [ // Use the class instance
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'kategori_id' => $this->request->getPost('kategori_id')
        ]);
        return redirect()->to('/produk');
    }

    public function delete($id)
    {
        $this->produkModel->delete($id); // Use the class instance
        return redirect()->to('/produk');
    }
}
