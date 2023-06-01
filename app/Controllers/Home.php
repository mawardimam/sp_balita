<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('landing_page/landing_page'); // Memuat tampilan 'services.php' dengan data yang diberikan
    }
}
