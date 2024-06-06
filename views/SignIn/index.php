    <!----------------------- Main Container -------------------------->
<form action="<?= BASEURL ?>/?controller=SignIn" method="post">

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="<?= BASEURL; ?>/img/logopix.png" class="img-fluid" style="width: 250px;">
           </div>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Halo, Giver Jember!</h2>
                     <p>Selamat datang kembali di aplikasi kami.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="ketik email" id="email1" name="email"  required >
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="ketik password"  name="password" id="password" required>
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                </div>
                <div class="input-group mb-3">
                    <button  type="submit" class="btn btn-lg btn-primary w-100 fs-6">Masuk</button>
                </div>
                <div class="row">
                    <small>Tidak Memiliki akun? <a href="<?= BASEURL ?>/?controller=SignUp">Daftar</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/<?= $data['css']; ?>.js"></script>
<script>
    function confirmLogout() {
        var confirmLogout = confirm("Apakah Anda yakin ingin logout?");

        if (confirmLogout) {
            window.location.href = '<?= BASEURL ?>/?controller=Logout';
        }
    }
</script>
</body>

</html>

