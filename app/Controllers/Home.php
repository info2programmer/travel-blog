<?php

namespace App\Controllers;

use Config\Database;

class Home extends BaseController
{
    protected $blogModel;
    protected $commentModel;
    // protected $categoryModel;
    public function __construct()
    {
        $this->blogModel = new \App\Models\Blog();
        $this->commentModel = new \App\Models\Comments();
        // $this->categoryModel = new \App\Models\Category();
    }
    public function index()
    {
        $data = $this->blogModel
            ->select('admin_users.name, blogs.blog_title,blogs.blog_details,blogs.blog_image,blogs.youtube_link,blogs.created_at,category.category_name,blogs.id')
            ->join('category', 'category.id = blogs.category_id', 'INNER')
            ->join('admin_users', 'admin_users.id = blogs.admin_id', 'INNER')->findAll();

        // dd($this->blogModel->getLastQuery()->getQuery());
        return view('welcome_message', ['blogList' => $data]);
    }


    public function countComment($blogId)
    {
        $blog = $this->blogModel->find($blogId);

        if ($blog) {
            $data = $this->commentModel->selectCount('id')->where('publised', 1)->where('blog_id', $blogId)->first();
            echo $data['id'];
        } else {
            echo 0;
        }
    }

    public function image($img)
    {
        $path = WRITEPATH . 'uploads/blogs/' . $img;
        $finfo = new \finfo(FILEINFO_MIME);
        $type = $finfo->file($path);
        header("Content-Type: $type");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }
}
