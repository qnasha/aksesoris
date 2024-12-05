<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusBarangModel extends Model
{
    protected $table = 'status_barang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor_pesanan', 'total_barang', 'status_barang'];
}
