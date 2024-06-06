<?php 

$userStatus= '';
$userStatus = $_SESSION['user_status'];
?>
<section class="home" id="home">
    <div class="content">
        <h3>TAMBAH PANTI +</h3>
    </div>
</section>



<section class="about" id="about">
    <div class="heading fw-bold">--(CREATE DATA PANTI)--</div>




<div class="container">
    <form action="<?= BASEURL ?>/?controller=CreatePanti" method="POST" id="myForm">
        <div class="text-container">
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Panti:</span>
                <input type="text" name="nama_panti"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Tipe Panti:</span>
                <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                    name="id_tipe_panti">
                    <option value="">PILIH TIPE PANTI</option>
                    <?php foreach ($data['dropTipePanti'] as $tipepanti) : ?>
                    <option value="<?= $tipepanti['id_tipe_panti']; ?>"><?= $tipepanti['tipe_panti']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">No Telepon Panti:</span>
                <input type="text"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="no_telp_panti" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Pemilik:</span>
                <input type="text"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="nama_pemilik" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">No Telepon Pemilik Panti :</span>
                <input type="text"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="no_telp_pemilik_panti" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Deskripsi Panti : </span>
                <div class="mt-5">
                    <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2" rows="4"
                        name="deskripsi_panti"></textarea>
                </div>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Alamat :</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="alamat" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Masukan Koordinat Gmaps:</span>
                <input type="text" name="gmaps"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    value="" aria-describedby="maphelp"></input>
                    <div id="maphelp" class="h5 fw-semibold text-muted ">Ex. -6.2132, 106.8500</div>
            </div>
            
            <div class="pt-5">
                <span class="h1 fw-bold">Kecamatan :</span>
                <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                    name="id_kecamatan">
                    <option value="">PILIH DATA KECAMATAN</option>
                    <?php foreach ($data['dropkecamatan'] as $camatan) : ?>
                    <option value="<?= $camatan['id_kecamatan']; ?>"><?= $camatan['nama_kecamatan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Kebutuhan Panti: </span>
                <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                    name="id_kebutuhan_panti">
                    <option value="">PILIH JENIS KEBUTUHAN
                    </option>
                    <?php foreach ($data['dropKebutuhan'] as $butuh) : ?>
                    <option value="<?= $butuh['id_kebutuhan_panti']; ?>"><?= $butuh['nama_kebutuhan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Deskripsi Kebutuhan Panti : </span>
                <div class="mt-5">
                    <textarea class=" h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="deskripsi_kebutuhan_panti"></textarea>
                </div>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Jumlah Pengurus: </span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="jumlah_pengurus" value=" ">
                <span class="h4 fw-semibold mx-2 text-black">Orang</span>
                </input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Jumlah Anak Asuh : </span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="jumlah_anak_asuh" value="">
                <span class="h4 fw-semibold mx-2 text-black">Orang</span></input>
            </div>
            <div class="heading fw-bold">--(INFORMASI DONASI)--</div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Pemilik Rekening:</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="namapemilik_rekening" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Bank:</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="nama_bank" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nomor Rekening:</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="no_rekening" value=""></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Masukan Link Whatsapp:</span>
                <input type="text" name="linkwa"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    aria-describedby="wahelp" value="wa.me/+62"></input>
                    <div id="wahelp" class="h5 fw-semibold text-muted">Ex. wa.me/+62XXXXXXXXX</div>
            </div>
        </div>
        <div class="container d-flex align-items-center justify-content-center gap-5 mt-lg-5">
            <button type="submit" id="confirmButton" class="btn btn-primary p-3" onclick="confirmChanges()"><span
                    class="h1 fw-bold">CONFIRM</span></button>
            <button type="button" onclick="cancelChanges()" class="btn btn-danger p-3"><span
                    class="h1 fw-bold">CANCEL</span></button>
        </div>
    </form>
</div>
 



    <br> <br><br> <br><br> <br><br> <br>
</section>



<!-- Scripts -->
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
// Objek initialFormData yang diisi dengan nilai-nilai dari server-side PHP
var initialFormData = {
    nama_panti: "",
    id_tipe_panti: "",
    no_telp_panti: "",
    nama_pemilik: "",
    no_telp_pemilik_panti: '',
    deskripsi_panti: '',
    alamat: '',
    id_kecamatan: '',
    id_kebutuhan_panti: '',
    deskripsi_kebutuhan_panti: '',
    jumlah_pengurus: '',
    jumlah_anak_asuh: '',
    namapemilik_rekening: '',
    nama_bank: '',
    no_rekening: '',
};


function cancelChanges() {
    var isConfirmed = confirm("Apakah Anda yakin ingin membatalkan perubahan?");


    if (isConfirmed) {
        $("#myForm")[0].reset();


        $.each(initialFormData, function(key, value) {
            $("#" + key).val(value);
        });
    }
}
</script>

<script>
function confirmChanges() {
    if (confirm("Apakah Anda yakin ingin memasukan data?")) {
        document.getElementById("myForm").submit();
    } else {
        event.preventDefault();
    }
}
</script>

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