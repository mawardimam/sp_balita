<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content mt-3">
        <?= $this->include('layouts/alert') ?>
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="card-title text-bold text-primary">Data Laporan</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered" id="example1">
                    <thead class="bg-secondary">
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Penyakit</th>
                            <th>Tanggal</th>
                            <th>CF</th>
                            <th>Presentase</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($Diagnosas as $diagnosa) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $diagnosa['nama_user']; ?></td>
                            <td><?= $diagnosa['id_penyakit']; ?></td>
                            <td><?= $diagnosa['tanggal']; ?></td>
                            <td><?= $diagnosa['nilai_cf']; ?></td>
                            <td><?= $diagnosa['presentase']; ?></td>
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
                                var kodeGejala = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                                var namaGejala = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

                                if (kodeGejala.includes(searchText) || namaGejala.includes(searchText)) {
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
</div>
</section>

<?= $this->endSection(); ?>