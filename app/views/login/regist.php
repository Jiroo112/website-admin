<?php Flasher::flash(); ?>

<div class="wrapper-register">
    <form action="<?= BASEURL; ?>login/tambahuser" method="post" id="adduserForm" enctype="multipart/form-data">
        <h1>Register</h1>

        <!-- Step 1 -->
        <div class="form-step active">
            <div class="form-group">
                <label for="id_user" style="display :none">ID User</label>
                <input type="text" id="id_user" name="id_user" required />
            </div>
            <div class="form-group">
                <label for="nama_user">Nama User</label>
                <input type="text" id="nama_user" name="nama_lengkap" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
        </div>

        <!-- Step 2 -->
        <div class="form-step">
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="pasword" required />
            </div>
            <div class="form-group">
                <label for="Re-password">Re-password</label>
                <input type="password" id="Re-password" name="Re-password" required />
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="number" id="no_hp" name="no_hp" required />
            </div>
            <div class="form-group">
                <label for="tipe_diet">Tipe diet</label>
                <select id="tipe_diet" name="tipe_diet" required>
                    <option value="Menambah berat badan">Menambah berat badan</option>
                    <option value="Mengurangi berat badan">Mengurangi berat badan</option>
                    <option value="Mempertahankan berat badan">Mempertahankan berat badan</option>
                </select>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="form-step">
            <div class="form-group">
                <label for="berat_badan">Berat Badan</label>
                <input type="number" id="berat_badan" name="berat_badan" required />
            </div>
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan</label>
                <input type="number" id="tinggi_badan" name="tinggi_badan" required />
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" id="umur" name="umur" required />
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="button-group">
            <button type="button" class="button button-prev" id="prevBtn">Previous</button>
            <button type="button" class="button button-next" id="nextBtn">Next</button>
            <button type="submit" class="button button-save" id="submitBtn" style="display: none;">Register</button>
        </div>
    </form>
    <div class="login">
        <p>
            Already have account?
            <a href="<?= BASEURL; ?>login">Sign in</a>
        </p>
    </div>
</div>