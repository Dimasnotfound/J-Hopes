<?php 

$tipePanti = $data['tipePanti'];
$provinsi =$data['provinsi'];
$kota = $data['kabupatenKota'];
$kecamatan =  $data['kecamatan'];
$kebutuhan = $data['kebutuhan'];
$pantiData = $data['detailPanti']; 

$userStatus= '';
$userStatus = $_SESSION['user_status'];
?>
<section class="home" id="home">
    <div class="content">
        <h3><?= $pantiData["nama_panti"]; ?></h3>
    </div>
</section>



<section class="about" id="about">
    <?php if ($userStatus === 'admin') : ?>
    <div class="heading fw-bold">--(EDIT INFORMASI)--</div>
    <?php else : ?>
    <h1 class="heading">Informasi Panti Asuhan</h1>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="btn btn-primary rounded p-4">
            <span><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-map"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103M10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8zm-6-.8V1.11l-4 .8v12.98z" />
                </svg>
            </span>
            <a href="https://www.google.com/maps/@<?= $pantiData["link_gmap"]; ?>,14z?entry=ttu"
                class="h4 fw-bold p-2 text-center text-decoration-none text-white">Petunjuk Arah</a>
        </div>
    </div>
    <?php endif; ?>


    <?php if ($userStatus === 'admin') : ?>
    <div class="container">
        <form action="" method="post" id="myForm">
            <div class="text-container">
                <div class="pt-5">
                    <span class="h1 fw-bold">Nama Panti:</span>
                    <input type="text" name="nama_panti"
                        class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        value="<?= $pantiData["nama_panti"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Tipe Panti:</span>
                    <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                        name="id_tipe_panti">
                        <option value="<?= $pantiData['id_tipe_panti'] ?>"><?= $tipePanti['tipe_panti'] ?></option>
                        <?php foreach ($data['dropTipePanti'] as $tipepanti) : ?>
                        <option value="<?= $tipepanti['id_tipe_panti']; ?>"><?= $tipepanti['tipe_panti']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">No Telepon Panti:</span>
                    <input type="text"
                        class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="no_telp_panti" value="<?= $pantiData["no_telp_panti"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Nama Pemilik:</span>
                    <input type="text"
                        class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="nama_pemilik" value="<?= $pantiData["nama_pemilik"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">No Telepon Pemilik Panti :</span>
                    <input type="text"
                        class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="no_telp_pemilik_panti" value="<?= $pantiData["no_telp_pemilik_panti"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Deskripsi Panti : </span>
                    <div class="mt-5">
                        <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2" rows="4"
                            name="deskripsi_panti"><?= $pantiData["deskripsi_panti"]; ?></textarea>
                    </div>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Alamat :</span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="alamat" value="<?= $pantiData["alamat"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Provinsi :</span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 "
                        value="<?= $provinsi["nama_provinsi"]; ?>" readonly></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Kabupaten/Kota: </span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 "
                        value="<?= $kota["nama"]; ?> " readonly></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Kecamatan :</span>
                    <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                        name="id_kecamatan">
                        <option value="<?= $pantiData['id_kecamatan'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
                        <?php foreach ($data['dropkecamatan'] as $camatan) : ?>
                        <option value="<?= $camatan['id_kecamatan']; ?>"><?= $camatan['nama_kecamatan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Kebutuhan Panti: </span>
                    <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                        name="id_kebutuhan_panti">
                        <option value="<?= $pantiData['id_kebutuhan_panti'] ?>"><?= $kebutuhan['nama_kebutuhan'] ?>
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
                            name="deskripsi_kebutuhan_panti"><?= $pantiData["deskripsi_kebutuhan_panti"]; ?></textarea>
                    </div>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Jumlah Pengurus: </span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="jumlah_pengurus" value="<?= $pantiData["jumlah_pengurus"]; ?> ">
                    <span class="h4 fw-semibold mx-2 text-black">Orang</span>
                    </input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Jumlah Anak Asuh : </span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="jumlah_anak_asuh" value="<?= $pantiData["jumlah_anak_asuh"]; ?>  ">
                    <span class="h4 fw-semibold mx-2 text-black">Orang</span></input>
                </div>
                <div class="heading fw-bold">--(INFORMASI DONASI)--</div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Nama Pemilik Rekening:</span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="namapemilik_rekening" value="<?= $pantiData["namapemilik_rekening"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Nama Bank:</span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="nama_bank" value="<?= $pantiData["nama_bank"]; ?>"></input>
                </div>
                <div class="pt-5">
                    <span class="h1 fw-bold">Nomor Rekening:</span>
                    <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="no_rekening" value="<?= $pantiData["no_rekening"]; ?>"></input>
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
    <?php else : ?>
    <div class="container">
        <div class="text-container">
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Panti:</span>
                <input type="text" name="nama_panti"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    value="<?= $pantiData["nama_panti"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Tipe Panti:</span>
                <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                    name="id_tipe_panti" disabled>
                    <option value="<?= $pantiData['id_tipe_panti'] ?>"><?= $tipePanti['tipe_panti'] ?></option>
                </select>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">No Telepon Panti:</span>
                <input type="text"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="no_telp_panti" value="<?= $pantiData["no_telp_panti"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Pemilik:</span>
                <input type="text"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="nama_pemilik" value="<?= $pantiData["nama_pemilik"]; ?>"></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">No Telepon Pemilik Panti :</span>
                <input type="text"
                    class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="no_telp_pemilik_panti" value="<?= $pantiData["no_telp_pemilik_panti"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Deskripsi Panti : </span>
                <div class="mt-5">
                    <textarea class="h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2" rows="4"
                        name="deskripsi_panti" readonly><?= $pantiData["deskripsi_panti"]; ?></textarea>
                </div>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Alamat :</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="alamat" value="<?= $pantiData["alamat"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Provinsi :</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 "
                    value="<?= $provinsi["nama_provinsi"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Kabupaten/Kota: </span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2 "
                    value="<?= $kota["nama"]; ?> " readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Kecamatan :</span>
                <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                    name="id_kecamatan" disabled>
                    <option value="<?= $pantiData['id_kecamatan'] ?>"><?= $kecamatan['nama_kecamatan'] ?></option>
                </select>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Kebutuhan Panti: </span>
                <select class=" h3 fw-semibold select-box bg-light p-3 rounded-4 border border-primary border-2"
                    name="id_kebutuhan_panti" disabled>
                    <option value="<?= $pantiData['id_kebutuhan_panti'] ?>"><?= $kebutuhan['nama_kebutuhan'] ?></option>
                </select>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Deskripsi Kebutuhan Panti : </span>
                <div class="mt-5">
                    <textarea class=" h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                        name="deskripsi_kebutuhan_panti"
                        readonly><?= $pantiData["deskripsi_kebutuhan_panti"]; ?></textarea>
                </div>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Jumlah Pengurus: </span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="jumlah_pengurus" value="<?= $pantiData["jumlah_pengurus"]; ?> Orang" readonly>

                </input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Jumlah Anak Asuh : </span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="jumlah_anak_asuh" value="<?= $pantiData["jumlah_anak_asuh"]; ?> Orang" readonly>
                </input>
            </div>
            <div class="heading fw-bold">MARI BERDONASI</div>
            <div class="gap-2 mb-3">
                <div class="container d-flex align-items-center justify-content-center">
                    <div class="btn btn-success rounded p-4">
                        <a href="https://<?= $pantiData["no_wa"]; ?>"
                            class="h4 fw-bold p-2 text-center text-decoration-none text-white">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                            </span>
                            <span class="h4 fw-bold p-2 text-center">Whatsapp</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Pemilik Rekening:</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="namapemilik_rekening" value="<?= $pantiData["namapemilik_rekening"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nama Bank:</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="nama_bank" value="<?= $pantiData["nama_bank"]; ?>" readonly></input>
            </div>
            <div class="pt-5">
                <span class="h1 fw-bold">Nomor Rekening:</span>
                <input class="text-center h3 fw-semibold bg-light p-3 rounded-4 border border-primary border-2"
                    name="no_rekening" value="<?= $pantiData["no_rekening"]; ?>" readonly></input>
            </div>
        </div>
    </div>
    <?php endif; ?>



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
    nama_panti: "<?= $pantiData['nama_panti']; ?>",
    id_tipe_panti: "<?= $pantiData['id_tipe_panti']; ?>",
    no_telp_panti: "<?= $pantiData['no_telp_panti']; ?>",
    nama_pemilik: "<?= $pantiData['nama_pemilik']; ?>",
    no_telp_pemilik_panti: '<?= $pantiData["no_telp_pemilik_panti"]; ?>',
    deskripsi_panti: '<?= $pantiData["deskripsi_panti"]; ?>',
    alamat: '<?= $pantiData["alamat"]; ?>',
    id_kecamatan: '<?= $pantiData['id_kecamatan'] ?>',
    id_kebutuhan_panti: '<?= $pantiData['id_kebutuhan_panti'] ?>',
    deskripsi_kebutuhan_panti: '<?= $pantiData["deskripsi_kebutuhan_panti"]; ?>',
    jumlah_pengurus: '<?= $pantiData["jumlah_pengurus"]; ?>',
    jumlah_anak_asuh: '<?= $pantiData["jumlah_anak_asuh"]; ?>',
    namapemilik_rekening: '<?= $pantiData["namapemilik_rekening"]; ?>',
    nama_bank: '<?= $pantiData["nama_bank"]; ?>',
    no_rekening: '<?= $pantiData["no_rekening"]; ?>',
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
    if (confirm("Apakah Anda yakin ingin mengubah data?")) {
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