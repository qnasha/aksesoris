<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pesanan_id', 'pelanggan_id', 'waktu_pesanan', 'status'];

    public function createPesanan($dataPesanan, $dataItems)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $pesananId = $this->insert($dataPesanan, true);

        $itemPesananModel = new \App\Models\ItemPesananModel();
        foreach ($dataItems as $item) {
            $produkModel = new \App\Models\ProdukModel();
            $produk = $produkModel->find($item['produk_id']);


            $hargaItem = $produk['harga'] * $item['kuantitas'];

            $itemPesananData = [
                'pesanan_id' => $pesananId,
                'produk_id'  => $item['produk_id'],
                'harga'      => $hargaItem,
                'kuantitas'  => $item['kuantitas']
            ];

            $itemPesananModel->insert($itemPesananData);
        }

        $totalHarga = $itemPesananModel->selectSum('harga')
            ->where('pesanan_id', $pesananId)
            ->first()['harga'];


        $db = \Config\Database::connect();
        $builder = $db->table('pesanan');
        $builder->where('id', $pesananId);
        $builder->update(['total' => $totalHarga]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return false;
        }

        return $pesananId;
    }

    public function getAllPesanan()
    {
        return $this->select('pesanan.id as pesanan_id, pesanan.waktu_pesanan, pesanan.total, 
                          pelanggan.nama, meja.nomor_meja, pesanan.status')
            ->join('pelanggan', 'pelanggan.id = pesanan.pelanggan_id')
            ->join('meja', 'meja.id = pesanan.meja_id')
            ->findAll();
    }

    public function getPesanan($id)
    {
        return $this->select('pesanan.id as pesanan_id, pesanan.status, pesanan.total, pesanan.waktu_pesanan,
                            meja.nomor_meja, pelanggan.nama')
            ->join('meja', 'meja.id = pesanan.meja_id')
            ->join('pelanggan', 'pelanggan.id = pesanan.pelanggan_id')
            ->where('pesanan.id', $id)
            ->first();
    }
}
