<!-- Footer -->
<footer class="text-center text-lg-start text-white" style="background-color: #3C6255">
    <!-- Grid container -->
    <div class="container-fluid p-4 pb-0" style="font-size: 20px;">
        <!-- Section: Links -->
        <section class="" style="display: flex; justify-content: center;">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class=" mb-4 text-orange" style="font-size: 28px;">
                        Company name
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer
                        content. Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                    </p>
                    <div class="d-flex justify-content-start">
                        <a class="text-white me-3" href="#"><i style="font-size: 1.3em;"
                                class="bi bi-facebook link-footer"></i></a>
                        <a class="text-white me-3"
                            href="https://youtube.com/@sditalqudwahngadirejo?si=wB1LZzfdDcQmmX_1"><i
                                style="font-size: 1.3em;" class="bi bi-youtube  link-footer"></i></a>
                        <a class="text-white me-3"
                            href="https://www.instagram.com/sditqudwah?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                                style="font-size: 1.3em;" class="bi bi-instagram link-footer"></i></a>
                    </div>
                </div>

                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class=" mb-4 font-weight-bold text-orange" style="font-size: 28px;">
                        Link Terkait
                    </h6>
                    <p>
                        <a class="text-white text-decoration-none link-footer" href="/tentang-kami">Tentang Kami</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none link-footer" href="/program-unggulan">Program
                            Unggulan</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none link-footer" href="/informasi-ppdb">Informasi
                            PPDB</a>
                    </p>
                    <p>
                        <a class="text-white text-decoration-none link-footer" href="/ppdb-online">PPDB Online</a>
                    </p>
                </div>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 ">
                    <h6 class=" mb-4 font-weight-bold text-orange" style="font-size: 28px;">Kontak Kami</h6>
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <i class="bi bi-geo-alt-fill me-3" style="font-size: 1.5em;"></i>
                        <a class="text-white link-footer" style="margin-bottom: 0;"
                            href="https://maps.app.goo.gl/C9HYsoC4K4eteE66A">Jalan Raya, Ngempon, Ngadirejo, Kab.
                            Temanggung, Jawa Tengah 56255
                        </a>
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <i class="bi bi-envelope-at-fill me-3" style="font-size: 1.5em;"></i>
                        <a class="text-white link-footer" style="margin-bottom: 0;"
                            href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=sditalqudwah20@gmail.com&su=Pesan%20Saya&body=Halo,%20ini%20adalah%20pesan%20saya.&tf=1">sditalqudwah20@gmail.com
                        </a>
                    </div>
                    <a href="https://wa.me/6281325825097" target="_blank" class="btn mb-3"
                        style="background-color: #34eb4c; color: white; font-size:1.2em;">
                        <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                    </a>
                </div>
                <!-- Grid column -->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->

        <hr class="my-3">

        <!-- Section: Copyright -->
        <section class="p-2 pt-0" tyle="display: flex; justify-content: center;">
            <div class="row d-flex align-items-center">
                <!-- Grid column -->
                <div class="text-center">
                    <!-- Copyright -->
                    <div class="p-3" style="font-size: 20px;">
                        © 2024 Copyright: 2024 SDIT Al-Qudwah Ngadirejo
                    </div>
                    <!-- Copyright -->
                </div>
                <!-- Grid column -->
            </div>
        </section>
        <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
</footer>
<!-- Footer -->

{{-- script footer --}}
<script>
    // ini untuk text link
    $(document).ready(function() {
        $(".link-footer").hover(function() {
            $(this).removeClass('text-white').addClass('text-orange');
        }, function() {
            $(this).removeClass('text-orange').addClass('text-white');
        });
    });
</script>
