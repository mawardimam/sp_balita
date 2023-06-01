<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </div>
    <section class="content">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold text-primary">Data Penyakit</h3>
                <div class="card-tools">
                    <form ng-submit="itemSearch()" class="form-inline" role="form">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" [(ngModel)]="searchText">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default" (click)="itemSearch()">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        &nbsp;
                        <div class="input-group-append">
                            <a class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#form-tambah">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                        &nbsp;
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0" style="height: 500px" ;>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Keterangan</th>
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
                                <td><?php echo $item['keterangan']; ?></td>
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
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
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
                                <label>keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="keterangan" required value="<?= $item['keterangan'] ?>">
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