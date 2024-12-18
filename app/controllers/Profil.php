<?php
class profil extends Controller{
    public function index() {
        $data['nama'] = $_SESSION['nama'];
        $data['username'] = $_SESSION['username'];
        $data['js'] = 'profil.js';
        $data['user'] = $this->model('Profil_model')->getAllUser($data);
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateprofile(){
        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('Profil_model')->updateProfile(($data))){
            Flasher::setFlash('profile', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'profil');
            exit;
        }else{
            header('Location: '. BASEURL . 'profil');
        }
        }catch(PDOException $e){
            Flasher::setFlash('profile', $e , 'error');
            header('Location: '. BASEURL . 'profil');
            exit;
        }
    }
}
?>