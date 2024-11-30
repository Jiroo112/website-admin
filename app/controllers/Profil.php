<?php
class profil extends Controller{
    public function index() {
        $data['js'] = 'profil.js';
        $data['user'] = $this->model('Profil_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('profile/index', $data);
        $this->view('templates/footer', $data);
    }

    public function updateprofile(){
        $data = array_merge($_POST, $_FILES);
        print_r($data);

        try{
            if($this->model('Profil_model')->updateProfile(($data))){
            Flasher::setFlash('profile', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'profil');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('profile', $e , 'error');
            header('Location: '. BASEURL . 'profil');
            exit;
        }
    }
}
?>