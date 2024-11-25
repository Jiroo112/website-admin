<section class="home">
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash(); ?>
                <h2>Daftar buku</h2>
            </div>
        </div>
        <div class="container">
            <div class="search-plus-container" id="searchPlusContainer">
            <div class="filter-container">
                <form action="<?= BASEURL; ?>buku/filter" method="post" class="search-form">
                    <select id="filter" name="filter" onchange="this.form.submit()" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="all">All</option>
                        <option value="diet">Diet</option>
                        <option value="olahraga">Olahraga</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </form>
            </div>
            <div class="right-controls">
                <div class="plus" id="addBuku" aria-label="Add Buku" data-id="<?= $data['id']['id_terbesar']; ?>">
                    <i class="bx bxs-plus-circle"></i>
                </div>
                <form action="<?= BASEURL; ?>buku/cari" method="post" class="search-form">
                    <div class="search" id="searching"><i class="bx bx-search-alt-2"></i>
                        <input
                            class="search-input"
                            id="searchBuku"
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
                            <th>Id Buku</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Isi buku</th>
                            <th>Gambar</th>
                            <th>Username</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_buku">
                        <?php foreach ($data['buku'] as $buku): ?>
                            <?php $imgSrc = '/admin-adek/app/upload/buku/' . $buku['gambar'] ?>
                            <tr>
                                <td><?= $buku['id_buku']; ?></td>
                                <td><?= $buku['judul']; ?></td>
                                <td><?= $buku['kategori']; ?></td>
                                <td><?= $buku['isi_buku']; ?></td>
                                <td><img src="<?= $imgSrc; ?>" alt="Gambar Buku" width="75" height="75"></td>
                                <td><?= $buku['username']; ?></td>
                                <td><a href="<?= BASEURL; ?>buku/edit/<?= $buku['id_buku'] ?>" id="editBuku" onclick="event.preventDefault(); openModal();"><i class="bx bx-edit-alt editBuku-icon" title="Edit" data-id="<?= $buku['id_buku']; ?>"></i></a>
                                    <a href="<?= BASEURL; ?>buku/hapus/<?= $buku['id_buku'] ?>" onclick="return confirm('yakin?');"><i class="bx bx-trash delete-icon" onclick="" title="Delete"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="addBukuModal" class="modal-panel">
            <div class="contain-modal">
                <form action="<?= BASEURL; ?>buku/tambah" method="post" id="addbukuForm" enctype="multipart/form-data">
                    <h2 class="Title-label">Tambah Data Buku</h2>
                    <div class="form-container">
                        <!-- Kolom Kiri -->
                        <div class="left-column">
                            <div class="form-group">
                                <label for="id_buku">ID Buku</label>
                                <input type="text" id="id_buku" name="id_buku" required readonly />
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" id="judul" name="judul" required />
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select id="kategori" name="kategori" required>
                                    <option value="diet">Diet</option>
                                    <option value="olahraga">Olahraga</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                </select>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="right-column">
                            <div class="form-group">
                                <label for="isi_buku">Isi Buku</label>
                                <textarea id="isi_buku" name="isi_buku" rows="4" required></textarea>
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
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" required />
                            </div>
                            <div class="button-group">
                                <button type="submit" class="button button-save" id="submitBuku">
                                    Simpan
                                </button>
                                <button type="button" class="button button-cancel" id="cancelBuku">
                                    Batal
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
</section>