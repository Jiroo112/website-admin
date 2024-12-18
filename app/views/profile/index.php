<section class="home">
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash(); ?>
                <h2>Edit Profil</h2>
            </div>
        </div>
        <div class="container-profile">
            <form action="<?= BASEURL; ?>profil/updateprofile" method="post" id="profile" enctype="multipart/form-data">
                <?php foreach ($data['user'] as $profil): ?>
                    <?php $imgSrc = '/admin-adek/app/upload/profil/' . $profil['gambar']; ?>
                    <div class="gambar">
                        <img src="<?= $imgSrc ?>" alt="Profile Image" id="profile-image">
                    </div>
                    <div class="file-input">
                        <label for="fileUpload" id="chooser" class="change-photo"><i class="bx bxs-edit"></i></label>
                        <input type="file" id="fileUpload" name="gambar" hidden />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?= $profil['username'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= $profil['email'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?= $profil['password'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" value="<?= $profil['nama'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No hp</label>
                        <input type="number" id="notelp_admin" name="notelp_admin" value="<?= $profil['notelp_admin'] ?>" />
                    </div>
                    <div class="button-group">
                        <button type="submit" class="button button-save" id="submitUser">
                            Simpan
                        </button>
                    </div>

                <?php endforeach; ?>
            </form>
        </div>
    </div>
</section>