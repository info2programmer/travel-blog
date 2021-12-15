<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function _remap($method)
    {
        if (!session()->has('admin_id')) {
            return redirect()->to(site_url() . "admin/login")->with('warning', "You must login first");
        }
        return $this->$method();
    }

    public function index()
    {
        return view('Backend/Dashboard/index');
    }
}
