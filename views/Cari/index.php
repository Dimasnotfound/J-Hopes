<?php 

$kecamatan = $data['namaKecamatan'];
$noDataMessage = $data['noDataMessage'];
if (isset($_SESSION['user_status'])) {
    $userStatus = $_SESSION['user_status'];
} else {
    $userStatus = '';
}
?>

<section class="home" id="home">
    <div class="content">
        <h3>Cari Panti</h3>
        <h1>
            Bergabunglah dalam perjalanan kemanusiaan Anda dengan mencari panti yang ingin Anda bantu. Kami memahami
            bahwa kebaikan hati Anda adalah langkah pertama yang luar biasa, dan untuk memudahkan langkah Anda
            selanjutnya,
            kami hadirkan untuk Anda akses cepat dan mudah ke panti-panti asuhan di Jember.
        </h1>
    </div>
</section>






<section class="about" id="about">
    <h1 class="heading">Cari Panti J-Hopes</h1>
    <form action="" method="post">
        <div class="select-container d-flex align-items-center justify-content-center gap-3">
            <select class="select-box bg-light p-3 rounded-4 border border-primary border-2" name="kecamatan">
                <option value="">Pilih Kecamatan</option>
                <?php foreach ($data['namaKecamatan'] as $kecataman) : ?>
                <option value="<?= $kecataman['id_kecamatan']; ?>"><?= $kecataman['nama_kecamatan']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-primary p-3 text-white rounded">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0">
                    </path>
                </svg>
            </button>
        </div>
    </form>
</section>


<?php if ($userStatus == 'admin') : ?>
<div class="container">
    <div class="d-flex align-items-center justify-content-center">
        <a href="<?= BASEURL; ?>/?controller=CreatePanti" type="button" class="btn btn-danger text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
                viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4">
                </path>
            </svg>
            TAMBAH DATA
        </a>
    </div>
</div>

<?php else : ?>

<?php endif; ?>


<?php if (isset($noDataMessage)): ?>
<div class="container">
    <h1 class="heading color-dark fw-bold text-center" style="color: black;">--<?= $noDataMessage; ?>--</h1>
    </h1>
</div>
<?php else: ?>
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
                <img src="<?= BASEURL; ?>/img/client/CariPanti/1.png" class="card-img-top gambar-card img-fluid"
                    alt="...">
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
<?php endif; ?>



</div>

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
function confirmDelete() {
    var userConfirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");

    if (userConfirmed) {

    } else {
        event.preventDefault();
    }
}
</script>

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