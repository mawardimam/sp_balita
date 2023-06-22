<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content mt-3">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="card-title text-bold text-primary">Data Solusi</h3>
            </div>
            <div class="card-body">
                <div class="input-group-append float-right">
                    <a class="btn btn-primary btn-sm float-right mx-1" type="button" data-toggle="modal" data-target="#form-tambah">
                        <i class="fas fa-plus-circle"> Tambah data</i>
                    </a>
                </div>
                <table class="table table-striped table-hover table-bordered" id="example1">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Kode Solusi</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Solusi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solusi as $key => $item) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $item['kode_solusi']; ?></td>
                                <td><?php echo $item['kode_penyakit']; ?></td>
                                <td><?php echo $item['nama_penyakit']; ?></td>
                                <td><?php echo $item['solusi']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#form-edit-<?php echo $item['id_solusi']; ?>">
                                        <i class="fas fa-pencil-alt"> </i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-<?php echo $item['id_solusi']; ?>">
                                        <i class="fas fa-trash"> </i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <script>
                        document.querySelector("form[ng-submit='itemSearch()']").addEventListener("submit", function(
                            event) {
                            event.preventDefault();
                            var searchText = this.querySelector("input[name='table_search']").value.trim()
                                .toLowerCase();

                            var rows = document.querySelectorAll(".table tbody tr");

                            for (var i = 0; i < rows.length; i++) {
                                var row = rows[i];
                                var kodeSolusi = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                                var namaPenyakit = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

                                if (kodeSolusi.includes(searchText) || namaPenyakit.includes(searchText)) {
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
                    </script>
                </table>
            </div>

        </div>
</div>
</section>
<!-- Modal tambah data -->
<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Solusi</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm" action="<?= base_url('data_solusi/tambah') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Solusi</label>
                            <input type="text" name="kode_solusi" class="form-control" placeholder="Kode Solusi" required>
                        </div>
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
                            <label>Solusi</label>
                            <input type="text" name="solusi" class="form-control" placeholder="Solusi" required>
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

<?php foreach ($solusi as $key => $item) : ?>
    <!-- Modal edit data -->
    <div class="modal fade" id="form-edit-<?php echo $item['id_solusi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Solusi</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="quickForm" action="<?= base_url('data_solusi/update/' . $item['id_solusi']) ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode Solusi</label>
                                <input type="text" name="kode_solusi" class="form-control" placeholder="Kode Solusi" required value="<?= $item['kode_solusi'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <select name="nama_penyakit" class="form-control">
                                    <?php foreach ($penyakit as $itempenyakit) : ?>
                                        <option value="<?= $itempenyakit['id_penyakit'] ?>" <?= ($itempenyakit['id_penyakit'] == $itempenyakit['id_penyakit']) ? 'selected' : '' ?>>
                                            <?= $itempenyakit['nama_penyakit'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Solusi</label>
                                <input type="text" name="solusi" class="form-control" placeholder="Solusi" required value="<?= $item['solusi'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cenncel</button>
                            <button type="submit" class="btn btn-primary">Save Change</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal hapus data -->
    <div class="modal fade" id="modal-hapus-<?php echo $item['id_solusi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus solusi ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('data_solusi/hapus/' . $item['id_solusi']) ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>