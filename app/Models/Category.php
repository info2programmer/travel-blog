<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $allowedFields = ['category_name', 'admin_id', 'publised'];
    protected $useTimestamps = true;

    protected $validationRules    = [
        'category_name'    => 'required|alpha_numeric_space',
    ];
}
