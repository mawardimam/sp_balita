<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

helper('session');

class Login extends BaseController
{
    public function index()
    {
        return view('pages/login');
    }

    public function prosesLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AdminModel();
        $tb_user = $model->validateLogin($username, $password);
        if ($tb_user !== null) {
            $session = session();
            $session->set([
                'id_user' => $tb_user['id_user'],
                'username' => $tb_user['username'],
                'nama' => $tb_user['nama']
            ]);
            return redirect()->to('/main');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah')->withInput();
        }
    }

    public function logout()
    {
        // Hapus sesi pengguna
        session()->destroy();

        // Arahkan pengguna ke halaman login
        return redirect()->to('/login');
    }
}
