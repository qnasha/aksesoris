<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model // Use PascalCase
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'harga', 'kategori_id', 'dibuat_pada'];
}
