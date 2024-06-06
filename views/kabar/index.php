<?php 

if (isset($_SESSION['user_status'])) {
    $userStatus = $_SESSION['user_status'];
} else {
    $userStatus = '';
}
?>

<section class="home" id="home">
    <div class="content">
        <h3>Kabar Panti</h3>
        <h1>
            Menjelajahi Cerita dan Memberikan Hidup sebuah Makna bersama "Story of
            Hopes" di J-Hopes”
        </h1>
    </div>
</section>

<!-- home section ends -->

<!-- about section starts -->

<section class="about" id="about">
    <?php
    
    ?>
    <h1 class="heading">Kabar Panti J-Hopes </h1>
</section>

<?php if ($userStatus == 'admin') : ?>
<div class="container">
    <div class="d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-danger text-white" type="button" class="btn btn-warning text-light w-100"
            data-bs-toggle="modal" data-bs-target="#staticBackdropMake">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
                viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4">
                </path>
            </svg>
            TAMBAH DATA
        </button>
    </div>
</div>

<?php else : ?>

<?php endif; ?>


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
    <br><br><br><br>
    <div class="swiper-pagination"></div>
</div>

<?php foreach ($data['kegiatan'] as $panti) : ?>
<div class="modal fade" id="staticBackdrop<?= $panti['id_kegiatan']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="z-index:100;">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h1 fw-bold text-white" id="staticBackdropLabel">EDIT DATA PANTI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
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



<!-- modal make -->
<div class="modal fade" id="staticBackdropMake" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="z-index:100;">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h1 fw-bold text-white" id="staticBackdropLabel">BUAT DATA AKTIVITAS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL ?>/?controller=Kabar" method="POST">
                <div class="modal-body">
                   
                    <div>
                        <h2 class="fw-bold">Nama Kegiatan:</h2>
                        <!-- Ganti dengan input untuk nama kegiatan -->
                        <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 w-100 "
                            name='buatnamakegiatan' required></textarea>
                    </div>
                    <div>
                        <h2 class="fw-bold">Deskripsi:</h2>
                        <!-- Ganti dengan textarea untuk deskripsi -->
                        <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 w-100 "
                            name="buatdeskripsi" required></textarea>
                    </div>
                    <div>
                        <h2 class="fw-bold">Nama Panti:</h2>
                        <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                            name="buatid_profilpanti" required>
                            <option value="">Pilih Panti</option>
                            <?php foreach ($data['daftarpanti'] as $namapanti) : ?>
                            <option value="<?= $namapanti['id_panti']; ?>"><?= $namapanti['nama_panti']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <h2 class="fw-bold">Tanggal:</h2>
                        <!-- Ganti dengan input tanggal -->
                        <input class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2" type="date"
                            name="buattanggal" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick="return confirmCreate()"
                        class="btn btn-primary text-light">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->

<!--script  Modal -->
<script>
function confirmUpdate() {
    var conUpdate = confirm("Apakah Anda yakin ingin mengganti data ini?");
    return conUpdate;
}
</script>

<!-- modal -->

<!-- MODAL -->


<!-- Scripts -->
<!-- Sisipkan tautan ke jQuery, Popper.js, Bootstrap JS, dan Swiper JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function(index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>
<script>
function confirmDelete() {
    var userConfirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");

    if (userConfirmed) {

    } else {
        event.preventDefault();
    }
}
</script>


<!-- Sisipkan tautan ke file JavaScript kustom Anda -->
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/<?= $data['css']; ?>.js"></script>

<script>
function confirmLogout() {
    var confirmLogout = confirm("Apakah Anda yakin ingin logout?");

    if (confirmLogout) {
        window.location.href = '<?= BASEURL; ?>/?controller=Logout';
    }
}
</script>

</body>

</html>