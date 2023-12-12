<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbarang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'brgkode';
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'brgnama', 'id_penerima', 'brgstatus', 'brgcatatan', 'brggambar'
    ];

    public function tampildata()
    {
        return $this->table('barang')->join('kategori', 'id_penerima=katid')->get();
    }
}