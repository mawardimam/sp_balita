<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;
use App\Models\PenyakitModel;

class RiwayatDiagnosaController extends BaseController
{
    public function index()
    {
        $diagnosaModel = new DiagnosaModel();
        $penyakitModel = new PenyakitModel();

        $diagnosas = $diagnosaModel->findAll();

        foreach ($diagnosas as &$diagnosa) {
            $penyakit = $penyakitModel->find($diagnosa['id_penyakit']);
            $diagnosa['nama_penyakit'] = $penyakit ? $penyakit['nama_penyakit'] : 'Penyakit Tidak Diketahui';
        }

        $data = [
            'Diagnosas' => $diagnosas,
            'title' => 'Riwayat Diagnosa',
        ];

        return view('pages/riwayat_diagnosa', $data);
    }
}
