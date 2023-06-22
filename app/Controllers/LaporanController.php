<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;

class LaporanController extends BaseController
{
    public function index()
    {
        $Diagnosas = new DiagnosaModel();
        $data = [
            'Diagnosas' => $Diagnosas->findAll(),
            'title' => 'Data Gejala',
        ];
        return view('pages/data_laporan', $data);
    }
}
