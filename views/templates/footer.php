<!-- Footer -->
<footer class="bg-primary text-center">
<div class="container-fluid" style="padding-left: 0; padding-right: 0;">


            <footer class="bg-primary text-lg-start text-white">
                <!-- Grid container -->
                <div class="container p-4 ">
                    <!-- Grid row -->
                    <div class="row my-4">

                        <!-- Grid column 1 -->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                                <img src="<?= BASEURL; ?>/img/logopix.png" height="100%" alt="" loading="lazy" />
                            </div>
                            <p class="text-center" style="font-size: 3rem; font-weight:600;">Jember House Of Orphanage</p>
                            <ul class="list-unstyled d-flex flex-row justify-content-center">

                            </ul>
                        </div>
                        <!-- End Grid column 1 -->

                        <!-- Grid column 2 -->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0" style="margin-left: auto;">
                            <div class="box">
                                <h3 style="color: var(--ocean); font-size:2.5rem; font-weight:600;">Situs Cari dan Bantu Panti di Jember</h3>
                                <p >J-Hopes (Jember House of Oprhanage) sebuah platform online yang bergerak dalam pemetaan dan pemberdayaan panti - panti di Jember, Indonesia</p>
                            </div>
                        </div>
                        <!-- End Grid column 2 -->

                        <!-- Grid column 3 -->
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <div class="box">
                                <h3 style="color: var(--ocean);  font-size:3rem; font-weight: 600;">J-Hopes</h3>
                                <ul style="list-style: none; padding: 0; margin-top: 1rem; font-size:14px;">
                                    <li><a href="?controller=Home" style=" color: white; margin-top: 1rem;  display: block; transition: color 0.3s;" onmouseover="this.style.color='var(--ocean)'" onmouseout="this.style.color='white'"><i class="fas fa-caret-right"></i> Beranda</a></li>
                                    <li><a href="?controller=About" style=" color: white; margin-top: 1rem; display: block; transition: color 0.3s;" onmouseover="this.style.color='var(--ocean)'" onmouseout="this.style.color='white'"><i class="fas fa-caret-right"></i> Tentang Kami</a></li>
                                    <li><a href="?controller=Cari" style=" color: white; margin-top: 1rem; display: block; transition: color 0.3s;" onmouseover="this.style.color='var(--ocean)'" onmouseout="this.style.color='white'"><i class="fas fa-caret-right"></i> Cari Panti</a></li>
                                    <li><a href="?controller=Kabar" style=" color: white; margin-top: 1rem; display: block; transition: color 0.3s;" onmouseover="this.style.color='var(--ocean)'" onmouseout="this.style.color='white'"><i class="fas fa-caret-right"></i> Kabar Panti-Panti J-Hopes</a></li>
                                    <!-- ... (repeat for other list items) -->
                                </ul>
                            </div>
                        </div>
                        <!-- End Grid column 3 -->

                        <!-- Grid column 4 -->

                        <!-- End Grid column 4 -->
                    </div>
                    <!-- End Grid row -->
                </div>
                <!-- End Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3 m-0" style="background-color: rgba(0, 0, 0, 0.2)">
                    copyright @ 2023 by
                    <a class="text-white" href="#">J-Hopes ~ Jember House of Orphans</a>
                </div>

                <!-- End Copyright -->
            </footer>

        </div>

</footer>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
      },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
</script>

<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/js/<?= $data['css']; ?>.js"></script>
<script>
    function confirmLogout() {
        var confirmLogout = confirm("Apakah Anda yakin ingin logout?");

        if (confirmLogout) {
            window.location.href = '?controller=Logout';
        }
    }
</script>
</body>

</html>
