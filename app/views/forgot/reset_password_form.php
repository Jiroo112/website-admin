<div class="wrapper">
    <form action="<?= BASEURL; ?>forgot/resetPassword" method="post">
        <h1>Reset Password</h1>
        <div class="input-box">
            <input
                type="password"
                name="new_password"
                placeholder="New Password"
                require />
            <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="input-box">
            <input
                type="password"
                name="confirm_password"
                placeholder="Confirm Password"
                require />
            <i class="bx bxs-lock-alt"></i>
        </div>

        <button type="submit" class="btn">Reset Password</button>
    </form>
</div>