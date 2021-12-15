<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

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
        $categoryList = $this->categoryModel->findAll();
        return view('Backend/Category/index', ['data' => $categoryList]);
    }
}
