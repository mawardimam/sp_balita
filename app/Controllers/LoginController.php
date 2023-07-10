<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class LoginController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login'; // Menyertakan judul halaman
        return view('pages/login', $data);
    }

    public function prosesLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->back()->with('hapus', 'Harap isi semua field');
        }

        $model = new AdminModel();
        $tb_user = $model->validateLogin($username, $password);

        if ($tb_user !== null) {
            $session = session();
            $session->set([
                'id_user' => $tb_user['id_user'],
                'username' => $tb_user['username'],
                'nama' => $tb_user['nama']
            ]);

            $session->setFlashdata('success', 'Selamat datang, admin');

            return redirect()->to('/main');
        } else {
            return redirect()->back()->with('hapus', 'Username atau password salah')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
