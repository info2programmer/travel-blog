<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;

class Blog extends BaseController
{
    protected $blogModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->blogModel = new \App\Models\Blog();
        $this->categoryModel = new \App\Models\Category();
    }

    public function _remap($method, ...$params)
    {
        if (!session()->has('admin_id')) {
            return redirect()->to(site_url() . "admin/login")->with('warning', "You must login first");
        }
        // if(...$params){

        // }
        return $this->$method(...$params);
    }

    // This function for get blog list
    public function index()
    {
        $blogData = $this->blogModel
            ->select('blogs.blog_title,blogs.created_at,blogs.updated_at,blogs.publised,blogs.id, category.category_name,admin_users.name')
            ->join('category', 'category.id = blogs.category_id', 'INNER')
            ->join('admin_users', 'admin_users.id = blogs.admin_id', 'INNER')
            ->findAll();
        // dd($this->blogModel->getLastQuery()->getQuery());
        return view('Backend/Blog/blog_list_view', ['data' => $blogData]);
    }


    // This function for create new blog
    public function createBlog()
    {
        if ($this->request->getMethod() == "post") {

            $blog_title = esc($this->request->getPost('blog_title'));
            $blog_details = $this->request->getPost('blog_details');
            $blog_image = '';
            $youtube_link = $this->request->getPost('youtube_link');
            $category_id = $this->request->getPost('category_id');
            $admin_id = session('admin_id');


            $file = $this->request->getFile('blog_image');

            if (!$file->isValid()) {

                $error_code = $file->getError();

                if ($error_code == UPLOAD_ERR_NO_FILE) {

                    return redirect()->to('admin/blog-add')
                        ->with('warning', 'No file selected');
                }

                throw new \RuntimeException($file->getErrorString() . " " . $error_code);
            }

            $size = $file->getSizeByUnit('mb');

            if ($size > 2) {

                return redirect()->to('admin/blog-add')
                    ->with('warning', 'File too large (max 2MB)');
            }

            $type = $file->getMimeType();

            if (!in_array($type, ['image/png', 'image/jpeg'])) {

                return redirect()->to('admin/blog-add')
                    ->with('warning', 'Invalid file format (PNG or JPEG only)');
            }

            $path = $file->store('blogs');

            $path = WRITEPATH . 'uploads/' . $path;

            service('image')
                ->withFile($path)
                ->fit(440, 220, 'center')
                ->save($path);

            $blog_image = $file->getName();

            $obj = [
                'blog_title' => $blog_title,
                'blog_details' => $blog_details,
                'blog_image' => $blog_image,
                'youtube_link' => $youtube_link,
                'category_id' => $category_id,
                'admin_id'  => $admin_id,
                'publised' => 1
            ];

            if ($this->blogModel->insert($obj)) {
                return redirect()->to('admin/blog-list');
            } else {
                return redirect()->to('admin/blog-add')
                    ->with('errors', $this->blogModel->errors());
            }
        }

        $category = $this->categoryModel->where('publised', 1)->findAll();
        // dd($this->categoryModel->getLastQuery()->getQuery());
        return view('Backend/Blog/blog-add-edit-view', ['category' => $category]);
    }

    public function editBlog($id)
    {
        $blog = $this->blogModel->find($id);

        if ($blog) {
            if ($this->request->getMethod() == "post") {

                $blog_title = esc($this->request->getPost('blog_title'));
                $blog_details = $this->request->getPost('blog_details');
                $blog_image = $blog['blog_image'];
                $youtube_link = $this->request->getPost('youtube_link');
                $category_id = $this->request->getPost('category_id');


                $file = $this->request->getFile('blog_image');

                if ($file->isValid()) {

                    // Unlink Old Image
                    $path = WRITEPATH . 'uploads/blogs/' . $blog_image;
                    if (is_file($path)) {
                        unlink($path);
                    }

                    $size = $file->getSizeByUnit('mb');

                    if ($size > 2) {

                        return redirect()->to('admin/blog-add')
                            ->with('warning', 'File too large (max 2MB)');
                    }

                    $type = $file->getMimeType();

                    if (!in_array($type, ['image/png', 'image/jpeg'])) {

                        return redirect()->to('admin/blog-add')
                            ->with('warning', 'Invalid file format (PNG or JPEG only)');
                    }

                    $path = $file->store('blogs');

                    $path = WRITEPATH . 'uploads/' . $path;

                    service('image')
                        ->withFile($path)
                        ->fit(440, 220, 'center')
                        ->save($path);

                    $blog_image = $file->getName();
                }



                $obj = [
                    'blog_title' => $blog_title,
                    'blog_details' => $blog_details,
                    'blog_image' => $blog_image,
                    'youtube_link' => $youtube_link,
                    'category_id' => $category_id,
                ];

                if ($this->blogModel->update($id, $obj)) {
                    return redirect()->to('admin/blog-list');
                } else {
                    return redirect()->to('admin/blog-list')
                        ->with('errors', $this->blogModel->errors());
                }
            }

            $category = $this->categoryModel->where('publised', 1)->findAll();
            // $img = $this->image($blog['blog_image']);
            return view('Backend/Blog/blog-add-edit-view', ['category' => $category, 'mode' => 'edit', 'data' => $blog]);
        } else {
            return redirect()->to('admin/blog-list')->with('error', 'No blog found');
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


    public function changeStatus($id, $status)
    {
        $category = $this->blogModel->find($id);
        if ($category) {
            $this->blogModel->update($id, ['publised' => $status]);
            return redirect()->to(site_url() . "admin/blog-list")->with('success', "blog status updated");
        } else {
            return redirect()->to(site_url() . "admin/blog-list")->with('error', "no blog found");
        }
    }


    public function deleteData($id)
    {
        $blog = $this->blogModel->find($id);

        if ($blog) {
            $path = WRITEPATH . 'uploads/blogs/' . $blog['blog_image'];
            if (is_file($path)) {
                unlink($path);
            }
            $this->blogModel->delete($id);
            return redirect()->to(site_url() . "admin/blog-list")->with('error', "blog deleted");
        } else {
            return redirect()->to(site_url() . "admin/blog-list")->with('error', "no blog found");
        }
    }
}
