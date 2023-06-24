<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use App\Models\RuleModel;

class PenyakitController extends BaseController
{
    public function index()
    {
        $model = new PenyakitModel();
        $data = [
            'penyakit' => $model->findAll(),
            'title' => 'Data Penyakit',
        ];
        return view('pages/data_penyakit', $data);
    }
    public function tambah()
    {
        $model = new PenyakitModel();

        // Ambil data dari modal tambah
        $kodePenyakit = $this->request->getPost('kode_penyakit');
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $deskripsi = $this->request->getPost('deskripsi');
        $solusi = $this->request->getPost('solusi');

        //validasi tambah
        $existingPenyakit = $model->where('kode_penyakit', $kodePenyakit)
            ->orWhere('nama_penyakit', $namaPenyakit)
            ->first();

        if ($existingPenyakit) {
            return redirect()->back()->with('warning', 'Kode penyakit atau nama penyakit sudah ada');
        }

        // Simpan data ke dalam database
        $data = [
            'kode_penyakit' => $kodePenyakit,
            'nama_penyakit' => $namaPenyakit,
            'deskripsi' => $deskripsi,
            'solusi' => $solusi,
        ];
        $model->insert($data);
        return redirect()->to('/data_penyakit')->with('success', 'Data penyakit berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $model = new PenyakitModel();
        // validasi hapus 
        $ruleModel = new RuleModel();
        $ruleCount = $ruleModel->where('id_penyakit', $id)->countAllResults();
        if ($ruleCount > 0) {
            return redirect()->to('/data_penyakit')->with('hapus', 'Data Penyakit tidak dapat dihapus karena masih digunakan dalam rule');
        }
        // Hapus data dari database
        $model->delete($id);
        return redirect()->to('/data_penyakit')->with('hapus', 'Data penyakit berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new PenyakitModel();
        $data = $model->find($id);
        return view('modal/edit_penyakit', ['penyakit' => $data]);
    }

    public function update($id)
    {
        $model = new PenyakitModel();
        $data = $model->find($id);
        // Ambil data dari modal edit
        $kodePenyakit = $this->request->getPost('kode_penyakit');
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $deskripsi = $this->request->getPost('deskripsi');
        $solusi = $this->request->getPost('solusi');

        // Simpan data ke dalam database
        $updatedData = [
            'kode_penyakit' => $kodePenyakit,
            'nama_penyakit' => $namaPenyakit,
            'deskripsi' => $deskripsi,
            'solusi' => $solusi,
        ];
        $model->update($id, $updatedData);

        return redirect()->to('/data_penyakit')->with('success', 'Data penyakit berhasil diperbarui');
    }
}
