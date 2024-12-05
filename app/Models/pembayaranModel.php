<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pesanan_id', 'metode_pembayaran', 'jumlah', 'waktu_pembayaran'];
}
