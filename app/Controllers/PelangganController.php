<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    public function index()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->findAll();
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        return view('pelanggan/create');
    }

    public function store()
    {
        $model = new PelangganModel();

        // Validasi input
        $this->validate([
            'nama' => 'required|min_length[3]|max_length[255]',
        ]);

        $model->save(['nama' => $this->request->getPost('nama')]);
        return redirect()->to('/pelanggan');
    }

    public function edit($id)
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->find($id);

        // Cek apakah pelanggan ditemukan
        if (!$data['pelanggan']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pelanggan tidak ditemukan');
        }

        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $model = new PelangganModel();

        // Validasi input
        $this->validate([
            'nama' => 'required|min_length[3]|max_length[255]',
        ]);

        $model->update($id, ['nama' => $this->request->getPost('nama')]);
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $model = new PelangganModel();
        $model->delete($id);
        return redirect()->to('/pelanggan');
    }
}
