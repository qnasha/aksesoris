<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel(); // Inisialisasi model di konstruktor
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll(); // Mengambil semua kategori
        return view('kategori/index', $data);
    }

    public function create()
    {
        return view('kategori/create'); // Menampilkan form untuk menambah kategori
    }

    public function store()
    {
        $this->kategoriModel->save(['nama' => $this->request->getPost('nama')]); // Menyimpan kategori baru
        return redirect()->to('/kategori'); // Redirect setelah menyimpan
    }

    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id); // Mengambil kategori berdasarkan ID
        return view('kategori/edit', $data); // Menampilkan form edit
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, ['nama' => $this->request->getPost('nama')]); // Memperbarui kategori
        return redirect()->to('/kategori'); // Redirect setelah update
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id); // Menghapus kategori
        return redirect()->to('/kategori'); // Redirect setelah menghapus
    }
}
