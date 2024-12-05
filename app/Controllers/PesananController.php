<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\MejaModel;
use App\Models\PelangganModel;
use App\Models\ItemPesananModel;
use App\Models\ProdukModel;

class PesananController extends BaseController
{
    public function index()
    {

        $pesananModel = new PesananModel();
        $itemPesananModel = new ItemPesananModel();

        $pesananList = $pesananModel->getAllPesanan();

        foreach ($pesananList as &$pesanan) {
            $pesanan['detail'] = $itemPesananModel->getItemPesananByPesananId($pesanan['pesanan_id']);
        }

        return view('pesanan/index', ['items' => $pesananList]);
    }

    public function create()
    {
        $status_barangModel = new status_barangModel();
        $pelangganModel = new PelangganModel();
        $produkModel = new ProdukModel();
        $data['status_barang'] = $status_barangModel->findAll();
        $data['pelanggan'] = $pelangganModel->findAll();
        $data['produk'] = $produkModel->findAll();
        return view('pesanan/create', $data);
    }

    public function store()
    {
        $model = new \App\Models\PesananModel();

        $status_barang = $this->request->getPost('pesanan_id');
        $pelanggan = $this->request->getPost('pelanggan_id');
        $produk = $this->request->getPost('produk_id');
        $kuantitas = $this->request->getPost('kuantitas');

        $convertPesanan = (int)$model;
        $convertPelanggan = (int)$pelanggan;

        $Pesanan = [
            'pelanggan_id' => $convertPelanggan,
            'pesanan_id' => $convertPesanan,
            'status' => 'pending'
        ];

        $detail = [];
        foreach ($produk as $produk_id) {
            if (!empty($kuantitas[$produk_id])) {
                $convertProduk = (int)$produk_id;
                $convertKuantitas = (int)$kuantitas[$produk_id];

                $detail[] = [
                    'produk_id' => $convertProduk,
                    'kuantitas' => $convertKuantitas,
                ];
            }
        }

        $dataPesanan = $model->createPesanan($model, $detail);

        // dd($dataPesanan);

        return redirect()->to('/pesanan');
    }
    public function detail($id)
    {
        $pesananModel = new PesananModel();
        $itemPesananModel = new ItemPesananModel();

        $dataDetail = $pesananModel->getPesanan($id);
        $dataDetail['detail'] = $itemPesananModel->getItemPesananByPesananId($id);
        return view('pesanan/detail', ['items' => $dataDetail]);
    }


    public function edit($id)
    {
        $model = new PesananModel();
        $data['pesanan'] = $model->find($id);
        return view('pesanan/edit', $data);
    }

    public function update($id)
    {
        $model = new PesananModel();
        $model->update($id, [
            'status' => $this->request->getPost('status')
        ]);
        return redirect()->to('/pesanan');
    }

    public function delete($id)
    {
        $model = new PesananModel();
        $model->delete($id);
        return redirect()->to('/pesanan');
    }
}
