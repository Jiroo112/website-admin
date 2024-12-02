<?php

class User extends Controller{
    public function index() {
        $data['nama'] = $_SESSION['nama'];
        $data['js'] = 'user.js';
        $data['user'] = $this->model('User_model')->getAllUser();
        $data['id'] = $this->model('User_model')->getIdUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah(){
        $data = array_merge($_POST, $_FILES);
        
        try{
            if($this->model('User_model')->tambahDataUser(($data))){
            Flasher::setFlash('User', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'user');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', $e , 'error');
            header('Location: '. BASEURL . 'user');
            exit;
        }
    }

    public function hapus($id){

        try{
            if($this->model('User_model')->hapusDataUser(($id))){
            Flasher::setFlash('Data', 'berhasil dihapus', 'success');
            header('Location: '. BASEURL . 'user');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', 'gagal dihapus', 'error');
            header('Location: '. BASEURL . 'user');
            exit;
        }
    }

    public function edit(){
        echo json_encode($this->model('User_model')->getUserByID(($_POST['id'])));
    }

    public function ubah(){

        $data = array_merge($_POST, $_FILES);

        try{
            if($this->model('User_model')->ubahDataUser(($data))){
            Flasher::setFlash('Data', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'user');
            exit;
            
        }else{
            Flasher::setFlash('Data', 'berhasil diubah', 'success');
            header('Location: '. BASEURL . 'user');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', $e, 'error');
            header('Location: '. BASEURL . 'user');
            exit;
        }
    }

    public function cari(){
        $data['js'] = 'user.js';
        $data['user'] = $this->model('User_model')->cariAllUser();
        $data['id'] = $this->model('User_model')->getIdUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer', $data);
    }
}

?>