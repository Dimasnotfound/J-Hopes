<?php 

if (isset($_SESSION['user_status'])) {
    $userStatus = $_SESSION['user_status'];
} else {
    $userStatus = '';
}
?>

<section class="home" id="home">
    <div class="content">
        <h3 class="text-primary fw-bold">HALO GIVER JEMBER SELAMAT DATANG</h3>
        <h1>
            Berbagi Harapan Dan Cinta Bersama Anak Anak Panti Dengan J-Hope
        </h1>
    </div>
</section>

<section class="about" id="about">
    <h1 class="heading fw-bold">Bersama J-Hope Kita Bisa</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-5">
            <div class="carousel-item active">
                <img src="<?= BASEURL; ?>/img/client/Beranda/konten1.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="<?= BASEURL; ?>/img/client/Beranda/j1.png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="<?= BASEURL; ?>/img/client/Beranda/j2.png" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<section class="about" id="about">
    <h1 class="heading">Panti Terhubung</h1>
</section>


<div class="content">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            if (isset($data['profilPanti']) && is_array($data['profilPanti'])) {
                $hitungCardContainer = 0; // Inisialisasi variabel hitung card-container
                $hitungKartu = 0; // Inisialisasi variabel hitung kartu
                foreach ($data['profilPanti'] as $panti) {
                    if ($hitungKartu % 3 == 0) {
                        // Jika sudah 3 kartu, tambahkan swiper-slide baru
                        if ($hitungCardContainer > 0) {
                            echo '</div>'; // Tutup swiper-slide sebelumnya
                        }
                        echo '<div class="swiper-slide">';
                        $hitungCardContainer++;
                    }
                    $hitungKartu++;
                    $idPanti =  html_entity_decode(trim($panti['id_panti']), ENT_QUOTES, 'UTF-8');
                    

                    $urlIdPanti = urlencode(str_replace(' ', '_', $idPanti));
                    ?>
            <div class="card border border-primary border-2">
                <img src="<?= BASEURL; ?>/img/client/CariPanti/1.png"
                    class="card-img-top gambar-card img-fluid rounded-top rounded-3" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-bold fs-5"><?= $panti["nama_panti"] ?></h5>
                        <div class="tanggal">
                            <p class="fs-6"><?= $panti["nama_pemilik"] ?></p>
                        </div>
                    </div>
                    <p class="card-text fs-6 mt-3 text-truncate"><?= $panti["alamat"] ?></p>
                    <?php if ($userStatus == 'admin') : ?>
                    <div class="container">
                        <a href="<?= BASEURL; ?>/?controller=DetailPanti&id=<?= $urlIdPanti ?>"
                            class="btn btn-warning text-light">EDIT</a>
                        <form action="" method="post" onsubmit="confirmDelete()" class="">
                            <input type="hidden" name="id_panti" value="<?= $panti['id_panti'] ?>">
                            <button type="submit" class=" btn btn-danger text-light w-100">DELETE</button>
                        </form>
                    </div>
                    <?php else : ?>
                    <a href="<?= BASEURL; ?>/?controller=DetailPanti&id=<?= $urlIdPanti ?>" class="btn btn-primary text-light">Lihat
                        Detail</a>
                    <?php endif; ?>

                </div>
            </div>
            <?php }  ?>
            <?php if ($hitungCardContainer > 0) : ?>
        </div>
        <?php endif; ?>
        <?php }  ?>
    </div>

    <!-- Pagination -->
    <br><br><br>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<div class="container d-flex align-items-center justify-content-center">
    <button class="btn btn-outline-primary">
        <a href="<?= BASEURL; ?>/?controller=Cari" class="text-primary text-decoration-none">Lihat Selengkapnya</a>
    </button>
</div>
<br><br>

<section class="about" id="about">
    <h1 class="heading">Kabar Panti J-Hopes</h1>
</section>

