<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = 'status_publikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'status'
    ];
}
