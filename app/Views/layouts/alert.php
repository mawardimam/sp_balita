<?php if (session()->getFlashdata('hapus')) : ?>
<div id="hapus-flash" class="alert alert-danger" role="alert">
    <?= session()->getFlashdata('hapus') ?>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
<div id="success-flash" class="alert alert-success">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')) : ?>
<div id="warning-flash" class="alert alert-warning">
    <?= session()->getFlashdata('warning') ?>
</div>
<?php endif; ?>

<script>
setTimeout(function() {
    var hapusFlash = document.getElementById('hapus-flash');
    if (hapusFlash) {
        hapusFlash.style.display = 'none';
    }

    var successFlash = document.getElementById('success-flash');
    if (successFlash) {
        successFlash.style.display = 'none';
    }
    var warningFlash = document.getElementById('warning-flash');
    if (warningFlash) {
        warningFlash.style.display = 'none';
    }
}, 5000);
</script>