<?php

namespace App\Models;

use CodeIgniter\Model;

class Comments extends Model
{
    protected $table = 'blog_comments';
    protected $allowedFields = ['name', 'email', 'comment', 'blog_id', 'approved_by', 'approved_by'];
    protected $useTimestamps = true;

    protected $validationRules    = [
        'name'    => 'required',
        'email'  => 'required|valid_email',
        'comment'  => 'required',
    ];
}
