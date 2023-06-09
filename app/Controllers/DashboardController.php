<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AdminModel;
use App\Models\DiagnosaModel;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\SolusiModel;
use App\Models\RuleModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $gejalamodel = new GejalaModel();
        $penyakitmodel = new PenyakitModel();
        $solusimodel = new SolusiModel();
        $rulemodel = new RuleModel();
        $diagnosamodel = new DiagnosaModel();

        $g = $gejalamodel->findAll();
        $p = $penyakitmodel->findAll();
        $s = $solusimodel->findAll();
        $r = $rulemodel->findAll();
        $ri = $diagnosamodel->findAll();
        $data = [
            'gejala' => $g,
            'penyakit' => $p,
            'solusi' => $s,
            'rule' => $r,
            'riwayat' => $ri,
            'title' => 'Dashboard',
        ];

        return view('pages/main', $data);
    }
}
