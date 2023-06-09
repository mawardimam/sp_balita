<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use App\Models\GejalaModel;
use App\Models\RuleModel;

class RuleController extends BaseController
{
    public function index()
    {
        $model = new RuleModel();
        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();

        $rules = $model->select('tb_rule.*, tb_penyakit.kode_penyakit, tb_penyakit.nama_penyakit, tb_gejala.kode_gejala, tb_gejala.nama_gejala')
            ->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_rule.id_penyakit')
            ->join('tb_gejala', 'tb_gejala.id_gejala = tb_rule.id_gejala')
            ->findAll();

        $data = [
            'rule' => $rules,
            'penyakit' => $penyakitModel->findAll(),
            'gejala' => $gejalaModel->findAll(),
            'title' => 'Data Rule',
        ];

        return view('pages/data_rule', $data);
    }

    public function tambah()
    {
        $model = new RuleModel();
        // Ambil data dari modal tambah
        $namaPenyakit = $this->request->getPost('id_penyakit');
        $namaGejala = $this->request->getPost('id_gejala');
        $mb = floatval($this->request->getPost('mb'));
        $md = floatval($this->request->getPost('md'));
        $nilaiCf = $mb - $md;

        $existingRule = $model->getRuleByPenyakitGejala($namaPenyakit, $namaGejala);
        if ($existingRule !== null) {
            // Jika data rule sudah ada, set pesan alert dengan session flash data
            return redirect()->to('/data_rule')->with('warning', 'Nama penyakit atau Nama Gejala sudah ada');
        }


        if (empty($namaPenyakit) || empty($namaGejala) || empty($mb) || is_null($md)) {
            // Jika ada input yang kosong, set pesan alert dengan session flash data
            return redirect()->to('/data_rule')->with('hapus', 'Harap isi semua field');
        }

        // Simpan data ke dalam database
        $data = [
            'id_penyakit' => $namaPenyakit,
            'id_gejala' => $namaGejala,
            'mb' => $mb,
            'md' => $md,
            'cf' => $nilaiCf
        ];
        $model->insert($data);
        return redirect()->to('/data_rule')->with('success', 'Data rule berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $model = new RuleModel();
        $data = $model->find($id);
        // Hapus data dari database
        $model->delete($id);
        return redirect()->to('/data_rule')->with('hapus', 'Data rule berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new RuleModel();
        $data = $model->find($id);
        return view('modal/edit_rule', ['rule' => $data]);
    }

    public function update($id)
    {
        $model = new RuleModel();
        $data = $model->find($id);
        // Ambil data dari modal edit
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $namaGejala = $this->request->getPost('nama_gejala');
        $mb = $this->request->getPost('mb');
        $md = $this->request->getPost('md');
        $nilaiCf = $mb - $md;

        // Cek apakah ada perubahan data
        if (
            $data['id_penyakit'] == $namaPenyakit &&
            $data['id_gejala'] == $namaGejala &&
            $data['mb'] == $mb &&
            $data['md'] == $md
        ) {
            // Tidak ada perubahan data
            return redirect()->to('/data_rule')->with('warning', 'Tidak ada perubahan data');
        }

        // Simpan data ke dalam database
        $updatedData = [
            'id_penyakit' => $namaPenyakit,
            'id_gejala' => $namaGejala,
            'mb' => $mb,
            'md' => $md,
            'cf' => $nilaiCf
        ];
        $model->update($id, $updatedData);

        return redirect()->to('/data_rule')->with('success', 'Data rule berhasil diperbarui');
    }
}
