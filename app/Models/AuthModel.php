<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'is_admin'
    ];

    function show_admin()
    {
        $builder = $this->db->table('users');
        //$builder->select('users.id, users.nama, users.email, jurusan.id as jurusan_id, jurusan.nama as jurusan');
        //$builder->join('jurusan', 'jurusan.id = users.id_jurusan');
        $builder->where('is_admin', 1);
        $query   = $builder->get();
        return $query->getResult();
    }
}
