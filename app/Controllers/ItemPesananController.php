<?php

namespace App\Controllers;

use App\Models\ItemPesananModel;
use App\Models\ProdukModel;

class ItemPesananController extends BaseController
{
    public function index()
    {
        $model = new ItemPesananModel();


        $data['items'] = $model->findAll();


        return view('item_pesanan/index', $data);
    }
    public function detail($pesanan_id)
    {
        $model = new ItemPesananModel();
        $produkModel = new ProdukModel();

        $data['items'] = $model->where('pesanan_id', $pesanan_id)->findAll();
        $data['produk'] = $produkModel->findAll();
        $data['pesanan_id'] = $pesanan_id;
    }

    public function create($pesanan_id)
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        $data['pesanan_id'] = $pesanan_id;

        return view('item_pesanan/create', $data);
    }


    public function store()
    {
        $model = new ItemPesananModel();


        $data = [
            'pesanan_id' => $this->request->getPost('pesanan_id'),
            'produk_id' => $this->request->getPost('produk_id'),
            'kuantitas' => $this->request->getPost('kuantitas'),
            'harga' => $this->request->getPost('harga')
        ];


        $model->save($data);


        return redirect()->to('/item_pesanan' . $this->request->getPost('pesanan_id'));
    }

    public function delete($id)
    {
        $model = new ItemPesananModel();


        $item = $model->find($id);
        if ($item) {
            $model->delete($id);


            session()->setFlashdata('success', 'Item berhasil dihapus.');
            return redirect()->to('/item_pesanan/' . $item['pesanan_id']);
        } else {

            session()->setFlashdata('error', 'Item tidak ditemukan.');
            return redirect()->to('/item_pesanan');
        }
    }
}
