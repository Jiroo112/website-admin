<?php Flasher::flash(); ?>

<div class="wrapper">
      <form action="<?= BASEURL; ?>login/masuk" method="post">
        <h1>Login</h1>
        <div class="input-box">
          <input type="text" name="email" placeholder="email" require />
          <i class="bx bxs-user"></i>
        </div>

        <div class="input-box">
          <input
            type="password"
            name="password"
            placeholder="Password"
            require
          />
          <i class="bx bxs-lock-alt"></i>
        </div>

        <div class="remember-forgot">
          <label><input type="checkbox" /> Remember me? </label>
          <a href="forgot/email_form">Forgot password</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="register">
          <p>
            Don't have account?
            <a href="<?= BASEURL; ?>login/register">Register</a>
          </p>
        </div>
      </form>
    </div>