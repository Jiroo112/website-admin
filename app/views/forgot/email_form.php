<div class="wrapper">
      <form action="<?= BASEURL; ?>forgot/handleEmailForm" method="post">
        <h1>Input Your Email</h1>
        <div class="input-box">
          <input type="text" name="email" placeholder="email" require />
          <i class="bx bxs-user"></i>
        </div>
        <button type="submit" class="btn">Send OTP</button>
      </form>
</div>