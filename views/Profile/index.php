<br><br><br>
<div class="container pt-5">
    <div class="container bootstrap snippets bootdey">
        <h1 class="h1 text-primary fw-bold">Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                        class="avatar img-circle img-thumbnail cover" alt="avatar">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <?php
                if(isset($data['updateProfile'])){
                    $updateProfile = $data['updateProfile'];
                    if(isset($updateProfile) && is_array($updateProfile) && count($updateProfile) > 0) {
                        $updateProfile = $updateProfile[0]; 
                    } else {
                        
                    }
                }else{
                }
            
            $profile = $data['profile'];
                    if(isset($profile) && is_array($profile) && count($profile) > 0) {
                        $firstProfile = $profile[0]; 
                    } else {
                    }
                    ?>

                <h3 class="h-1 fw-bold ">PERSONAL INFO</h3>
                <form method='post'>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name='new_username' class="form-control" id="Username"
                            value='<?= isset($firstProfile['nama']) ? $firstProfile['nama'] : $updateProfile['nama']; ?>'>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name='new_email' class="form-control" id="InputEmail1"
                            aria-describedby="emailHelp"
                            value="<?= isset($firstProfile['email']) ? $firstProfile['email'] : $updateProfile['email']; ?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name='new_password' class="form-control" id="PasswordInput"
                            value="<?=  isset($firstProfile['password']) ? $firstProfile['password'] : $updateProfile['password']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                        <input type="password" name='confirm_password' class="form-control" id="ConfirmPasswordInput"
                            value="<?=  isset($firstProfile['konfirmasi_password']) ? $firstProfile['konfirmasi_password'] : $updateProfile['konfirmasi_password']; ?>">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="showPasswordCheckbox">
                        <label class="form-check-label" for="showPasswordCheckbox">Lihat Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="confirmUpdate()">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<hr>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
function confirmUpdate() {
    var confirmation = confirm("Apakah Anda yakin ingin mengupdate data?");

    if (confirmation) {
        document.getElementById("formUpdate").submit();
    } else {
        event.preventDefault();
    }
}
</script>

<script>
document.getElementById('showPasswordCheckbox').addEventListener('change', function() {
    var passwordInput = document.getElementById('PasswordInput');
    var confirmPasswordInput = document.getElementById('ConfirmPasswordInput');

    if (this.checked) {
        passwordInput.type = 'text';
        confirmPasswordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
        confirmPasswordInput.type = 'password';
    }
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