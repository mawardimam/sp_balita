<?php

namespace App\Controllers;

use App\Models\SolusiModel;
use App\Models\PenyakitModel;


class SolusiController extends BaseController
{
    public function index()
    {
        $model = new SolusiModel();
        $penyakitModel = new PenyakitModel();

        $solusi = $model->select('tb_solusi.*, tb_penyakit.kode_penyakit, tb_penyakit.nama_penyakit')
            ->join('tb_penyakit', 'tb_penyakit.id_penyakit = tb_solusi.id_penyakit')
            ->findAll();

        $data = [
            // 'rule' => $model->findAll(),
            'solusi' => $solusi,
            'penyakit' => $penyakitModel->findAll(),
            'title' => 'Data Solusi',
        ];

        return view('pages/data_solusi', $data); // Memuat tampilan 'data_gejala.php' dengan data yang diberikan

    }

    public function tambah()
    {
        $model = new SolusiModel();

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_solusi' => 'required',
            'id_penyakit' => 'required',
            'solusi' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }


        // Ambil data dari form
        $kodeSolusi = $this->request->getPost('kode_solusi');
        $namaPenyakit = $this->request->getPost('id_penyakit');
        $solusi = $this->request->getPost('solusi');

        // Simpan data ke dalam database
        $data = [
            'kode_solusi' => $kodeSolusi,
            'id_penyakit' => $namaPenyakit,
            'solusi' => $solusi

        ];

        $model->insert($data);

        return redirect()->to('/data_solusi')->with('success', 'Data solusi berhasil ditambahkan'); // Redirect kembali ke halaman data penyakit setelah penambahan
    }

    public function hapus($id)
    {
        $model = new SolusiModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_solusi')->with('error', 'Data solusi tidak ditemukan');
        }

        // Hapus data dari database
        $model->delete($id);

        return redirect()->to('/data_solusi')->with('hapus', 'Data solusi berhasil dihapus');
    }


    public function edit($id)
    {
        $model = new SolusiModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_solusi')->with('error', 'Data solusi tidak ditemukan');
        }

        // Tampilkan modal edit dengan data gejala yang akan diubah
        return view('modal/edit_solusi', ['solusi' => $data]);
    }


    public function update($id)
    {
        $model = new SolusiModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_solusi')->with('error', 'Data solusi tidak ditemukan');
        }

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kode_solusi' => 'required',
            'nama_penyakit' => 'required',
            'solusi' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ambil data dari form
        $kodeSolusi = $this->request->getPost('kode_solusi');
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $solusi = $this->request->getPost('solusi');

        // Simpan data ke dalam database
        $updatedData = [
            'kode_solusi' => $kodeSolusi,
            'id_penyakit' => $namaPenyakit,
            'solusi' => $solusi
        ];
        $model->update($id, $updatedData);

        return redirect()->to('/data_solusi')->with('success', 'Data solusi berhasil diperbarui');
    }
}
