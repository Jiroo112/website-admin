<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Website ADEK</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <link rel="stylesheet" href="css/landingpage.css" />
  <link rel="icon" type="image/x-icon" href="<?= BASEURL; ?>/img/logo.png">
  
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
  <div class="logo">
            <img src="../app/upload/landingpage/logo.png" alt="Sirka Logo"> 
            <span class="navbar-logo">ADEK <span>(Ayo Diet Efektif Konsisten)</span></span>
        </div>

    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#features">Fitur Kami</a>
      <a href="#faq">FAQ</a>
      <a href="#contact">Kontak</a>
    </div>
    <div class="navbar-extra">
      <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram" style="font-size:24px"></i></a>
      <a href="https://youtube.com/@jessichaalvina4143?si=NDwDkQlCOm1vkRLz" class="youtube"><i class="fa fa-youtube" style="font-size:24px"></i></a>
      <a href="https://wa.me/qr/XTOYMK4MV3YSO1" class="whatsApp"><i class="fa fa-whatsapp" style="font-size:24px"></i></a>
      <a href="login" class="login-btn"><i class="fa fa-user" style="font-size:24px"></i></a>
      <h5 style="margin-left: 10px;">
            <?php 
            if (isset($data['nama']) && !empty($data['nama'])) {
                echo htmlspecialchars($data['nama']);
            } else {
                echo "Anda belum login.";
            }
            ?>
            </h5>
      <a href="#" id="menu"><i data-feather="menu"></i></a>
    </div>

  </nav>
  <section id="home" class="carousel-container">
    <div class="carousel">
      <div class="slide">
        <div class="slide-image">
            <img src="../app/upload/landingpage/slide1.jpg" alt="Slide1" />
        </div>
      </div>

      <div class="slide">
        <div class="slide-image"><img src="../app/upload/landingpage/skile2.png" alt="Slide2" /></div>
      </div>

      <div class="slide">
        <div class="slide-image"> <img src="../app/upload/landingpage/slide3.png" alt="Slide3" /></div>
      </div>

      <div class="slide">
        <div class="slide-image"><img src="../app/upload/landingpage/slide4.png" alt="Slide4" /></div>
      </div>
    </div>

    <!-- Navigation Arrows -->
    <div class="swiper-button-next" onclick="moveSlide(1)"></div>
    <div class="swiper-button-prev" onclick="moveSlide(-1)"></div>

    <!-- Dots for Navigation -->
    <div class="dots">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  
   </section>
   <script src="js/slide.js"></script>

   <!-- About Section -->
  <section id="about" class="about">
    <h2>Tentang ADEK</h2>
    <div class="row">
      <div class="about-img">
      <img src="../app/upload/landingpage/about_image.jpg" alt="About Us" />
      </div>
      <div class="content">
        <h3>Kenapa Pilih ADEK?</h3>
        <p>
        ADEK (Ayo Diet Efektif Konsisten) adalah aplikasi untuk membantu kamu mencapai target diet dan hidup sehat dengan mudah. 
        ADEK menyediakan rencana makan yang disesuaikan dengan kebutuhan tubuhmu, sehingga diet terasa ringan dan menyenangkan. 
        Dengan fitur cerdas, ADEK membuatmu tetap konsisten menjalani pola hidup sehat tanpa ribet. Yuk, mulai hidup sehat sekarang! 
        Unduh ADEK dan capai target dietmu dengan lebih mudah
        </p>
        <h3>Download Sekarang!</h3>
        <div class="download-buttons">
        <a href="https://play.google.com/store/apps/details?id=com.adekapp" class="store-button">
        <img src="../app/upload/landingpage/GooglePlay.png" alt="Get it on Google Play" class="store-badge"></a>
        <a href="https://apps.apple.com/id/app/adekapp" class="store-button">
        <img src="../app/upload/landingpage/AppStore.png" alt="Download on the App Store" class="store-badge"></a>
        </div>
      </div>
    </div>
  </section>

