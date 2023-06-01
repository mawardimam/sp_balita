<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AdminModel;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $gejalamodel = new GejalaModel();
        $penyakitmodel = new PenyakitModel();

        $g = $gejalamodel->findAll();
        $p = $penyakitmodel->findAll();

        $data = [
            'gejala' => $g,
            'penyakit' => $p,
            'title' => 'Dashboard',
        ];

        return view('pages/main', $data);
    }
}
