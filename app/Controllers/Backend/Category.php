<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;

class Category extends BaseController
{
    protected $categoryModel;
    public function __construct()
    {
        $this->categoryModel = new \App\Models\Category();
    }
    public function _remap($method)
    {
        if (!session()->has('admin_id')) {
            return redirect()->to(site_url() . "admin/login")->with('warning', "You must login first");
        }
        return $this->$method();
    }

    public function index()
    {
        $categoryList = $this->categoryModel
            ->select('category.*,admin_users.name')
            ->join('admin_users', 'admin_users.id = category.admin_id', 'INNER')
            ->findAll();

        // dd($this->categoryModel->getLastQuery()->getQuery());
        return view('Backend/Category/index', ['data' => $categoryList]);
    }

    // This function for crate new category
    public function createCategory()
    {
        if ($this->request->getMethod() == "post") {
            $obj = [
                'category_name' => $this->request->getPost('category_name'),
                'admin_id'      => session('admin_id'),
                'publised'      => 1
            ];
            // dd($obj);
            if (!$this->categoryModel->insert($obj)) {
                return redirect()->to(site_url() . "admin/category-add")->with('errors', $this->categoryModel->errors())->withInput();
            } else {
                return redirect()->to(site_url() . "admin/category-list")->with('success', 'new category added');
            }
        }
        return view('Backend/Category/category-add-edit-view');
    }
}
