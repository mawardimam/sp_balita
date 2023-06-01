<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1 class="m-1">Data Gejala</h1>
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
                <h3 class="card-title">Data User</h3>
                <div class="card-tools">
                    <form ng-submit="itemSearch()" class="form-inline" role="form">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search"
                                [(ngModel)]="searchText">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default" (click)="itemSearch()">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        &nbsp;
                        <div class="input-group-append">
                            <a class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#form-tambah">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                        &nbsp;
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0 " style="height: 500px;">
                <table class=" table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th class="float-right" style="margin-right: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muslihat</td>
                            <td>*****</td>
                            <td>Admin</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dadang</td>
                            <td>******</td>
                            <td>Admin</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" type="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Murad</td>
                            <td>*****</td>
                            <td>Pasien</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Gobang</td>
                            <td>*****</td>
                            <td>Pasien</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Pipit</td>
                            <td>*****</td>
                            <td>Pasien</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Kinanti</td>
                            <td>*****</td>
                            <td>Pasien</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Dikdik</td>
                            <td>*****</td>
                            <td>Pasien</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Ujang</td>
                            <td>*****</td>
                            <td>Pasien</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dadang</td>
                            <td>******</td>
                            <td>Admin</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Dadang</td>
                            <td>******</td>
                            <td>Admin</td>
                            <td class="float-right">
                                <a class="btn btn-warning btn-sm" ype="button" data-toggle="modal"
                                    data-target="#form-edit">
                                    <i class="fas fa-pencil-alt"> </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash"> </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</section>
<!-- Modal tambah data-->
<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="" name="" class="form-control" placeholder="Level">
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
<!-- Modal edit data-->
<div class="modal fade" id="form-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit User</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="quickForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="" name="" class="form-control" placeholder="Level">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cenncel</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>