<div class="content">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            if (isset($data['kegiatan']) && is_array($data['kegiatan'])) {
                $hitungCardContainer = 0; // Inisialisasi variabel hitung card-container
                $hitungKartu = 0; // Inisialisasi variabel hitung kartu
                foreach ($data['kegiatan'] as $panti) {
                    if ($hitungKartu % 3 == 0) {
                        // Jika sudah 3 kartu, tambahkan swiper-slide baru
                        if ($hitungCardContainer > 0) {
                            echo '</div>'; // Tutup swiper-slide sebelumnya
                        }
                        echo '<div class="swiper-slide">';
                        $hitungCardContainer++;
                    }
                    $hitungKartu++;
                    $namaKegiatan = html_entity_decode(trim($panti["nama_kegiatan"]), ENT_QUOTES, 'UTF-8');
            
                    $urlKegiatan = urlencode(str_replace(' ', '_', $namaKegiatan));
                    ?>
            <div class="card border border-primary border-2" style="width:500px ;">
                <img src="<?= BASEURL; ?>/img/client/CariPanti/1.png" class="card-img-top gambar-card img-fluid"
                    alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-bold fs-5"><?= $panti["nama_kegiatan"] ?></h5>
                        <div class="tanggal">
                            <p class="fs-6"><?= $panti["tanggal"] ?></p>
                        </div>
                    </div>
                    <p class="card-text fs-6 mt-3 text-truncate"><?= $panti["deskripsi"] ?></p>
                    <?php if ($userStatus == 'admin') : ?>
                    <div class="container">
                        <button type="button" class="btn btn-warning text-light w-100" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop<?= $panti['id_kegiatan']; ?>">
                            EDIT
                        </button>
                        <form action="" method="post" onsubmit="confirmDelete()" class="">
                            <input type="hidden" name="id_kegiatan" value="<?= $panti['id_kegiatan']; ?>">
                            <button type="submit" class=" btn btn-danger text-light w-100">DELETE</button>
                        </form>
                    </div>
                    <?php else : ?>
                    <a href="<?= BASEURL; ?>/?controller=ReadMoreAktivitasPanti&id=<?= $urlKegiatan ?>"
                        class="btn btn-primary text-light">Lihat Detail</a>
                    <?php endif; ?>

                </div>
            </div>
            <?php } // Akhiri loop foreach ?>
            <?php if ($hitungCardContainer > 0) : ?>
        </div> <!-- Tutup swiper-slide terakhir jika ada lebih dari satu -->
        <?php endif; ?>
        <?php } // Akhiri pengujian if ?>
    </div>

    <!-- Pagination -->
    <br><br><br>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
<div class="container d-flex align-items-center justify-content-center">
    <button class="btn btn-outline-primary">
        <a href="<?= BASEURL; ?>/?controller=Kabar" class="text-primary text-decoration-none">Lihat Selengkapnya</a>
    </button>
</div>

<!-- pop up mode -->

<?php foreach ($data['kegiatan'] as $panti) : ?>
<div class="modal fade" id="staticBackdrop<?= $panti['id_kegiatan']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="z-index:100;">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h1 fw-bold text-white" id="staticBackdropLabel">EDIT DATA PANTI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div>
                        <h1 class="fw-bold">ID Kegiatan:</h1>
                        <input type="text" name="id_kegiatan" value=" <?= $panti['id_kegiatan']; ?>"
                            class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 w-100" readonly>
                    </div>
                    <div>
                        <h2 class="fw-bold">Nama Kegiatan:</h2>
                        <!-- Ganti dengan input untuk nama kegiatan -->
                        <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 w-100 "
                            name='namakegiatan'><?= $panti['nama_kegiatan']; ?></textarea>
                    </div>
                    <div>
                        <h2 class="fw-bold">Deskripsi:</h2>
                        <!-- Ganti dengan textarea untuk deskripsi -->
                        <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 w-100 "
                            name="deskripsi"><?= $panti['deskripsi']; ?></textarea>
                    </div>
                    <div>
                        <h2 class="fw-bold">Tanggal:</h2>
                        <!-- Ganti dengan input tanggal -->
                        <input class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2" type="date"
                            name="tanggal" value="<?= $panti['tanggal']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="return confirmUpdate()"
                        class="btn btn-primary text-light">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end -->

<script>
function confirmDelete() {
    var userConfirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");

    if (userConfirmed) {

    } else {
        event.preventDefault();
    }
}
</script>