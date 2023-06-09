<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CFUserModel;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\DiagnosaGejalaModel;
use App\Models\DiagnosaModel;
use App\Models\RuleModel;

class DiagnosaController extends BaseController
{
    public function index()
    {
        $diagnosa = new DiagnosaModel();
        $cfUserModel = new CFUserModel();
        $gejala = new GejalaModel();

        $data['result'] = $diagnosa->findAll();
        $data['result'] = $gejala->findAll();
        $data['listCFUser'] = $cfUserModel->findAll();

        return view('diagnosa/index', $data);
    }

    public function start()
    {
        $ruleModel = new RuleModel();
        $diagnosaModel = new DiagnosaModel();
        $diagnosaGejalaModel = new DiagnosaGejalaModel();
        $gejalaModel = new GejalaModel();
        $penyakitModel = new PenyakitModel();
        $CFUserModel = new CFUserModel();

        $username = $this->request->getVar('nama_balita');
        $namaOrtu = $this->request->getVar('nama_ortu');
        $usia = $this->request->getVar('usia');
        $alamat = $this->request->getVar('alamat');
        $tanggal = $this->request->getVar('tanggal');
        $listSelectedGejala = $this->request->getVar('selectedGejala');
        $listCF = $this->request->getVar('cf');

        if (empty($listSelectedGejala) || empty($listCF)) {
            return redirect()->to('mulai_diagnosa')->withInput()->with('hapus', 'Pilih Gejala Minimal 1 disertakan dengan tingkat kepercayaannya');
        }

        if (empty($username) || empty($namaOrtu)) {
            return redirect()->back()->withInput()->with('hapus', 'Mohon lengkapi data diri sebelum melanjutkan.'); // Redirect kembali ke halaman sebelumnya dengan pesan alert
        }

        $mergedData = array();
        foreach ($listSelectedGejala as $key => $idGejala) {
            $cfUserId = $listCF[$key];

            $cfKepercayaan = $CFUserModel->where('id', $cfUserId)->first();

            $mergedData[$key] = [
                'id_gejala' => $idGejala,
                'tingkat_kepercayaan' => $cfKepercayaan['nama_nilai'],
                'cf_user' => $cfKepercayaan['cf'],
            ];
        }

        $cf = array();
        $listGejala = array();

        for ($i = 0; $i < count($mergedData); $i++) {
            $val = $mergedData[$i];
            $relation = $ruleModel->where('id_gejala', $val['id_gejala'])->findAll();
            $gejala = $gejalaModel->where('id_gejala', $val['id_gejala'])->first();

            if ($relation != null && count($relation) > 0) {
                $listGejalaValue['id_gejala'] = $gejala['id_gejala'];
                $listGejalaValue['kode_gejala'] = $gejala['kode_gejala'];
                $listGejalaValue['nama_gejala'] = $gejala['nama_gejala'];
                $listGejalaValue['tingkat_kepercayaan'] = $val['tingkat_kepercayaan'];
                $listGejalaValue['cf_user'] = $val['cf_user'];
                $listGejalaValue['nilai_cf'] = 0;
                $listGejalaValue['id_penyakit'] = 0;

                for ($r = 0; $r < count($relation); $r++) {
                    $gejala = $gejalaModel->where('id_gejala', $relation[$r]['id_gejala'])->first();

                    $value['id_gejala'] = $gejala['id_gejala'];
                    $value['kode_gejala'] = $gejala['kode_gejala'];
                    $value['nama_gejala'] = $gejala['nama_gejala'];
                    $value['tingkat_kepercayaan'] = $val['tingkat_kepercayaan'];
                    $value['cf_user'] = $val['cf_user'];
                    $value['nilai_cf'] = 0;
                    $value['id_penyakit'] = 0;

                    $value['id_penyakit'] = $relation[$r]['id_penyakit'];
                    $value['nilai_cf'] = $val['cf_user'] * $relation[$r]['cf'];

                    $listGejalaValue['nilai_cf'] = $val['cf_user'] * $relation[$r]['cf'];
                    $listGejalaValue['id_penyakit'] = $val['cf_user'] * $relation[$r]['cf'];

                    array_push($cf, $value);
                }

                array_push($listGejala, $listGejalaValue);
            }
        }

        /// TODO
        // Perhitungan CF Combine
        $cfCombine = 0;

        $groupByPenyakit = array();

        foreach ($cf as $apa) {
            $groupByPenyakit[$apa['id_penyakit']][] = $apa;
        }

        $anyar = array();

        if (count($cf) > 1) {
            for ($i = 0; $i < count($cf) - 1; $i++) {
                $jos = $groupByPenyakit[$cf[$i]['id_penyakit']];

                if (count($jos) > 1) {
                    for ($j = 0; $j < count($jos); $j++) {
                        $gandos = $jos[$j];

                        if ($j == 0) {
                            $cfCombine = $gandos['nilai_cf'] + $jos[$j + 1]['nilai_cf'] * (1.0 - $gandos['nilai_cf']);

                            if (count($jos) - 1 == 1) {
                                $anyar[$i]["nilai_cf"] = $cfCombine;
                                $anyar[$i]["id_penyakit"] = $cf[$i]['id_penyakit'];
                                break;
                            }
                        } else {
                            if ($j + 1 == count($jos)) {
                                $anyar[$i]["nilai_cf"] = $cfCombine;
                                $anyar[$i]["id_penyakit"] = $cf[$i]['id_penyakit'];
                                break;
                            }
                            $cfCombine = $cfCombine + $jos[$j + 1]['nilai_cf'] * (1.0 - $cfCombine);
                        }
                    }
                } else {
                    $cfCombine = $cf[$i]['nilai_cf'];
                    $anyar[$i]["nilai_cf"] = $cfCombine;
                    $anyar[$i]["id_penyakit"] = $cf[$i]['id_penyakit'];
                }
            }
        } else {
            $cfCombine = $cf[0]['nilai_cf'];
            $anyar[0]["nilai_cf"] = $cfCombine;
            $anyar[0]["id_penyakit"] = $cf[0]['id_penyakit'];
        }

        for ($i = 0; $i < (count($anyar) - count($cf)); $i++) {
            unset($anyar[$i]);
        }

        $nilaiPenyakitTerbesar = max($anyar)['nilai_cf'];
        $idPenyakitTerbesar = max($anyar)['id_penyakit'];

        // Ambil data penyakit dengan CF terbesar
        // Ambil deskripsi dan solusi penyakit
        $penyakitData = $penyakitModel->find($idPenyakitTerbesar);
        $kodePenyakit = $penyakitData['kode_penyakit'];
        $namaPenyakit = $penyakitData['nama_penyakit'];
        $deskripsi = $penyakitData['deskripsi'];
        $solusi = $penyakitData['solusi'];

        // Simpan diagnosa dengan id_penyakit yang sesuai
        $diagnosaModel->save([
            'id_penyakit' => $idPenyakitTerbesar,
            'nama_balita' => $username,
            'nama_ortu' => $namaOrtu,
            'usia' => $usia,
            'alamat' => $alamat,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'solusi' => $solusi,
            'kode_penyakit' => $kodePenyakit,
            'nilai_cf' => $nilaiPenyakitTerbesar,
            'presentase' => number_format($nilaiPenyakitTerbesar * 100, 2),
        ]);

        $diagnosaGejala = array();

        foreach ($cf as $val) {
            array_push($diagnosaGejala, [
                'id_diagnosa' => $diagnosaModel->getInsertID(),
                'id_gejala' => $val['id_gejala'],
            ]);
        }
        $diagnosaGejalaModel->insertBatch($diagnosaGejala);
        // hasil diagnosa
        $resultDiagnosa = [
            'nama_balita' => $username,
            'nama_ortu' => $namaOrtu,
            'usia' => $usia,
            'alamat' => $alamat,
            'tanggal' => $tanggal,
            'tingkat_kepercayaan' => $nilaiPenyakitTerbesar,
            'gejala' => $listGejala,
            'deskripsi' => $deskripsi,
            'solusi' => $solusi,
            'presentase' => number_format($nilaiPenyakitTerbesar * 100, 2),
            'nama_penyakit' => $namaPenyakit,
            'kode_penyakit' => $kodePenyakit,
        ];

        $data['resultDiagnosa'] = $resultDiagnosa;
        return view('diagnosa/hasil', $data);
    }
}
