<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1 class="m-1">Data Penyakit</h1>
                </div> -->
                <!-- <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Dashboard</li>
                          </ol>
                      </div> -->
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Gejala</h3>
                        </div>
                        <form class="quickForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Gejala</label>
                                    <input type="" name="email" class="form-control" placeholder="G01">
                                </div>
                                <div class="form-group">
                                    <label>Nama Gejala</label>
                                    <input type="" name="password" class="form-control" placeholder="bersin-bersin">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Cencel</button>
                                &nbsp;
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form>
                    </div>

                </div>
    </section>
</div>
</div>
<?= $this->endSection(); ?>