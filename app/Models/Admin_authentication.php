<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_authentication extends Model
{
    protected $table = 'admin_users';
    protected $allowedFields = ['email', 'password'];
    protected $useTimestamps = true;

    protected $validationRules    = [
        'email'    => 'required|valid_email',
        'password' => 'required|min_length[8]'
    ];
}