<!-- Features Section -->
<section id="features" class="features">
    <h2>Spesial dari ADEK</h2>
    <p>Memiliki fitur menarik sehingga membuat pengalaman diet anda menjadi lebih mudah dan teratur!</p>
    <div class="features-container">
        <div class="image">
            <img src="../app/upload/landingpage/fitur_hp.png" alt="Phone Image"> 
        </div>

        <!-- Features Grid on the right -->
        <div class="grid">
            <div class="feature-card">
                <img src="../app/upload/landingpage/kalkulator.png" alt="Icon Fitur 1" />
                <h3>Catat Asupan Menu setiap hari</h3>
                <p>Catat asupan, kalori terbakar, langkah, dan aktivitas lainnya</p>
            </div>
            <div class="feature-card">
                <img src="../app/upload/landingpage/jelajahi.png" alt="Icon Fitur 2" />
                <h3>Jelajahi Informasi Seputar Kesehatan</h3>
                <p>Baca semua informasi kesehatan yang sesuai dengan target kesehatanmu</p>
            </div>
            <div class="feature-card">
                <img src="../app/upload/landingpage/konsultan.jpg" alt="Icon Fitur 3" />
                <h3>Konsultasi Kesehatan Gratis</h3>
                <p>Nikamti Layanan Kesehatan Gratis dan Terpercaya</p>
            </div>
            <div class="feature-card">
                <img src="../app/upload/landingpage/bmi.png" alt="Icon Fitur 4" />
                <h3>Perhitungan BMI</h3>
                <p>Kumpulkan poin dan capai peringkat tertinggi!</p>
            </div>
        </div>
    </div>
