<?php

namespace App\Models;

use CodeIgniter\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $allowedFields = ['blog_title', 'blog_details', 'blog_image', 'youtube_link', 'category_id', 'admin_id', 'publised'];
    protected $useTimestamps = true;

    protected $validationRules    = [
        'blog_title'    => 'required',
        'blog_details'  => 'required',
        'blog_image'  => 'required',
        'category_id' => 'required',
    ];
}
