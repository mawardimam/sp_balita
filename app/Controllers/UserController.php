<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        return view('pages/data_user'); // Memuat tampilan 'services.php' dengan data yang diberikan
    }
    public function tambah()
    {
        return view('pages/tambah_user'); // Memuat tampilan 'services.php' dengan data yang diberikan
    }
}
