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
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-bold text-primary"> Data Rule</h2>
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
                            <th>Kode Gejala</th>
                            <th>Nama Penyakit</th>
                            <th>Nama Gejala</th>
                            <th>Mb</th>
                            <th>Md</th>
                            <th>Nilai CF</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td> </td>
                            <td> </td>
                            <td>Influenza</td>
                            <td>Bersin-bersin</td>
                            <td>0,8</td>
                            <td>0,2</td>
                            <th> </th>
                            <td>
                                <a class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td> </td>
                            <td> </td>
                            <td>Influenza</td>
                            <td>Hidung gatal</td>
                            <td>0,6</td>
                            <td>0,2</td>
                            <th> </th>
                            <td>
                                <a class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td> </td>
                            <td> </td>
                            <td>Diare</td>
                            <td>Susah makan</td>
                            <td>0,4</td>
                            <td>0,6</td>
                            <th> </th>
                            <td>
                                <a class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td> </td>
                            <td> </td>
                            <td>Diare</td>
                            <td>Minum susu terus menerus </td>
                            <td>0,2</td>
                            <td>0,8</td>
                            <th> </th>
                            <td>
                                <a class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
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
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Rule</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="" name="" class="form-control" placeholder="Nama Gejala">
                        </div>
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <input type="" name="" class="form-control" placeholder="Nama Penyakit">
                        </div>
                        <div class="form-group">
                            <label>Mb</label>
                            <input type="" name="" class="form-control" placeholder="Mb">
                        </div>
                        <div class="form-group">
                            <label>Md</label>
                            <input type="" name="" class="form-control" placeholder="Md">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cenncel</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit data -->
<div class="modal fade" id="form-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Rule</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Gejala</label>
                            <input type="" name="" class="form-control" placeholder="Nama Gejala">
                        </div>
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <input type="" name="" class="form-control" placeholder="Nama Penyakit">
                        </div>
                        <div class="form-group">
                            <label>Mb</label>
                            <input type="" name="" class="form-control" placeholder="Mb">
                        </div>
                        <div class="form-group">
                            <label>Md</label>
                            <input type="" name="" class="form-control" placeholder="Md">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cenncel</button>
                <button type="button" class="btn btn-primary">Save Change</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>