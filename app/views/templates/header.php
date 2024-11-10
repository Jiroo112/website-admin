<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASEURL;?>/css/style.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<nav class="sidebar close">
      <header>
        <div class="imagetext">
          <span class="image">
            <img src="<?=BASEURL;?>/img/logo.png" alt="Adek Company Logo" />
          </span>
          <div class="text header-text">
            <span class="company">Adek Company</span>
            <span class="profession">Admin</span>
          </div>
        </div>
        <i class="bx bx-chevron-right toggle" aria-label="Toggle Sidebar"></i>
      </header>

      <div class="menu-bar">
        <div class="menu">
          <ul class="menu-link">
            <li class="navigation-link">
              <a href="<?=BASEURL;?>home" onclick="">
                <i class="bx bx-home-alt-2 icon"></i>
                <span class="text nav-text">Dashboard</span>
              </a>
            </li>
            <li class="navigation-link">
              <a href="<?=BASEURL;?>menu" onclick="">
                <i class="bx bx-food-menu icon"></i>
                <span class="text nav-text">Daftar Menu</span>
              </a>
            </li>
            <li class="navigation-link">
              <a href="<?=BASEURL;?>user" onclick="">
                <i class="bx bx-user icon"></i>
                <span class="text nav-text">Data Pengguna</span>
              </a>
            </li>
            <li class="navigation-link">
              <a href="#" onclick="">
                <i class="bx bx-book icon"></i>
                <span class="text nav-text">Daftar Buku</span>
              </a>
            </li>
            <li class="navigation-link">
              <a href="#" onclick="">
                <i class="bx bx-run icon"></i>
                <span class="text nav-text">Daftar Olahraga</span>
              </a>
            </li>
            <li class="navigation-link">
              <a href="#" onclick="">
                <i class="bx bx-plus-medical icon"></i>
                <span class="text nav-text">Data Konsultan</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="bottom-content">
          <li>
            <a href="#">
              <i class="bx bx-log-out icon"></i>
              <span class="text nav-text">Log Out</span>
            </a>
          </li>
        </div>
      </div>
    </nav>

    