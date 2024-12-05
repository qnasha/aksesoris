<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemPesananModel extends Model
{
    protected $table = 'item_pesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pesanan_id', 'produk_id', 'kuantitas', 'harga'];

    public function getItemPesanan()
    {
        return $this->select('pesanan.id as pesanan_id, meja.nomor_meja, pelanggan.nama as nama_pelanggan, pesanan.status, 
                            pesanan.total, pesanan.waktu_pesanan, produk.nama,item_pesanan.kuantitas ')
            ->join('pesanan', 'pesanan.id = item_pesanan.pesanan_id')
            ->join('produk', 'produk.id = item_pesanan.produk_id')
            ->join('pelanggan', 'pelanggan.id = pesanan.pelanggan_id')
            ->join('meja', 'meja.id = pesanan.meja_id')
            ->findAll();
    }

    public function getItemPesananByPesananId($pesananId)
    {
        return $this->select('produk.nama, produk.harga, item_pesanan.kuantitas')
            ->join('produk', 'produk.id = item_pesanan.produk_id')
            ->where('item_pesanan.pesanan_id', $pesananId)
            ->findAll();
    }
}
