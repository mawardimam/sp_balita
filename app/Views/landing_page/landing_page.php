<?= $this->extend('layouts/template_diagnosa'); ?>
<?= $this->section('content'); ?>

<!-- ======= Header ======= -->
<section id="topbar" class="topbar d-flex align-items-center" style="background: #0d9cb5;">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center"> </div>
    </div>
</section><!-- End Top Bar -->

<header id="header" class="header d-flex align-items-center" style="background: #0d9cb5;">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <h1>sistem pakar balita<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <!-- <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="blog.html">Blog</a></li> -->
                <!-- <li><a href="#contact">Informasi Penyakit</a></li> -->
                <li><a href="<?= base_url('/login') ?>">Login Admin</a></li>
            </ul>
        </nav><!-- .navbar -->

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero" style="background :#0d9cb5;">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-1 order-lg-2 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>selamat datang di sistem pakar diagnosis peyakit pada bayi (balita)<span>.</span></h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="mulai_diagnosa" class="btn-get-started">Halaman Diagnosa</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="landing_page/img/baby.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>


    </div>
</section>
<!-- End Hero Section -->

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
            </div>
            <h4>Apa itu sistem pakar? </h4>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Pengertian sistem pakar
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p> Sistem pakar adalah sebuah sistem komputer yang dirancang untuk meniru kemampuan
                                pemecahan masalah yang dimiliki oleh seorang pakar manusia dalam suatu bidang tertentu.
                                Sistem ini menggunakan pengetahuan dan pengalaman yang ada dalam bidang tersebut untuk
                                memberikan solusi atau rekomendasi yang spesifik berdasarkan masalah yang diberikan.
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <h4>Apa itu bayi balita ?</h4>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Pengertian bayi (balita)
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p> Sistem Pakar Bayi Balita adalah jenis sistem pakar yang secara khusus
                                dirancang untuk memberikan
                                solusi, diagnosis, dan rekomendasi terkait perawatan, kesehatan, dan
                                perkembangan bayi dan
                                balita. Sistem ini menggabungkan pengetahuan medis dan pengalaman dari
                                pakar-pakar kesehatan
                                anak untuk membantu orang tua, dokter, dan perawat dalam mengidentifikasi
                                masalah kesehatan
                                atau
                                perkembangan yang mungkin dialami oleh bayi dan balita.
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <p>Sistem Pakar Bayi Balita memiliki potensi untuk membantu orang tua dalam mengatasi kekhawatiran
                    seputar kesehatan dan perkembangan bayi mereka. Selain itu, sistem ini juga dapat digunakan oleh
                    dokter dan perawat sebagai alat bantu dalam proses diagnosis, memberikan panduan perawatan awal, dan
                    mempercepat akses terhadap pengetahuan medis terkini dalam bidang kesehatan anak.
                </p>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection(); ?>