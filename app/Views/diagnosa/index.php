<?= $this->extend('layouts/template_diagnosa'); ?>
<?= $this->section('content'); ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero" style="background :#0d9cb5;">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div
                class="col-lg-6 order-1 order-lg-2 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Selamat Datang!</h2>
                <p>Silahkan Pilih Gejala Yang Sesuai Dengan Yang dialami</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#mulai" class="btn-get-started">Mulai</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="landing_page/img/baby.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>


    </div>
</section>
<!-- End Hero Section -->

<main id="main">
    <!-- ======= mulai Us Section ======= -->
    <section id="mulai" class="about">
        <div class="container" data-aos="fade-up">
            <?= $this->include('layouts/alert') ?>
            <form action="<?= site_url('hitung') ?>" method="post">
                <div class="form-group py-2">
                    <label for="nama_balita" class="mb-2 text-black" style="float: left;">Nama Balita</label>
                    <input type="text" name="nama_balita" id="nama_balita" class="form-control"
                        placeholder="Nama Balita" required>
                </div>
                <div class="form-group py-2">
                    <label for="nama_ortu" class="mb-2 text-black" style="float: left;">Nama Ortu</label>
                    <input type="text" name="nama_ortu" id="nama_ortu" class="form-control" placeholder="Nama Orang Tua"
                        required>
                </div>
                <div class="form-group py-2">
                    <label for="usia" class="mb-2 text-black" style="float: left;">Usia</label>
                    <input type="number" name="usia" id="usia" class="form-control" placeholder="Usia" required>
                </div>
                <div class="form-group py-2">
                    <label for="alamat" class="mb-2 text-black" style="float: left;">Alamat</label>
                    <textarea type="text" name="alamat" id="alamat" class="form-control" rows="2" placeholder="Alamat"
                        required></textarea>
                </div>
                <div class="form-group py-2">
                    <label for="tanggal" class="mb-2 text-black" style="float: left;">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" rows="2" placeholder="Alamat"
                        required></input>
                </div>
                <div class="card-body table-responsive p-0" style="height: 500px" ;>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <th>Pilih Gejala</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Tingkat Kepercayaan</th>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $gejala) : ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="selectedGejala[]"
                                            value="<?= $gejala['id_gejala'] ?>" id="check<?= $gejala['id_gejala'] ?>">
                                </td>
                                <td>
                                    <label class="form-check-label" for="check<?= $gejala['id_gejala'] ?>">
                                        <?= $gejala['kode_gejala'] ?>
                                    </label>

                                </td>
                                <td>
                                    <label class="form-check-label" for="check<?= $gejala['id_gejala'] ?>">
                                        <?= $gejala['nama_gejala'] ?>
                                    </label>

                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-select" name="cf[]" required>
                                            <option selected disabled>--Pilih Nilai--</option>
                                            <?php foreach ($listCFUser as $item) : ?>
                                            <option value="<?= $item['id'] ?>">
                                                <?= $item['nama_nilai'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-secondary" onclick="history.back('/')">Kembali</button>
                        <button type="submit" class="btn btn-primary mr-2 mx-2">Diagnosa</button>
                    </div>
            </form>
        </div>
    </section><!-- End About Us Section -->
</main>

<?= $this->endSection() ?>