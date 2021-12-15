<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Adminauthentication extends BaseController
{

    protected $authenticationModel;
    public function __construct()
    {
        $this->authenticationModel = new \App\Models\Admin_authentication();
    }

    public function index()
    {
        return view('Backend/Authentication/login_view');
    }

    // Login Valid Or Not
    public function checkLogin()
    {
        // 
        if ($this->request->getMethod() == "post") {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // Check Email Already Exist Or Not
            $result = $this->authenticationModel->where('email', $email)->where('publised', 1)->first();
            // dd($result);
            if ($result === null) {
                return redirect()->to(site_url() . "admin/login")->with('warning', "Invalid Login")->withInput();
            } else {
                if (password_verify($password, $result['password'])) {
                    session()->regenerate();
                    session()->set([
                        'admin_id' => $result['id'],
                        'name'     => $result['name'],
                        'role'     => $result['role']
                    ]);
                    return redirect()->to(site_url() . "admin/dashboard");
                } else {
                    return redirect()->to(site_url() . "admin/login")->with('warning', "Invalid Login")->withInput();
                }
            }
        }
    }
}
