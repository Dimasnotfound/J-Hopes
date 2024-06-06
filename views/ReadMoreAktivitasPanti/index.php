<?php 

$namaPanti = $data['namaPanti'];
$kegiatan = $data['Kegiatan'];
?>



<section class="home" id="home">
    <div class="content">
        <h3><?= $kegiatan['nama_kegiatan'] ?></h3>
        <h1>
            Menjelajahi Cerita dan Memberikan Hidup sebuah Makna bersama "Story of
            Hopes" di J-Hopes”
        </h1>
    </div>
</section>

<section class="about" id="about">
    <h1 class="heading"><?= $namaPanti['nama_panti']; ?></h1>
    <div class="container">
        <div class="text-container">
            <h3 class="font-weight-bold text-muted"><?= $kegiatan['tanggal'] ?></h3>
            <h2 class="mt-5"><?= $kegiatan['deskripsi'] ?></h2>
        </div>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

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