<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;

class RiwayatDiagnosaController extends BaseController
{
    public function index()
    {
        $Diagnosas = new DiagnosaModel();
        $data = [
            'Diagnosas' => $Diagnosas->findAll(),
            'title' => 'Riwayat Diagnosa',
        ];
        return view('pages/riwayat_diagnosa', $data);
    }
}
