<section class="home">
    <div id="previewImg" class="img hidden">
        <div class="img-content">
            <span id="closeImg" class="close-img">&times;</span>
            <img id="previewImage" src="" alt="Preview Image" />
        </div>
    </div>
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash(); ?>
                <h2>Edit Landing Page</h2>
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
            <img class="header-img" src="<?=BASEURL;?>/img/gambar.png" alt="Header Image" />
        </div>
        <div class="container">
            <?php foreach ($data['user'] as $landing): ?>
                <form action="<?= BASEURL; ?>landingpage/updateHero" method="post" class="landing-form" enctype="multipart/form-data">
                    <h2>Hero Section</h2>
                    <div class="form-group">
                        <label for="hero_tittle">Hero Tittle</label>
                        <input type="text" id="hero_tittle" name="hero_tittle" required />
                    </div>
                    <div class="form-group">
                        <label for="hero_cta">Hero Cta</label>
                        <input type="text" id="hero_cta" name="hero_cta" required />
                    </div>
                    <div class="form-group">
                        <label>Hero Image</label>

                        <div class="file-input">
                            <label for="fileUpload" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUpload" name="gambar" hidden />
                            <span id="fileName" onclick="showPreview('../app/upload/landing/hero/<?= $landing['hero_image'] ?>')">No file chosen</span>
                            <span id="removeFile" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="button button-save" id="submitLanding">
                            Update
                        </button>
                    </div>
                </form>
                <form action="<?= BASEURL; ?>landingpage/updateAbout" method="post" class="landing-form" enctype="multipart/form-data">
                    <h2>About Section</h2>
                    <div class="form-group">
                        <label for="about_title">About Tittle</label>
                        <input type="text" id="about_title" name="about_title" required />
                    </div>
                    <div class="form-group">
                        <label for="about_title" id="about_title">About Image</label>
                        <div class="file-input">
                            <label for="fileUploadAbout" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUploadAbout" name="gambar" hidden />
                            <span id="fileAbout" onclick="showPreview('../app/upload/landing/about/<?= $landing['about_image'] ?>')">No file chosen</span>
                            <span id="removeFileAbout" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about_description">About Description</label>
                        <textarea id="about_description" name="about_description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="android_download">Android Download</label>
                        <input type="text" id="android_download" name="android_download" required />
                    </div>
                    <div class="form-group">
                        <label for="ios_download">Ios Download</label>
                        <input type="text" id="ios_download" name="ios_download" required />
                    </div>
                    <div class="button-group">
                        <button type="submit" class="button button-save" id="submitLanding">
                            Update
                        </button>
                    </div>
                </form>
            <?php endforeach; ?>
            <form action="<?= BASEURL; ?>landingpage/updatefitur" method="post" class="landing-form" enctype="multipart/form-data">
                <?php foreach ($data['fitur'] as $fitur): ?>
                    <h2>Fitur & testi Section</h2>

                    <div class="form-group">
                        <label for="fitur_title">Hero Title</label>
                        <input type="text" id="fitur_title" name="fitur_title" required />
                    </div>
                    <div class="form-group">
                        <label for="fitur_cta">Hero Cta</label>
                        <input type="text" id="fitur_cta" name="fitur_cta" required />
                    </div>
                    <div class="form-group">
                        <label>Hero Image</label>
                        <div class="file-input">
                            <label for="fileUploadHeroimg" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUploadHeroimg" name="gambar" hidden />
                            <span id="fileHeroimg" onclick="showPreview('../app/upload/landing/hero_image/<?= $fitur['hero_image'] ?>')">No file chosen</span>
                            <span id="removeFileHeroimg" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subhero1 img</label>
                        <div class="file-input">
                            <label for="fileUploadsubhero1_img" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUploadsubhero1_img" name="gambar2" hidden />
                            <span id="filesubhero1_img" onclick="showPreview('../app/upload/landing/subhero1_img/<?= $fitur['subhero1_img'] ?>')">No file chosen</span>
                            <span id="removeFilesubhero1_img" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subhero2 img</label>
                        <div class="file-input">
                            <label for="fileUploadsubhero2_img" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUploadsubhero2_img" name="gambar3" hidden />
                            <span id="filesubhero2_img" onclick="showPreview('../app/upload/landing/subhero2_img/<?= $fitur['subhero2_img'] ?>')">No file chosen</span>
                            <span id="removeFilesubhero2_img" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subhero3 img</label>
                        <div class="file-input">
                            <label for="fileUploadsubhero3_img" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUploadsubhero3_img" name="gambar4" hidden />
                            <span id="filesubhero3_img" onclick="showPreview('../app/upload/landing/subhero3_img/<?= $fitur['subhero3_img'] ?>')">No file chosen</span>
                            <span id="removeFilesubhero3_img" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subhero4 img</label>
                        <div class="file-input">
                            <label for="fileUploadsubhero4_img" id="chooser" class="choose-file">Choose File</label>
                            <input type="file" id="fileUploadsubhero4_img" name="gambar5" hidden />
                            <span id="filesubhero4_img" onclick="showPreview('../app/upload/landing/subhero4_img/<?= $fitur['subhero4_img'] ?>')">No file chosen</span>
                            <span id="removeFilesubhero4_img" class="remove-file" style="display: none">✖</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc_subhero1">Desc subhero1</label>
                        <textarea id="desc_subhero1" name="desc_subhero1" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc_subhero2">Desc subhero2</label>
                        <textarea id="desc_subhero2" name="desc_subhero2" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc_subhero3">Desc subhero3</label>
                        <textarea id="desc_subhero3" name="desc_subhero3" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc_subhero4">Desc subhero4</label>
                        <textarea id="desc_subhero4" name="desc_subhero4" rows="4" required></textarea>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="button button-save" id="submitLanding">
                            Update
                        </button>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
    </div>
</section>