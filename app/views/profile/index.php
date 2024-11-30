<section class="home">
    <div class="text">

        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash();?>
                <h2>Edit Profil</h2>
            </div>
        </div>
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
            <img class="header-img" src="<?= BASEURL; ?>/img/gambar.png" alt="Header Image" />
        </div>
        <div class="container">
            <form action="<?= BASEURL; ?>profil/updateprofile" method="post" class="profil-form">
                <?php foreach ($data['user'] as $profil): ?>
                    <?php $imgSrc = '/admin-adek/app/upload/profil/' . $profil['gambar']; ?>
                    <div class="profile-image">
                        <img src="<?= $imgSrc ?>" alt="Profile Image" id="profile-image">
                        <div class="file-input">
                            <label for="fileUpload" id="chooser" class="change-photo"><i class="bx bxs-edit"></i></label>
                            <input type="file" id="fileUpload" name="gambar" hidden />
                        </div>
                    </div>
                    <div class="left-column">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?= $profil["username"] ?>" readonly required>

                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="<?= $profil["email"] ?>">

                        <label for="password">Password:</label>
                        <input type="text" id="password" name="password" value="<?= $profil["password"] ?>">

                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" value="<?= $profil["nama"] ?>">

                        <label for="notelp_admin">No Telepon:</label>
                        <input type="text" id="notelp_admin" name="notelp_admin" value="<?= $profil["notelp_admin"] ?>">
                    </div>
                <?php endforeach; ?>
            </form>
            <div class="button-group">
                        <button type="submit" class="button button-simpan" id="submitProfile">
                            Simpan
                        </button>
                    </div>
        </div>
    </div>
</section>