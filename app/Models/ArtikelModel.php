<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primarykey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['judul', 'slug', 'body', 'img1', 'created_at', 'updated_at', 'category', 'img2', 'status'];
    protected $useTimestamps = true;
    protected $useSoftDeletes   = false;

    public function getArtikel($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
