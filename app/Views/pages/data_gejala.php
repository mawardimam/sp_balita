<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content mt-3">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="card-title text-bold text-primary">Data Gejala</h3>
            </div>
            <div class="card-body">
                <div class="input-group-append float-right">
                    <a class="btn btn-primary btn-sm mx-1" type="button" data-toggle="modal" data-target="#form-tambah">
                        <i class="fas fa-plus-circle"> Tambah data</i>
                    </a>
                </div>
                <table class="table table-striped table-hover table-bordered" id="example1">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach ($gejala as $key => $item) : ?>
                    <tr>
                        <td class="text-center"><?php echo $key + 1; ?></td>
                        <td><?php echo $item['kode_gejala']; ?></td>
                        <td><?php echo $item['nama_gejala']; ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" type="button" data-toggle="modal"
                                data-target="#form-edit-<?php echo $item['id_gejala']; ?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#modal-hapus-<?php echo $item['id_gejala']; ?>">
                                <i class="fas fa-trash"></i>
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
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Gejala</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm" action="<?= base_url('data_gejala/tambah') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Gejala</label>
                            <input type="text" name="kode_gejala" class="form-control" placeholder="Kode Gejala">
                        </div>
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="text" name="nama_gejala" class="form-control" placeholder="Nama Gejala">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($gejala as $key => $item) : ?>
<!-- Modal edit data -->
<div class="modal fade" id="form-edit-<?php echo $item['id_gejala']; ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Gejala</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm" action="<?= base_url('data_gejala/update/' . $item['id_gejala']) ?>"
                    method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode Gejala</label>
                            <input type="text" name="kode_gejala" class="form-control" placeholder="Kode Gejala"
                                required value="<?= $item['kode_gejala'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="text" name="nama_gejala" class="form-control" placeholder="Nama Gejala"
                                required value="<?= $item['nama_gejala'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal hapus data -->
<div class="modal fade" id="modal-hapus-<?php echo $item['id_gejala']; ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Hapus Gejala</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus gejala ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url('data_gejala/hapus/' . $item['id_gejala']) ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?= $this->endSection(); ?>