<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\RuleModel;

class GejalaController extends BaseController
{
    public function index()
    {
        $model = new GejalaModel();
        $data = [
            'gejala' => $model->findAll(),
            'title' => 'Data Gejala',
        ];
        return view('pages/data_gejala', $data); // Memuat tampilan 'data_gejala.php' dengan data yang diberikan
    }

    public function tambah()
    {
        $model = new GejalaModel();

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_gejala' => 'required',
            'nama_gejala' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ambil data dari form
        $kodeGejala = $this->request->getPost('kode_gejala');
        $namaGejala = $this->request->getPost('nama_gejala');

        // Simpan data ke dalam database
        $data = [
            'kode_gejala' => $kodeGejala,
            'nama_gejala' => $namaGejala
        ];
        $model->insert($data);

        return redirect()->to('/data_gejala')->with('success', 'Data gejala berhasil ditambahkan'); // Redirect kembali ke halaman data penyakit setelah penambahan
    }


    public function hapus($id)
    {
        $model = new GejalaModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_gejala')->with('hapus', 'Data gejala tidak ditemukan');
        }
        $ruleModel = new RuleModel();
        $ruleCount = $ruleModel->where('id_gejala', $id)->countAllResults();
        if ($ruleCount > 0) {
            return redirect()->to('/data_gejala')->with('hapus', 'Data Penyakit tidak dapat dihapus karena masih digunakan dalam rule');
        }
        // Hapus data dari database
        $model->delete($id);

        return redirect()->to('/data_gejala')->with('hapus', 'Data gejala berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new GejalaModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_gejala')->with('error', 'Data gejala tidak ditemukan');
        }

        // Tampilkan modal edit dengan data gejala yang akan diubah
        return view('modal/edit_gejala', ['gejala' => $data]);
    }


    public function update($id)
    {
        $model = new GejalaModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_gejala')->with('error', 'Data gejala tidak ditemukan');
        }

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_gejala' => 'required',
            'nama_gejala' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ambil data dari form
        $kodeGejala = $this->request->getPost('kode_gejala');
        $namaGejala = $this->request->getPost('nama_gejala');

        // Simpan data ke dalam database
        $updatedData = [
            'kode_gejala' => $kodeGejala,
            'nama_gejala' => $namaGejala
        ];
        $model->update($id, $updatedData);

        return redirect()->to('/data_gejala')->with('success', 'Data gejala berhasil diperbarui');
    }
}
