<section class="home">
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <?php Flasher::flash(); ?>
                <h2>Data Pengguna</h2>
            </div>
        </div>
        <div class="header-container">
            <div class="header-text">
                <h1>
                    <?php
                    // Memeriksa apakah email tersedia di session
                    if (isset($data['nama']) && !empty($data['nama'])) {
                        // Jika email ada, tampilkan
                        echo "Halo, " . htmlspecialchars($data['nama']);
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
            <div class="search-plus-container-kanan" id="searchPlusContainer">
                <div class="right-controls">
                    <div class="plus" id="addUser" aria-label="Add User" data-id="<?= $data['id']['id_terbesar']; ?>">
                        <i class="bx bxs-plus-circle"></i>
                    </div>
                    <form action="<?= BASEURL; ?>user/cari" method="post" class="search-form">
                        <div class="search" id="searching">
                            <i class="bx bx-search-alt-2"></i>
                            <input
                                class="search-input"
                                id="searchUser"
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
                            <th>ID User</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>No HP</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Umur</th>
                            <th>Tipe diet</th>
                            <th>Gender</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_user">
                        <?php foreach ($data['user'] as $user): ?>
                            <?php $imgSrc = '/admin-adek/app/upload/user/' . $user['gambar'] ?>
                            <tr>
                                <td><?= $user['id_user']; ?></td>
                                <td><?= $user['nama_lengkap']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['password']; ?></td>
                                <td><?= $user['no_hp']; ?></td>
                                <td><?= $user['berat_badan']; ?></td>
                                <td><?= $user['tinggi_badan']; ?></td>
                                <td><?= $user['umur']; ?></td>
                                <td><?= $user['tipe_diet']; ?></td>
                                <td><?= $user['gender']; ?></td>
                                <td><img src="<?= $imgSrc; ?>" alt="Gambar User" width="75" height="75"></td>
                                <td><a href="<?= BASEURL; ?>user/edit/<?= $user['id_user'] ?>" id="editUser" onclick="event.preventDefault(); openModal();"><i class="bx bx-edit-alt editUser-icon" title="Edit" data-id="<?= $user['id_user']; ?>"></i></a>
                                    <a href="<?= BASEURL; ?>user/hapus/<?= $user['id_user'] ?>" onclick="return confirm('yakin?');"><i class="bx bx-trash delete-icon" onclick="" title="Delete"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="addUserModal" class="modal-panel">
            <div class="contain-modal">
                <form action="<?= BASEURL; ?>user/tambah" method="post" id="adduserForm" enctype="multipart/form-data">
                    <h2 class="Title-label">Tambah Pengguna</h2>
                    <div class="form-container">
                        <!-- Kolom Kiri -->
                        <div class="left-column">
                            <div class="form-group">
                                <label for="id_user">ID user</label>
                                <input type="text" id="id_user" name="id_user" required readonly />
                            </div>
                            <div class="form-group">
                                <label for="nama_user">Nama user</label>
                                <input type="text" id="nama_user" name="nama_lengkap" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="pasword" required />
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No hp</label>
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

                        <!-- Kolom Kanan -->
                        <div class="right-column">
                            <div class="form-group">
                                <label for="berat_badan">Berat badan</label>
                                <input type="number" id="berat_badan" name="berat_badan" required />
                            </div>
                            <div class="form-group">
                                <label for="tinggi_badan">Tinggi badan</label>
                                <input type="number" id="tinggi_badan" name="tinggi_badan" required />
                            </div>
                            <div class="form-group">
                                <label for="umur">Umur</label>
                                <input type="number" id="umur" name="umur" required />
                            </div>
                            <div class="form-group">
                                <label for="tipe_diet">Tipe diet</label>
                                <select id="tipe_diet" name="tipe_diet" required>
                                    <option value="Menambah berat badan">Menambah berat badan</option>
                                    <option value="Mengurangi berat badan">Mengurangi berat badan</option>
                                    <option value="Mempertahankan berat badan">Mempertahankan berat badan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="button button-save" id="submitUser">
                            Simpan
                        </button>
                        <button type="button" class="button button-cancel" id="cancelUser">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
</section>