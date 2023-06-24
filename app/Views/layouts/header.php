<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="main" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <div class="info">
                <label style="font-weight: normal;"><?= session('nama') ?></label>
            </div>
            <div class="image">
                <i class="fas fa-user-tie fa-2x"></i>
            </div>
        </div>
    </ul>
</nav>