<?php

class Flasher {
     
    public static function setFlash($pesan, $aksi, $tipe){

        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash(){
        if (isset($_SESSION['flash'])) {
            echo '<div class="flash-message ' . $_SESSION['flash']['tipe'] . '">';
            echo '<span class="icon"></span>';
            echo '<strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'];
            echo '<div class="loading-bar"></div>';
            echo '</div>';
            unset($_SESSION['flash']);
        }
    }
}