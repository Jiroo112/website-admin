<section class="home">
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash(); ?>
                <h2>Daftar Konsultan</h2>
            </div>
        </div>
        <div class="container">
            <div class="search-plus-container" id="searchPlusContainer">
                <div class="plus" id="addKonsultan" aria-label="Add Konsultan">
                    <i class="bx bxs-plus-circle"></i>
                </div>
                <form action="<?= BASEURL; ?>konsultan/cari" method="post" class="search-form">
                    <div class="search" id="searching"><i class="bx bx-search-alt-2"></i>
                        <input
                            class="search-input"
                            id="searchKonsultan"
                            type="text"
                            name="keyword"
                            placeholder="Search" />
                    </div>
                </form>
            </div>
            <div class="table-container" id="tableContainer">
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Konsultan</th>
                            <th>Nama Lengkap</th>
                            <th>No hp</th>
                            <th>Gambar</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_konsultan">
                        <?php foreach ($data['konsultan'] as $konsultan): ?>
                            <?php $imgSrc = '/admin-adek/app/upload/konsultan/'. $konsultan['gambar']?>
                            <tr>
                                <td><?= $konsultan['id_konsultan']; ?></td>
                                <td><?= $konsultan['nama_lengkap']; ?></td>
                                <td><?= $konsultan['no_hp']; ?></td>
                                <td><img src="<?= $imgSrc; ?>" alt="Gambar konsultan" width="75" height="75"></td>
                                <td><a href="<?= BASEURL; ?>konsultan/edit/<?= $konsultan['id_konsultan'] ?>" id="editKonsultan" onclick="event.preventDefault(); openModal();"><i class="bx bx-edit-alt editKonsultan-icon" title="Edit" data-id="<?= $konsultan['id_konsultan']; ?>"></i></a>
                                    <a href="<?= BASEURL; ?>konsultan/hapus/<?= $konsultan['id_konsultan'] ?>" onclick="return confirm('yakin?');"><i class="bx bx-trash delete-icon" onclick="" title="Delete"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="addKonsultanModal" class="modal-panel">
            <div class="contain-modal">
                <form action="<?= BASEURL; ?>konsultan/tambah" method="post" id="addKonsultanForm" enctype="multipart/form-data">
                    <h2 class="Title-label">Tambah Data Konsultan</h2>
                    <div class="form-container">
                        <!-- Kolom Kiri -->
                        <div class="left-column">
                            <div class="form-group">
                                <label for="id_konsultan">ID Konsultan</label>
                                <input type="text" id="id_konsultan" name="id_konsultan" required />
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" required />
                            </div>
                            <div class="button-group">
                                <button type="submit" class="button button-save" id="submitKonsultan">
                                    Simpan
                                </button>
                                <button type="button" class="button button-cancel" id="cancelKonsultan">
                                    Batal
                                </button>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="right-column">
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="number" id="no_hp" name="no_hp" required />
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
                        </div>
                </form>
            </div>
        </div>
</section>