<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content mt-3">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="card-title text-bold text-primary">Data Rule</h3>
            </div>
            <div class="card-body">
                <div class="input-group-append float-right">
                    <a class="btn btn-primary btn-sm float-right mx-1" type="button" data-toggle="modal"
                        data-target="#form-tambah">
                        <i class="fas fa-plus-circle"> Tambah data</i>
                    </a>
                </div>
                <table class="table table-striped table-hover table-bordered" id="example1">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Mb</th>
                            <th>Md</th>
                            <th>Nilai Pakar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rule as $key => $item) : ?>
                        <tr>
                            <td class="text-center"><?php echo $key + 1; ?></td>
                            <td><?php echo $item['kode_penyakit']; ?></td>
                            <td><?php echo $item['nama_penyakit']; ?></td>
                            <td><?php echo $item['kode_gejala']; ?></td>
                            <td><?php echo $item['nama_gejala']; ?></td>
                            <td><?php echo $item['mb']; ?></td>
                            <td><?php echo $item['md']; ?></td>
                            <td><?php echo $item['cf']; ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" type="button" data-toggle="modal"
                                    data-target="#form-edit-<?php echo $item['id_rule']; ?>">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                                <a class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-hapus-<?php echo $item['id_rule']; ?>">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <script>
                        document.querySelector("form[ng-submit='itemSearch()']").addEventListener("submit", function(
                            event) {
                            event.preventDefault();
                            var searchText = this.querySelector("input[name='table_search']").value.trim()
                                .toLowerCase();

                            var rows = document.querySelectorAll(".table tbody tr");

                            for (var i = 0; i < rows.length; i++) {
                                var row = rows[i];
                                var namaPenyakit = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                                var namaGejala = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

                                if (namaPenyakit.includes(searchText) || namaGejala.includes(searchText)) {
                                    row.style.display = ""; // Menampilkan baris jika sesuai dengan pencarian
                                } else {
                                    row.style.display =
                                        "none"; // Menyembunyikan baris jika tidak sesuai dengan pencarian
                                }
                            }

                            var noResultsRow = document.querySelector(".no-results-row");
                            if (searchText === "" || document.querySelectorAll(
                                    ".table tbody tr:not(.no-results-row)").length > 0) {
                                noResultsRow.style.display =
                                    "none"; // Menyembunyikan baris jika terdapat hasil pencarian atau pencarian kosong
                            } else {
                                noResultsRow.style.display = ""; // Menampilkan baris jika tidak ada hasil pencarian
                            }
                        });
                    </script> -->
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal tambah data -->
<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Rule</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm" action="<?= base_url('data_rule/tambah') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <select class="form-control" id="id_penyakit" name="id_penyakit">
                                <option selected>Pilih Penyakit</option>
                                <?php foreach ($penyakit as $item) : ?>
                                <option value="<?= $item['id_penyakit'] ?>"><?= $item['nama_penyakit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <select class="form-control" id="id_gejala" name="id_gejala">
                                <option selected>Pilih Gejala</option>
                                <?php foreach ($gejala as $item) : ?>
                                <option value="<?= $item['id_gejala'] ?>"><?= $item['nama_gejala'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mb</label>
                            <select class="form-control" name="mb" id="mb">
                                <option selected>Pilih Nilai Mb</option>
                                <option>0</option>
                                <option>0.2</option>
                                <option>0.4</option>
                                <option>0.6</option>
                                <option>0.8</option>
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Md</label>
                            <select class="form-control" name="md" id="md">
                                <option selected>Pilih Nilai Md</option>
                                <option>0</option>
                                <option>0.2</option>
                                <option>0.4</option>
                                <option>0.6</option>
                                <option>0.8</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cenncel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($rule as $key => $item) : ?>
<!-- Modal edit data -->
<div class="modal fade" id="form-edit-<?php echo $item['id_rule']; ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Rule</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm" action="<?= base_url('data_rule/update/' . $item['id_rule']) ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <select name="nama_penyakit" class="form-control">
                                <?php foreach ($penyakit as $itempenyakit) : ?>
                                <option value="<?= $itempenyakit['id_penyakit'] ?>"
                                    <?= ($itempenyakit['id_penyakit'] == $itempenyakit['id_penyakit']) ? 'selected' : '' ?>>
                                    <?= $itempenyakit['nama_penyakit'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <select name="nama_gejala" class="form-control">
                                <?php foreach ($gejala as $itemgejala) : ?>
                                <option value="<?= $itemgejala['id_gejala'] ?>"
                                    <?= ($itemgejala['id_gejala'] == $itemgejala['id_gejala']) ? 'selected' : '' ?>>
                                    <?= $itemgejala['nama_gejala'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mb</label>
                            <select class="form-control" name="mb" id="mb">
                                <option selected><?= $item['mb'] ?></option>
                                <option>0</option>
                                <option>0.2</option>
                                <option>0.4</option>
                                <option>0.6</option>
                                <option>0.8</option>
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Md</label>
                            <select class="form-control" name="md" id="md">
                                <option selected><?= $item['md'] ?></option>
                                <option>0</option>
                                <option>0.2</option>
                                <option>0.4</option>
                                <option>0.6</option>
                                <option>0.8</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cenncel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal hapus data -->
<div class="modal fade" id="modal-hapus-<?php echo $item['id_rule']; ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Hapus Rule</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus penyakit ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('data_rule/hapus/' . $item['id_rule']) ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?= $this->endSection(); ?>