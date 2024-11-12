<?php

class User extends Controller{
    public function index() {
        $data['js'] = 'user.js';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah(){

        
        try{
            if($this->model('User_model')->tambahDataUser(($_POST))){
            Flasher::setFlash('User', 'berhasil ditambahkan', 'success');
            header('Location: '. BASEURL . 'user');
            exit;
        }
        }catch(PDOException $e){
            Flasher::setFlash('Data', 'gagal ditambahkan' , 'error');
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

        try{
            if($this->model('User_model')->ubahDataUser(($_POST))){
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
        $data['user'] = $this->model('User_model')->cariAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }
}

?>