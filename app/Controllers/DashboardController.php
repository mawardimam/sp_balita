<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AdminModel;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\RuleModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $gejalamodel = new GejalaModel();
        $penyakitmodel = new PenyakitModel();
        $rulemodel = new RuleModel();

        $g = $gejalamodel->findAll();
        $p = $penyakitmodel->findAll();
        $r = $rulemodel->findAll();
        $data = [
            'gejala' => $g,
            'penyakit' => $p,
            'rule' => $r,
            'title' => 'Dashboard',
        ];

        return view('pages/main', $data);
    }
}
