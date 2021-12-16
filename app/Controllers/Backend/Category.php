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
    public function _remap($method, ...$params)
    {
        if (!session()->has('admin_id')) {
            return redirect()->to(site_url() . "admin/login")->with('warning', "You must login first");
        }
        // if(...$params){

        // }
        return $this->$method(...$params);
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
    // This function for delete category
    public function deleteData($id)
    {
        $category = $this->categoryModel->find($id);

        if ($category) {
            $this->categoryModel->delete($id);
            return redirect()->to(site_url() . "admin/category-list")->with('error', "category deleted");
        } else {
            return redirect()->to(site_url() . "admin/category-list")->with('error', "no category found");
        }
    }

    // This functiuon for publish and un published
    public function changeStatus($id, $status)
    {
        $category = $this->categoryModel->find($id);
        if ($category) {
            $this->categoryModel->update($id, ['publised' => $status]);
            return redirect()->to(site_url() . "admin/category-list")->with('success', "category status updated");
        } else {
            return redirect()->to(site_url() . "admin/category-list")->with('error', "no category found");
        }
    }

    public function editCategory($id)
    {
        $category = $this->categoryModel->find($id);
        if ($category) {
            // 
            if ($this->request->getMethod() == "post") {
                $obj = [
                    'category_name' => esc($this->request->getPost('category_name'))
                ];
                $this->categoryModel->update($id, $obj);
                return redirect()->to(site_url() . "admin/category-list")->with('success', "category updated");
            }
            return view('Backend/Category/category-add-edit-view', ['data' => $category, 'mode' => 'edit']);
        } else {
            return redirect()->to(site_url() . "admin/category-list")->with('error', "no category found");
        }
    }
}
