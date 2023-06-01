<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TemplateController extends BaseController
{
    public function index()
    {
        return view('main');
    }
}
