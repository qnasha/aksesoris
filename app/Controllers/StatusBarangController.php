<?php

namespace App\Controllers;

use App\Models\StatusBarangModel;

class StatusBarangController extends BaseController
{
    public function index()
    {
        $model = new StatusBarangModel();
        $data['status_barang'] = $model->findAll();
        return view('status_barang/index', $data);
    }

    public function create()
    {
        return view('status_barang/create');
    }

    public function store()
    {
        $model = new StatusBarangModel();
        $model->save([
            'nomor_pesanan' => $this->request->getPost('nomor_pesanan'),
            'total_barang' => $this->request->getPost('total_barang'),
            'status_barang' => $this->request->getPost('status_barang')
        ]);
        return redirect()->to('/status_barang');
    }

    public function edit($id)
    {
        $model = new StatusBarangModel();
        $data['status_barang'] = $model->find($id);
        return view('status_barang/edit', $data);
    }

    public function update($id)
    {
        $model = new StatusBarangModel();
        $model->update($id, [
            'nomor_pesanan' => $this->request->getPost('nomor_pesanan'),
            'total_barang' => $this->request->getPost('total_barang'),
            'status_barang' => $this->request->getPost('status_barang')
        ]);
        return redirect()->to('/status_barang');
    }

    public function delete($id)
    {
        $model = new StatusBarangModel();
        $model->delete($id);
        return redirect()->to('/status_barang');
    }
}
