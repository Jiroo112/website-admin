<?php

class Forgot extends Controller
{
    private $forgotModel;

    public function __construct()
    {
        $this->forgotModel = $this->model('ForgotModel');
        // Periksa apakah sesi sudah aktif
    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Pastikan sesi PHP dimulai hanya jika belum aktif
    }
    }

    public function index()
    {
        $data['css'] = 'login.css';
        $this->view('templates/headerdefault', $data);
        $this->view('forgot/email_form', $data);
        $this->view('templates/footerlogin', $data);
    }

    // public function otp()
    // {
    //     $this->view('templates/headerdefault' );
    //     $this->view('forgot/otp_form');
    //     $this->view('templates/footerlogin');
    // }

    public function handleEmailForm()
    {
        $data['css'] = 'login.css'; // Tambahkan baris ini
        $this->view('templates/headerdefault', $data);
        $this->view('forgot/otp_form', $data);
        $this->view('templates/footerlogin', $data);

        // Tambahkan ini di awal method
    $rootPath = realpath(dirname(__DIR__, 2));
    require $rootPath . '/vendor/autoload.php';
    // Sisanya tetap sama seperti kode Anda
    
        // ... kode selanjutnya

        // Validasi apakah email dikirim melalui POST
        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $_POST['email'];

            // Periksa apakah email sudah terdaftar
            $user = $this->forgotModel->findByEmail($email);
            if ($user) {
                // Generate OTP
                $otp = rand(100000, 999999);

                // Simpan OTP di sesi
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $email;
                $_SESSION['otp_expiration'] = time() + 300; // OTP berlaku 5 menit

                // Kirim email dengan PHPMailer
                require 'C:/xampp/htdocs/admin-adek/vendor/autoload.php';
                require 'C:/xampp/htdocs/admin-adek/vendor/phpmailer/phpmailer/src/PHPMailer.php';
                require 'C:/xampp/htdocs/admin-adek/vendor/phpmailer/phpmailer/src/SMTP.php';
                require 'C:/xampp/htdocs/admin-adek/vendor/phpmailer/phpmailer/src/Exception.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer();
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'extentionrays@gmail.com';
                    $mail->Password = 'xpgt bryq zjkh agtr'; // Ganti dengan password email Anda
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('adek_company@gmail.com', 'ADEK COMPANY');
                    $mail->addAddress($email);
                    $mail->Subject = 'Your OTP Code';
                    $mail->Body = "Your OTP code is: $otp";

                    $mail->send();

                    // Tampilkan halaman OTP form
                    $data['email'] = $email;
                    $this->view('forgot/otp_form', $data);
                } catch (Exception $e) {
                    echo "Email tidak dapat dikirim. Error: {$mail->ErrorInfo}";
                }
            } else {
                Flasher::setFlash('Email', 'tidak terdaftar', 'error');
                header('Location: ' . BASEURL . 'forgot/email_form');
                echo "Email tidak terdaftar.";
            }
        } else {
            echo "Harap masukkan email yang valid.";
        }
    }

    public function verifyOtp()
    {
        $data['css'] = 'login.css'; // Tambahkan baris ini
        $this->view('templates/headerdefault', $data);
        $this->view('forgot/reset_password_form', $data);
        $this->view('templates/footerlogin', $data);

        // Validasi input OTP
        if (isset($_POST['otp'], $_SESSION['otp'], $_SESSION['email'], $_SESSION['otp_expiration'])) {
            $otpInput = $_POST['otp'];
            $email = $_SESSION['email'];

            if (
                $_SESSION['otp'] == $otpInput &&
                time() <= $_SESSION['otp_expiration']
            ) {
                // Hapus data OTP dari sesi
                unset($_SESSION['otp'], $_SESSION['email'], $_SESSION['otp_expiration']);
                $this->view('forgot/reset_password_form', ['email' => $email]);
            } else {
                echo "Kode OTP salah atau sudah kedaluwarsa.";
            }
        } else {
            // echo "Harap masukkan kode OTP.";
        }
    }

        public function resetPassword()
    {
        $data['css'] = 'login.css'; // Tambahkan baris ini
        $this->view('templates/headerdefault', $data);
        $this->view('forgot/reset_password_form', $data);
        $this->view('templates/footerlogin', $data);

            // Validasi input reset password
            if (isset($_POST['new_password'], $_POST['confirm_password'])) {
                $email = $_SESSION['email'] ?? null; // Gunakan email dari sesi sebelumnya
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                // Validasi email
                if (!$email) {
                    echo "Sesi email tidak valid.";
                    return;
                }

                // Validasi konfirmasi password
                if ($newPassword !== $confirmPassword) {
                    $_SESSION['error'] = "Konfirmasi password tidak cocok.";
                    $this->view('forgot/reset_password_form', ['email' => $email]);
                    return;
                }

                // Validasi kekuatan password
                if (strlen($newPassword) < 6) {
                    $_SESSION['error'] = "Password minimal 6 karakter.";
                    $this->view('forgot/reset_password_form', ['email' => $email]);
                    return;
                }

                

                // Perbarui password di database
                $this->forgotModel->updatePassword($email, $newPassword );

                // Redirect ke halaman login atau tampilkan pesan sukses
                $_SESSION['success'] = "Password berhasil diperbarui.";
                header('Location: ' . BASEURL . 'login/index');
                exit();
            } else {
            $_SESSION['error'] = "Harap masukkan password baru dan konfirmasi password.";
            $this->view('forgot/reset_password_form');
        }
    }
}
?>