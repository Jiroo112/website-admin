<section class="home">
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash(); ?>
                <h2>Daftar olahraga</h2>
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
            <div class="search-plus-container" id="searchPlusContainer">
            <div class="filter-container">
                <form action="<?= BASEURL; ?>olahraga/filter" method="post" class="search-form">
                    <select id="filter" name="filter" onchange="this.form.submit()" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="all">All</option>
                        <option value="kekuatan">Kekuatan</option>
                        <option value="kardio">Kardio</option>
                        <option value="interval">Interval</option>
                    </select>
                </form>
                </div>

                <div class="right-controls">
                <div class="plus" id="addOlahraga" aria-label="Add Olahraga" data-id="<?= $data['id']['id_terbesar']; ?>">
                    <i class="bx bxs-plus-circle"></i>
                </div>
                <form action="<?= BASEURL; ?>olahraga/cari" method="post" class="search-form">
                    <div class="search" id="searching"><i class="bx bx-search-alt-2"></i>
                        <input
                            class="search-input"
                            id="searchOlahraga"
                            type="text"
                            name="keyword"
                            placeholder="Search" />
                    </div>
                </form>
            </div>
            </div>
            <div class="table-container" id="tableContainer">
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Olahraga</th>
                            <th>Nama Olahraga</th>
                            <th>Deskripsi</th>
                            <th>Jenis Olahraga</th>
                            <th>Usename</th>
                            <th>Gambar</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_olahraga">
                        <?php foreach ($data['olahraga'] as $olahraga): ?>
                            <?php $imgSrc = '/admin-adek/app/upload/olahraga/' . $olahraga['gambar'] ?>
                            <tr>
                                <td><?= $olahraga['id_olahraga']; ?></td>
                                <td><?= $olahraga['nama_olahraga']; ?></td>
                                <td><?= $olahraga['deskripsi']; ?></td>
                                <td><?= $olahraga['jenis_olahraga']; ?></td>
                                <td><?= $olahraga['username']; ?></td>
                                <td><img src="<?= $imgSrc; ?>" alt="Gambar Buku" width="75" height="75"></td>
                                <td><a href="<?= BASEURL; ?>olahraga/edit/<?= $olahraga['id_olahraga'] ?>" id="editOlahraga" onclick="event.preventDefault(); openModal();"><i class="bx bx-edit-alt editOlahraga-icon" title="Edit" data-id="<?= $olahraga['id_olahraga']; ?>"></i></a>
                                    <a href="<?= BASEURL; ?>olahraga/hapus/<?= $olahraga['id_olahraga'] ?>" onclick="return confirm('yakin?');"><i class="bx bx-trash delete-icon" onclick="" title="Delete"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="addOlahragaModal" class="modal-panel">
            <div class="contain-modal">
                <form action="<?= BASEURL; ?>olahraga/updateprofile" method="post" id="addolahragaForm" enctype="multipart/form-data">
                    <h2 class="Title-label">Tambah Data Olaharaga</h2>
                    <div class="form-container">
                        <!-- Kolom Kiri -->
                        <div class="left-column">
                            <div class="form-group">
                                <label for="id_olahraga">ID Olahraga</label>
                                <input type="text" id="id_olahraga" name="id_olahraga" required readonly />
                            </div>
                            <div class="form-group">
                                <label for="nama_olahraga">nama_olahraga</label>
                                <input type="text" id="nama_olahraga" name="nama_olahraga" required />
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="right-column">
                            <div class="form-group">
                                <label for="jenis_olahraga">Jenis olahraga</label>
                                <select id="jenis_olahraga" name="jenis_olahraga" required>
                                    <option value="kardio">kardio</option>
                                    <option value="interval">interval</option>
                                    <option value="kekuatan">kekuatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" required />
                            </div>
                            <div class="form-group">
                                <label for="resep">Gambar</label>
                                <div class="file-input">
                                    <label for="fileUpload" id="chooser" class="choose-file">Choose File</label>
                                    <input type="file" id="fileUpload" name="gambar" hidden />
                                    <span id="fileName">No file chosen</span>
                                    <span id="removeFile" class="remove-file" style="display: none">✖</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <button type="submit" class="button button-save" id="submitOlahraga">
                                    Simpan
                                </button>
                                <button type="button" class="button button-cancel" id="cancelOlahraga">
                                    Batal
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
</section>