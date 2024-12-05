<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PesananModel;

class PembayaranController extends BaseController
{
    public function index()
    {
        $model = new PembayaranModel();
        $data['pembayaran'] = $model->findAll();
        return view('pembayaran/index', $data);
    }

    public function create($pesanan_id)
    {
        $data['pesanan_id'] = $pesanan_id;
        return view('pembayaran/create', $data);
    }

    public function store()
    {
        $model = new PembayaranModel();
        $model->save([
            'pesanan_id' => $this->request->getPost('pesanan_id'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'jumlah' => $this->request->getPost('jumlah')
        ]);
        return redirect()->to('/pembayaran');
    }

    public function delete($id)
    {
        $model = new PembayaranModel();
        $model->delete($id);
        return redirect()->to('/pembayaran');
    }
}
