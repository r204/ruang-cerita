<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'category'
    ];

    public function getAllData()
    {
        return $this->db->table('kategori')->get();
    }
    public function tambah($data)
    {
        return $this->db->table('kategori')->insert($data);
    }
}
