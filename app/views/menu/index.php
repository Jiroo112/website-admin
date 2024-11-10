<section class="home">
  <div class="text">
    <div id="dashbord" class="content">
      <div class="head">
      <?php Flasher::flash(); ?>
        <h2>Buku</h2>
      </div>
    </div>
    <div class="container">
      <div class="search-plus-container" id="searchPlusContainer">
        <div class="plus" id="addMenu" aria-label="Add User">
          <i class="bx bxs-plus-circle"></i>
        </div>
        <div class="search" id="searching">
          <form action="<?=BASEURL;?>menu/cari" method="post">
            <i class="bx bx-search-alt-2"></i>
          <input
            class="search-input"
            id="searchMenu"
            type="text"
            name="keyword"
            placeholder="Search" />
            <div class="button-search">
            <button type="submit" class="button button-cari" id="tombolcari">
                        cari
                    </button>
            </div>
          </form>
        </div>
      </div>
      <div class="table-container" id="tableMenu">
        <table border="1" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
              <th>Id Menu</th>
              <th>Nama Menu</th>
              <th>Kategori menu</th>
              <th>Protein</th>
              <th>Karbohidrat</th>
              <th>Lemak</th>
              <th>Kalori</th>
              <th>Resep</th>
              <th>Gambar</th>
              <th>Satuan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="data_menu">
            <?php foreach ($data['menu'] as $menu): ?>
              <?php $imgSrc = '/admin-adek/app/upload/'. $menu['gambar']?>
              <tr>
                <td><?= $menu['id_menu']; ?></td>
                <td><?= $menu['nama_menu']; ?></td>
                <td><?= $menu['kategori_menu']; ?></td>
                <td><?= $menu['protein']; ?></td>
                <td><?= $menu['karbohidrat']; ?></td>
                <td><?= $menu['lemak']; ?></td>
                <td><?= $menu['kalori']; ?></td>
                <td><?= $menu['resep']; ?></td>
                <td><img src="<?= $imgSrc; ?>" alt="Gambar Menu" width="75" height="75"></td>
                <td><?= $menu['satuan']; ?></td>
                <td><a href="<?=BASEURL; ?>menu/edit/<?=$menu['id_menu']?>" id="editMenu" onclick="event.preventDefault(); openModal();"><i class="bx bx-edit-alt edit-icon" title="Edit" data-id="<?=$menu['id_menu'];?>" ></i></a>
                  <a href="<?=BASEURL; ?>menu/hapus/<?=$menu['id_menu']?>" onclick="return confirm('yakin?');"><i class="bx bx-trash delete-icon" onclick="" title="Delete"></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody> 
        </table>
      </div>
    </div>
  </div>
  <div id="addMenuModal" class="modal-panel">
        <div class="contain-modal">
            <form action="<?= BASEURL; ?>menu/tambah" method="post" id="addmenuForm" enctype="multipart/form-data">
                <h2 class="Title-label">Tambah menu</h2>
                <div class="form-container">
                    <!-- Kolom Kiri -->
                    <div class="left-column">
                        <div class="form-group">
                            <label for="id_menu">ID Menu</label>
                            <input type="text" id="id_menu" name="id_menu" required />
                        </div>
                        <div class="form-group">
                            <label for="nama_menu">Nama Menu</label>
                            <input type="text" id="nama_menu" name="nama_menu" required />
                        </div>
                        <div class="form-group">
                            <label for="kategori_menu">Kategori Menu</label>
                            <select id="kategori_menu" name="kategori_menu" required>
                                <option value="makanan_berat">Makanan Berat</option>
                                <option value="makanan_ringan">Makanan Ringan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="protein">Protein (g)</label>
                            <input type="number" id="protein" name="protein" required />
                        </div>
                        <div class="form-group">
                            <label for="karbohidrat">Karbohidrat (g)</label>
                            <input type="number" id="karbohidrat" name="karbohidrat" required />
                        </div>
                        <div class="form-group">
                            <label for="lemak">Lemak (g)</label>
                            <input type="number" id="lemak" name="lemak" required />
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="right-column">
                        <div class="form-group">
                            <label for="kalori">Kalori</label>
                            <input type="number" id="kalori" name="kalori" required />
                        </div>
                        <div class="form-group">
                            <label for="resep">Resep</label>
                            <textarea id="resep" name="resep" rows="4" required></textarea>
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
                            <label for="satuan">Satuan</label>
                            <select id="satuan" name="satuan" required>
                                <option value="porsi">Porsi</option>
                                <option value="mangkuk">Mangkuk</option>
                                <option value="pcs">Pcs</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="button button-save" id="submitMenu">
                        Simpan
                    </button>
                    <button type="button" class="button button-cancel" id="cancelMenu">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<script></script>