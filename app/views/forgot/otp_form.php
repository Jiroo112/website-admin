<div class="wrapper">
      <form action="<?= BASEURL; ?>forgot/verifyOtp" method="post">
        <h1>OTP Code</h1>
        <div class="input-box">
          <input type="text" name="OTP Code" placeholder="OTP Code" require />
          <i class="bx bxs-user"></i>
        </div>
        <button type="submit" class="btn">Verify</button>
      </form>
</div>