<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content mt-3">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="card-title text-bold text-primary">Riwayat Diagnosa</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered" id="example1">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama balita</th>
                            <th>Nama Orangtua</th>
                            <th>Usia Balita</th>
                            <th>Alamat</th>
                            <th>Tanggal Diagnosa</th>
                            <th>Hasil CF</th>
                            <th>Presentase</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($Diagnosas as $diagnosa) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $diagnosa['nama_balita']; ?></td>
                            <td><?= $diagnosa['nama_ortu']; ?></td>
                            <td><?= $diagnosa['usia']; ?></td>
                            <td><?= $diagnosa['alamat']; ?></td>
                            <td><?= $diagnosa['tanggal']; ?></td>
                            <td><?= $diagnosa['nilai_cf']; ?></td>
                            <td><?= $diagnosa['presentase']; ?> %</td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
</section>

<?= $this->endSection(); ?>