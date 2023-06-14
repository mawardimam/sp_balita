      <?= $this->extend('layouts/template'); ?>

      <?= $this->section('content'); ?>

      <div class="content-wrapper">

          <div class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <div class="col-sm-6">
                          <h1 class="m-2">Dashboard</h1>
                      </div>
                  </div>
              </div>
          </div>
          <section class="content">
              <div class="container-fluid">

                  <div class="row">
                      <div class="col-lg-3 col-6">

                          <div class="small-box bg-warning">
                              <div class="inner">
                                  <h3 class="text-white"><?= count($gejala) ?></h3>
                                  <p class="text-white">Data Gejala</p>
                              </div>
                              <div class="icon">
                                  <i class="nav-icon fas fa-viruses"></i>
                              </div>
                              <a href="data_gejala" class="small-box-footer">
                                  <font color="white"> Lihat </font>
                                  <i class="fas fa-arrow-circle-right" style="color: #ffffff;"></i>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-3 col-6">
                          <div class="small-box bg-danger">
                              <div class="inner">
                                  <h3 class="text-white"><?= count($penyakit) ?></h3>
                                  <p class="text-white">Data Penyakit</p>
                              </div>
                              <div class="icon">
                                  <i class="nav-icon fas fa-briefcase-medical"></i>
                              </div>
                              <a href="data_penyakit" class="small-box-footer">
                                  <font color="white"> Lihat </font>
                                  <i class="fas fa-arrow-circle-right" style="color: #ffffff;"></i>
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-3 col-6">
                          <div class="small-box bg-info">
                              <div class="inner">
                                  <h3><?= count($solusi) ?></h3>
                                  <p>Data Solusi</p>
                              </div>
                              <div class="icon">
                                  <i class="nav-icon fas fa-hand-holding-medical"></i>
                              </div>
                              <a href="data_solusi" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                      </div>

                      <div class="col-lg-3 col-6">
                          <div class="small-box bg-success">
                              <div class="inner">
                                  <h3><?= count($rule) ?></h3>
                                  <p>Data Rule</p>
                              </div>
                              <div class="icon">
                                  <i class="nav-icon fas fa-clipboard"></i>
                              </div>
                              <a href="data_rule" class="small-box-footer">Lihat
                                  <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                      </div>

                      <div class="col-lg-3 col-6">
                          <div class="small-box bg-primary">
                              <div class="inner">
                                  <h3>322</h3>
                                  <p>Data Riwayat</p>
                              </div>
                              <div class="icon">
                                  <i class="nav-icon fas fa-stethoscope"></i>
                              </div>
                              <a href="#" class="small-box-footer">Lihat
                                  <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
      </div>
      </section>
      </div>
      <?= $this->endSection(); ?>