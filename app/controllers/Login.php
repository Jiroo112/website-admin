<?php

class Login extends Controller{

    public function index(){
        session_destroy();
        $data['js'] = 'login.js';
        $data['css'] = 'login.css';
        $this->view('templates/headerdefault', $data);
        $this->view('login/index', $data);
        $this->view('templates/footerlogin', $data);
    }

    public function masuk(){
        $this->model('Login_model')->login(($_POST));
    }

    public function register(){
        $data['js'] = 'register.js';
        $data['css'] = 'register.css';
        $this->view('templates/headerdefault', $data);
        $this->view('login/regist', $data);
        $this->view('templates/footerlogin', $data);
    }


    public function tambahuser(){
        
        $data = $_POST;

        if($data['pasword'] !== $data['Re-password']){
            Flasher::setFlash('Password', 'dan Re-password harus sama', 'error');
        }else{
            try{
                if($this->model('Login_model')->tambahDataUser(($data))){
                Flasher::setFlash('User', 'berhasil ditambahkan', 'success');
                header('Location: '. BASEURL . 'login');
                exit;
            }
            }catch(PDOException $e){
                Flasher::setFlash('User', $e, 'error');
                header('Location: '. BASEURL . 'login/register');
                exit;
            }
        }
    }
}
