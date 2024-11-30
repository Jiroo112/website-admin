<section class="home">
<div class="text">
    <div id="dashbord" class="content">
        <div class="head">
            <?php Flasher::flash(); ?>
            <h2>Dashboard</h2>
        </div>
    </div>
    <body>
        <div class="header-container">
            <div class="header-text">        
            <h1>
            <?php 
            // Memeriksa apakah email tersedia di session
            if (isset($email) && !empty($email)) {
            // Jika email ada, tampilkan
                echo "Halo, " . htmlspecialchars($email);
            } else {
            // Jika email tidak ada (belum login), tampilkan pesan
                echo "Anda belum login.";
            }
            ?>
            </h1>
            <p>Selamat bekerja, semoga harimu menyenangkan!</p>
            </div>
            <img class="header-img" src="<?=BASEURL;?>/img/gambar.png" alt="Header Image" />
        </div>

<!-- Menampilkan data total -->
<div class="dashboard-stats">
<div class="stat">
    <i class="bx bx-food-menu icon"></i>
        <?php foreach ($data['menu'] as $totalMenu): ?>
        <p>
            <span class="total-number"><?= $totalMenu['total']; ?></span>
            <span class="total-label">Total Menu</span>
        </p>
        <?php endforeach; ?>
</div>
<div class="stat">
    <i class="bx bx-user icon"></i>
        <?php foreach ($data['pengguna'] as $totalPengguna): ?>
        <p>  
            <span class="total-number"><?= $totalPengguna['total']; ?></span>
            <span class="total-label">Total Pengguna</span>
        </p>
        <?php endforeach; ?>
</div>

<div class="stat">
<i class="bx bx-book icon"></i>
    <p>  
        <?php foreach ($data['artikel'] as $totalArtikel): ?>
            <span class="total-number"><?= $totalArtikel['total']; ?></span>
            <span class="total-label">Total Artikel</span>
        <?php endforeach; ?>
    </p>
</div>

<div class="stat">
<i class="bx bx-run icon"></i>
    <p>  
        <?php foreach ($data['olahraga'] as $totalOlahraga): ?>
            <span class="total-number"><?= $totalOlahraga['total']; ?></span>
            <span class="total-label">Total Olahraga</span>
        <?php endforeach; ?>
    </p>
</div>

<div class="stat">
<i class="bx bx-plus-medical icon"></i>
    <p>  
        <?php foreach ($data['konsultan'] as $totalKonsultan): ?>
            <span class="total-number"><?= $totalKonsultan ['total']; ?></span>
            <span class="total-label">Total Konsultan</span>
        <?php endforeach; ?>
    </p>
</div>

        </div>

        <!-- Daftar Artikel -->
        <div class="article-container">
        <?php foreach ($data['articles'] as $article) : ?>
        <div class="article">
        <?php $imgSrc = '/admin-adek/app/upload/buku/'. $article['gambar']?>
        <img src="<?= $imgSrc; ?>" alt="Gambar Buku" width="75" height="75">
        <div class="text-container">
                <h2><?= $article['judul']; ?></h2>
                <span class="kategori"><?= $article['kategori']; ?></span>
                </div>    
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</section>
