<?php

namespace App\Controllers;

use App\Models\GejalaModel;

class HomeController extends BaseController
{
    public function index()
    {
        return view('landing_page/landing_page'); 
    }
}