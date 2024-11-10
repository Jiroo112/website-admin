<section class="home">
    <div class="text">
        <div id="dashbord" class="content">
            <div class="head">
                <h2>Dashboard</h2>
            </div>
        </div>
        <div class="container">
            <div class="search-plus-container" id="searchPlusContainer">
                <div class="plus" id="addUser" aria-label="Add User">
                    <i class="bx bxs-plus-circle"></i>
                </div>
                <div class="search" id="searching">
                    <i class="bx bx-search-alt-2"></i>
                    <input
                        class="search-input"
                        id="searchUser"
                        type="search"
                        placeholder="Search" />
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data_user">
                        <?php foreach ($data['user'] as $user): ?>
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
                                <td><i class="bx bx-edit-alt edit-icon" onclick="" title="Edit"></i>
                                    <i class="bx bx-trash delete-icon" onclick="" title="Delete"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</section>