<?= $this->extend('layouts/template_diagnosa'); ?>
<?= $this->section('content'); ?>

<main id="main">

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Hasil Diagnosa</h2>
                <p>Hasil ini berdasarkan perhitungan sistem</p>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-4">

                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="fas fa-chevron-down"></i>
                            <div class="py-2">
                                <h4>Diagnosis Penyakit</h4>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Kode Penyakit:</h4>
                                <h5><?= $resultDiagnosa['kode_penyakit']; ?></h5>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Nama Penyakit:</h4>
                                <h5><?= $resultDiagnosa['nama_penyakit']; ?></h5>
                            </div>
                        </div><!-- End Info Item -->
                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group">
                                <label class="my-2">Nama Balita</label>
                                <input type="text" name="nama_balita" class="form-control" id="nama_balita" x
                                    value="<?= $resultDiagnosa['nama_balita']; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="my-2">Nama Orang Tua</label>
                                <input type="text" class="form-control" name="nama_ortu" id="nama_ortu"
                                    value="<?= $resultDiagnosa['nama_ortu']; ?>" required readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="my-2">Usia</label>
                            <input type="text" name="usia" class="form-control" id="usia"
                                value="<?= $resultDiagnosa['usia']; ?>" required readonly>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="alamat" rows="7" required
                                readonly><?= $resultDiagnosa['alamat']; ?></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button href="mulai_diagnosa" type="submit">Kembali</button></div>
                    </form>
                </div><!-- End Contact Form -->
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Perhitungan Sistem</h2>
                <p>Hasil ini berdasarkan perhitungan sistem</p>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-4">

                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="fas fa-chevron-down"></i>
                            <div class="py-2">
                                <h4>Hasil Perhitungan</h4>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>CF Akhir:</h4>
                                <h5><?= $resultDiagnosa['tingkat_kepercayaan']; ?></h5>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Presentase:</h4>
                                <h5><?= $resultDiagnosa['presentase']; ?> %</h5>
                            </div>
                        </div><!-- End Info Item -->
                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="card-body">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr class="table-secondary">
                                        <th>No</th>
                                        <th>Kode Gejala</th>
                                        <th>Gejala Terpilih</th>
                                        <th>Tingkat Kepercayaan</th>
                                        <th>CF User</th>
                                        <th>CF User * CF Pakar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($resultDiagnosa['gejala'] as $gejala) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $gejala['kode_gejala']; ?></td>
                                        <td><?= $gejala['nama_gejala']; ?></td>
                                        <td><?= $gejala['tingkat_kepercayaan']; ?></td>
                                        <td><?= $gejala['cf_user']; ?></td>
                                        <td><?= $gejala['nilai_cf']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <form>
                                <div class="form-group row py-1">
                                    <label class="my-2">Kode Penyakit</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control"
                                            value="<?= $resultDiagnosa['kode_penyakit']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row py-1">
                                    <label class="my-2">Nama Penyakit</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            value="<?= $resultDiagnosa['nama_penyakit']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row py-1">
                                    <label class="my-2">Deskripsi</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" rows="3" class="form-control"
                                            readonly><?= $resultDiagnosa['deskripsi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row py-1">
                                    <label class="my-2">Solusi</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" rows="3" class="form-control"
                                            readonly><?= $resultDiagnosa['solusi']; ?></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div><!-- End Contact Form -->
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>