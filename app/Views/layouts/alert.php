<?php if (session()->getFlashdata('hapus')) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('hapus') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>