<?php

namespace App\Controllers;

use App\Models\PenyakitModel;

class PenyakitController extends BaseController
{
    public function index()
    {
        $model = new PenyakitModel();
        $data = [
            'penyakit' => $model->findAll(),
            'title' => 'Data Rule',
        ];
        return view('pages/data_penyakit', $data); // Memuat tampilan 'data_gejala.php' dengan data yang diberikan
    }
    public function tambah()
    {
        $model = new PenyakitModel();

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_penyakit' => 'required',
            'nama_penyakit' => 'required',
            'keterangan' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ambil data dari form
        $kodePenyakit = $this->request->getPost('kode_penyakit');
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $keterangan = $this->request->getPost('keterangan');


        // Simpan data ke dalam database
        $data = [
            'kode_penyakit' => $kodePenyakit,
            'nama_penyakit' => $namaPenyakit,
            'keterangan' => $keterangan,
        ];
        $model->insert($data);

        return redirect()->to('/data_penyakit')->with('success', 'Data penyakit berhasil ditambahkan'); // Redirect kembali ke halaman data penyakit setelah penambahan
    }
    public function hapus($id)
    {
        $model = new PenyakitModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_penyakit')->with('error', 'Data Penyakit tidak ditemukan');
        }

        // Hapus data dari database
        $model->delete($id);

        return redirect()->to('/data_penyakit')->with('hapus', 'Data penyakit berhasil dihapus');
    }


    public function edit($id)
    {
        $model = new PenyakitModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_penyakit')->with('error', 'Data penyakit tidak ditemukan');
        }

        // Tampilkan modal edit dengan data gejala yang akan diubah
        return view('modal/edit_penyakit', ['penyakit' => $data]);
    }


    public function update($id)
    {
        $model = new PenyakitModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_penyakit')->with('error', 'Data penyakit tidak ditemukan');
        }

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_penyakit' => 'required',
            'nama_penyakit' => 'required',
            'keterangan' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ambil data dari form
        $kodePenyakit = $this->request->getPost('kode_penyakit');
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $keterangan = $this->request->getPost('keterangan');

        // Simpan data ke dalam database
        $updatedData = [
            'kode_penyakit' => $kodePenyakit,
            'nama_penyakit' => $namaPenyakit,
            'keterangan' => $keterangan,
        ];
        $model->update($id, $updatedData);

        return redirect()->to('/data_penyakit')->with('success', 'Data penyakit berhasil diperbarui');
    }
}