</section>

 <!-- Testimonial Section -->
 <section class="testimonials">
        <h2 class="title">Apa Kata Mereka?</h2>
        <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="profile-image">
                            <img src="../app/upload/landingpage/orang1.jpeg" alt="Lucia Eka Wulandari">
                        </div>
                        <div class="testimonial-content">
                            <h3 class="name">Khalidah Kurania</h3>
                            <p class="comment">
                                ADEK adalah solusi terbaru bagi Anda yang ingin mencapai gaya hidup sehat dengan cara yang sederhana dan konsisten. Aplikasi ini dirancang khusus untuk memudahkan setiap langkah diet Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="profile-image">
                            <img src="../app/upload/landingpage/orang2.jpeg" alt="Lucia Eka Wulandari">
                        </div>
                        <div class="testimonial-content">
                            <h3 class="name">Khaumar Abdi Setya</h3>
                            <p class="comment">
                                ADEK adalah solusi terbaru bagi Anda yang ingin mencapai gaya hidup sehat dengan cara yang sederhana dan konsisten. Aplikasi ini dirancang khusus untuk memudahkan setiap langkah diet Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="profile-image">
                            <img src="../app/upload/landingpage/orang3.jpeg" alt="Lucia Eka Wulandari">
                        </div>
                        <div class="testimonial-content">
                            <h3 class="name">Lucia Eka Wulandari</h3>
                            <p class="comment">
                                ADEK adalah solusi terbaru bagi Anda yang ingin mencapai gaya hidup sehat dengan cara yang sederhana dan konsisten. Aplikasi ini dirancang khusus untuk memudahkan setiap langkah diet Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="profile-image">
                            <img src="../app/upload/landingpage/orang4.jpeg" alt="Lucia Eka Wulandari">
                        </div>
                        <div class="testimonial-content">
                            <h3 class="name">Jemiriko Adisatya</h3>
                            <p class="comment">
                                ADEK adalah solusi terbaru bagi Anda yang ingin mencapai gaya hidup sehat dengan cara yang sederhana dan konsisten. Aplikasi ini dirancang khusus untuk memudahkan setiap langkah diet Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="profile-image">
                            <img src="../app/upload/landingpage/orang3.jpeg" alt="Lucia Eka Wulandari">
                        </div>
                        <div class="testimonial-content">
                            <h3 class="name">Cindy Alifah</h3>
                            <p class="comment">
                                ADEK adalah solusi terbaru bagi Anda yang ingin mencapai gaya hidup sehat dengan cara yang sederhana dan konsisten. Aplikasi ini dirancang khusus untuk memudahkan setiap langkah diet Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/testi.js"></script>


    <!-- FAQ Section -->
    <section id="faq" class="faq">
    <div class="faq-content">
        <h1>FAQ</h1>
        <div class="faq-wrapper">
            <div class="illustration">
                <img src="../app/upload/landingpage/orang_faq.jpg" alt="FAQ Illustration">
            </div>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">1. Apa itu aplikasi ADEK?</div>
                    <div class="faq-answer">ADEK adalah aplikasi yang membantu Anda menjalani program diet secara efektif dan konsisten.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">2. Bagaimana cara mencatat asupan makanan?</div>
                    <div class="faq-answer">Anda dapat mencatat asupan makanan langsung melalui fitur "Catat Asupan" di aplikasi.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">3. Apa saja fitur unggulan ADEK?</div>
                    <div class="faq-answer">Fitur unggulan ADEK meliputi pencatatan asupan, program kesehatan, poin & voucher, serta level & peringkat.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">4. Apakah ADEK gratis?</div>
                    <div class="faq-answer">Ya, ADEK dapat digunakan secara gratis. Namun, tersedia fitur premium dengan manfaat tambahan.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">5. Apa kelebihan Adek dibanding yang lain</div>
                    <div class="faq-answer">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia laudantium nesciunt vitae quaerat. Amet ea labore, rem tempore dolorum optio similique ipsum eligendi ex nihil sed dicta iste excepturi? Error..</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">6.  Saya kurang paham dengan perhitungan asupan makanan harian di Adek</div>
                    <div class="faq-answer">Jumlah total asupan per hari dihitung dari profil dan target kesehatanmu. Setiap hari kamu disarankan untuk mengkonsumsi sesuai dengan target asupan Fita. Jika kamu melakukan olahraga untuk membakar kalori, maka kamu harus memenuhi kebutuhan kalori tersebut.</div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="js/faq.js"></script>

  <!-- Contact Section -->
  <section id="contact" class="contact">
    <h2>Kontak Kami</h2>
    <p>Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami.</p>
    <div class="row">
    <div class="contact-info">
      <div class="contact-container">
            <div class="contact-item">
            <div class="icon-container">
                <i data-feather="map-pin"></i>
                </div>
                <div class="contact-item-content">
                    <h3>Location:</h3>
                    <p>Jl. Cadika VIII/9</p>
                </div>
            </div>
            
            <div class="contact-item">
            <div class="icon-container">
                <i data-feather="instagram"></i>
          </div>
                <div class="contact-item-content">
                    <h3>Instagram:</h3>
                    <p>@ADEK</p>
                </div>
            </div>
            
            <div class="contact-item">
            <div class="icon-container">
                <i data-feather="phone"></i>
          </div>
                <div class="contact-item-content">
                    <h3>Call:</h3>
                    <p>+62 895-3619-88169</p>
                </div>
            </div>
        </div>
          </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d698.165785623914!2d113.72290865114873!3d-8.160158515152116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2ssg!4v1727077570555!5m2!1sid!2ssg"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="maps"></iframe>

    </div>
  </section>
  <!-- Footer -->
  <footer>
    <div class="socials">
      <a href="https://www.instagram.com/"><i data-feather="instagram"></i></a>
      <a href="https://wa.me/qr/XTOYMK4MV3YSO1"><i data-feather="phone"></i></a>
      <a href="https://youtube.com/@jessichaalvina4143?si=NDwDkQlCOm1vkRLz"><i data-feather="youtube"></i></a>
    </div>
    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#features">Fitur Kami</a>
      <a href="#faq">FAQ</a>
      <a href="#contact">Kontak</a>
    </div>
    <div class="credit">
      <p>Created by <a href="https://www.linkedin.com/in/jessicha-alvina-68bb2120b">ADEK developer</a>. | &copy; 2024.</p>
    </div>
  </footer>

  <script src="https://unpkg.com/feather-icons"></script>
  <script src="js/navbar.js"></script>
</body>
</html>