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

        $data['rule'] = $model->findAll();
        $data['penyakit'] = $penyakitModel->findAll();
        $data['gejala'] = $gejalaModel->findAll();

        $data['title'] = 'Data Rule'; // Menyertakan judul halaman

        return view('pages/data_rule', $data); // Memuat tampilan 'data_gejala.php' dengan data yang diberikan

    }

    public function tambah()
    {
        $model = new RuleModel();

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_penyakit' => 'required',
            'nama_gejala' => 'required',
            'mb' => 'required',
            'md' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }


        // Ambil data dari form
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $namaGejala = $this->request->getPost('nama_gejala');
        $mb = $this->request->getPost('mb');
        $md = $this->request->getPost('md');
        $nilaiCf = $mb - $md;

        // Simpan data ke dalam database
        $data = [
            'nama_penyakit' => $namaPenyakit,
            'nama_gejala' => $namaGejala,
            'mb' => $mb,
            'md' => $md,
            'nilai_cf' => $nilaiCf
        ];

        $model->insert($data);

        return redirect()->to('/data_rule')->with('success', 'Data rule berhasil ditambahkan'); // Redirect kembali ke halaman data penyakit setelah penambahan
    }

    public function hapus($id)
    {
        $model = new RuleModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_rule')->with('error', 'Data rule tidak ditemukan');
        }

        // Hapus data dari database
        $model->delete($id);

        return redirect()->to('/data_rule')->with('hapus', 'Data rule berhasil dihapus');
    }


    public function edit($id)
    {
        $model = new RuleModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_rule')->with('error', 'Data rule tidak ditemukan');
        }

        // Tampilkan modal edit dengan data gejala yang akan diubah
        return view('modal/edit_rule', ['rule' => $data]);
    }


    public function update($id)
    {
        $model = new RuleModel();

        // Cek apakah data dengan ID yang diberikan ada dalam database
        $data = $model->find($id);
        if (!$data) {
            return redirect()->to('/data_rule')->with('error', 'Data rule tidak ditemukan');
        }

        // Validasi input
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_penyakit' => 'required',
            'nama_gejala' => 'required',
            'mb' => 'required',
            'md' => 'required'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ambil data dari form
        $namaPenyakit = $this->request->getPost('nama_penyakit');
        $namaGejala = $this->request->getPost('nama_gejala');
        $mb = $this->request->getPost('mb');
        $md = $this->request->getPost('md');
        $nilaiCf = $mb - $md;

        // Simpan data ke dalam database
        $updatedData = [
            'nama_penyakit' => $namaPenyakit,
            'nama_gejala' => $namaGejala,
            'mb' => $mb,
            'md' => $md,
            'nilai_cf' => $nilaiCf
        ];
        $model->update($id, $updatedData);

        return redirect()->to('/data_rule')->with('success', 'Data rule berhasil diperbarui');
    }
}
