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

        // Ambil data dari modal tambah
        $kodeGejala = $this->request->getPost('kode_gejala');
        $namaGejala = $this->request->getPost('nama_gejala');

        if (empty($kodeGejala) || empty($namaGejala)) {
            return redirect()->back()->with('hapus', 'Harap isi semua field');
        }

        // validasi tambah
        $existingGejala = $model->where('kode_gejala', $kodeGejala)
            ->orWhere('nama_gejala', $namaGejala)
            ->first();

        if ($existingGejala) {
            return redirect()->back()->with('warning', 'Kode gejala atau nama gejala sudah ada');
        }
        // Simpan data ke dalam database
        $data = [
            'kode_gejala' => $kodeGejala,
            'nama_gejala' => $namaGejala
        ];
        $model->insert($data);
        return redirect()->to('/data_gejala')->with('success', 'Data gejala berhasil ditambahkan');
    }

    public function hapus($id)
    {
        $model = new GejalaModel();
        $ruleModel = new RuleModel();
        $ruleCount = $ruleModel->where('id_gejala', $id)->countAllResults();
        if ($ruleCount > 0) {
            return redirect()->to('/data_gejala')->with('warning', 'Data Gejala tidak dapat dihapus karena masih digunakan dalam rule');
        }
        // Hapus data dari database
        $model->delete($id);
        return redirect()->to('/data_gejala')->with('hapus', 'Data gejala berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new GejalaModel();
        $data = $model->find($id);
        return view('modal/edit_gejala', ['gejala' => $data]);
    }

    public function update($id)
    {
        $model = new GejalaModel();
        $data = $model->find($id);
        // Ambil data dari modal edit
        $kodeGejala = $this->request->getPost('kode_gejala');
        $namaGejala = $this->request->getPost('nama_gejala');
        // Periksa apakah data gejala yang diubah sama dengan data yang ada sebelumnya
        if ($data['kode_gejala'] === $kodeGejala && $data['nama_gejala'] === $namaGejala) {
            return redirect()->to('/data_gejala')->with('warning', 'Tidak ada perubahan data gejala');
        }

        // Simpan data ke dalam database
        $updatedData = [
            'kode_gejala' => $kodeGejala,
            'nama_gejala' => $namaGejala
        ];
        $model->update($id, $updatedData);
        return redirect()->to('/data_gejala')->with('success', 'Data gejala berhasil diperbarui');
    }
}
