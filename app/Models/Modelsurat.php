<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsurat extends Model
{
    protected $table            = 'surat';
    protected $primaryKey       = 'surat_kode';
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'surat_nama', 'id_penerima', 'surat_status', 'surat_catatan', 'surat_gambar'
    ];

    public function tampildata()
    {
        return $this->table('surat')->join('kategori', 'id_penerima=katid')->get();
    }
}