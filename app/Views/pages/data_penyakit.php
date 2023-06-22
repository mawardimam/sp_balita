<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content mt-3">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="card-title text-bold text-primary">Data Penyakit</h3>
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
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Deskripsi</th>
                            <th>Solusi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penyakit as $key => $item) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $item['kode_penyakit']; ?></td>
                                <td><?php echo $item['nama_penyakit']; ?></td>
                                <td><?php echo $item['deskripsi']; ?></td>
                                <td><?php echo $item['solusi']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#form-edit-<?php echo $item['id_penyakit']; ?>">
                                        <i class="fas fa-pencil-alt"> </i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-<?php echo $item['id_penyakit']; ?>">
                                        <i class="fas fa-trash"> </i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
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
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Penyakit</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm" action="<?= base_url('data_penyakit/tambah') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Penyakit</label>
                            <input type="text" name="kode_penyakit" class="form-control" placeholder="Kode Penyakit" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <input type="text" name="nama_penyakit" class="form-control" placeholder="Nama Penyakit" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Solusi</label>
                            <textarea type="text" name="solusi" class="form-control" placeholder="Solusi" rows="3" required></textarea>
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

<?php foreach ($penyakit as $key => $item) : ?>
    <!-- Modal edit data -->
    <div class="modal fade" id="form-edit-<?php echo $item['id_penyakit']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Penyakit</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="quickForm" action="<?= base_url('data_penyakit/update/' . $item['id_penyakit']) ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode Penyakit</label>
                                <input type="text" name="kode_penyakit" class="form-control" placeholder="Kode Penyakit" required value="<?= $item['kode_penyakit'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Penyakit</label>
                                <input type="text" name="nama_penyakit" class="form-control" placeholder="Nama Penyakit" required value="<?= $item['nama_penyakit'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="3" required value="<?= $item['deskripsi'] ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Solusi</label>
                                <textarea type="text" name="solusi" class="form-control" placeholder="Solusi" rows="3" required value="<?= $item['solusi'] ?>"></textarea>
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
    <div class="modal fade" id="modal-hapus-<?php echo $item['id_penyakit']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Hapus Penyakit</h4>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus penyakit ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('data_penyakit/hapus/' . $item['id_penyakit']) ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>