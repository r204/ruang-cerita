<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primarykey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['judul', 'slug', 'author', 'body', 'img1', 'created_at', 'updated_at', 'category', 'img2', 'status'];
    protected $useTimestamps = true;
    protected $useSoftDeletes   = false;

    public function getArtikel($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    function show_category()
    {
        $builder = $this->db->table('artikel');
        //$builder->select('judul', 'slug', 'body', 'img1', 'created_at', 'updated_at', 'category', 'img2', 'status');
        $builder->join('kategori', 'kategori.id = artikel.category');
        $builder->join('status_publikasi', 'status_publikasi.id = artikel.status');
        //$builder->where('is_admin', 1);
        $query   = $builder->get();
        return $query->getResult();
    }
}
